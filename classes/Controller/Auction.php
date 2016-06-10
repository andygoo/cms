<?php

class Controller_Auction extends Controller_Website {

    public $siteinfo = array(
        'name' => '闲竹书画',
        'desc' => '书画爱好者交流',
        'logo' => 'http://7xkkhh.com1.z0.glb.clouddn.com/2016/06/09/14654379440103.png',
    );
    
    public $wx_user = array(
        'openid' => 'openid11111111111',
        'nickname' => '清明上河图',
        'headimgurl' => 'http://static.oschina.net/uploads/user/33/66764_100.jpg',
    );
    
    public function before() {
        parent::before();
        /*
        $wx = new WeixinOauth();
        $user_info = $wx->get_user_info();
        if (empty($user_info)) {
            $callback_url = URL::curr();
            $this->redirect('weixin/oauth/login?callback_url=' . urlencode($callback_url));
        }
        $this->wx_user = $user_info;
        */
        if ($this->auto_render === TRUE) {
            View::bind_global('siteinfo', $this->siteinfo);
            View::bind_global('wx_user', $this->wx_user);
        }
    }
    
    public function action_index() {
        $item_id = Arr::get($_GET, 'id');
        $m_auction = Model::factory('auction', 'paimai');
        $info = $m_auction->getRowById($item_id);
        
        $pics = array();
        $_pics = json_decode($info['pic'], true);
        foreach ($_pics as $pic) {
            $w = $h = 600;
            $max = 1200;
            $max = 1200;
            $pic_info = parse_url($pic);
            if (!empty($pic_info['query'])) {
                list($w, $h) = explode('x', $pic_info['query']);
                $w = intval($w);
                $h = intval($h);
                if ($w > 0 && $h > 0) {
                    if ($w > $h) {
                        if ($w > $max || $h > $max) {
                            $h = round($max*$h/$w);$w = $max; 
                        }
                    } else {
                        if ($w > $max || $h > $max) {
                            $w = round($max*$w/$h);$h = $max; 
                        }
                    }
                }
            }
            $item['src'] = $pic;
            $item['w'] = $w;
            $item['h'] = $h;
            $item['size'] = $w . 'x' . $h;
            $pics[] = $item;
        }
        
        $where = array(
            'item_id' => $item_id,
            'ORDER' => 'id desc',
        );
        $m_bidlog = Model::factory('bidlog', 'paimai');
        $total_bidlog = $m_bidlog->count($where);
        $list_bidlog = $m_bidlog->select(0, 5, $where)->as_array();
        
        if (strtotime('now') < $info['start_time']) {
            $status = 0;
        }
        if (strtotime('now') >= $info['end_time']) {
            $status = 2;
        }
        if (strtotime('now') >= $info['start_time'] && strtotime('now') <= $info['end_time']) {
            $status = 1;
        }
        
        $list_more = array();
        if ($status == 1) {
            $where = array(
                'end_time' => array('>'=>strtotime('now')),
                'id' => array('!='=>$item_id),
                'ORDER' => 'id desc',
            );
            $list_more = $m_auction->select(0, 7, $where)->as_array();
        }
        
        $this->content = View::factory('auction');
        $this->content->info = $info;
        $this->content->status = $status;
        $this->content->pics = $pics;
        $this->content->list_more = $list_more;
        $this->content->list_bidlog = $list_bidlog;
        $this->content->total_bidlog = $total_bidlog;
    }

    public function action_bid() {
        header('Content-Type: application/json; charset=utf-8');
        $item_id = Arr::get($_GET, 'id');
        $price = Arr::get($_GET, 'price');
    
        $m_auction = Model::factory('auction', 'paimai');
        $info = $m_auction->getRowById($item_id);
    
        if (strtotime('now') < $info['start_time']) {
            $ret = array('errno'=>100, 'errmsg'=>'拍卖未开始');
            echo json_encode($ret);
            exit;
        }
        if (strtotime('now') >= $info['end_time']) {
            $ret = array('errno'=>100, 'errmsg'=>'拍卖已结束');
            echo json_encode($ret);
            exit;
        }
        if ($price - $info['curr_price'] < $info['step_price']) {
            $ret = array('errno'=>100, 'errmsg'=>'每次加价幅度不能低于'.$info['step_price'].'元');
            echo json_encode($ret);
            exit;
        }
        if ($price - $info['curr_price'] > $info['step_price']) {
            $ret = array('errno'=>100, 'errmsg'=>'请按加价幅度出价');
            echo json_encode($ret);
            exit;
        }
    
        $now = strtotime('now');
        $data = array(
                'item_id' => $item_id,
                'price' => $price,
                'bidder_openid' => $this->wx_user['openid'],
                'bidder_name' => $this->wx_user['nickname'],
                'bidder_avatar' => $this->wx_user['headimgurl'],
                'time' => $now,
        );
    
        $m_bidlog = Model::factory('bidlog', 'paimai');
        $ret = $m_bidlog->insert($data);
    
        if ($ret !== false) {
            $info_data = array('curr_price'=>$price);
            if ($info['end_time'] - $now < 300) {
                $info_data['end_time'] = $info['end_time'] + 300;
            }
            $m_auction->updateById($info_data, $item_id);
    
            $data['id'] = $ret[0];
            $content = View::factory('auction/bidlog');
            $content->list_bidlog = array($data);
    
            $ret = array('errno'=>0, 'errmsg'=>'出价成功！', 'data'=>(string)$content);
            echo json_encode($ret);
            exit;
        }
    }
    
    public function action_info() {
        $item_id = Arr::get($_GET, 'id');
    
        $m_auction = Model::factory('auction', 'paimai');
        $info = $m_auction->getRowById($item_id, 'id,end_time,curr_price');
    
        header('Content-Type: application/json; charset=utf-8');
        $ret = array('errno'=>0, 'data'=> $info);
        echo json_encode($ret);
        exit;
    }
    
}
