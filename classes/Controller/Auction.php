<?php

class Controller_Auction extends Controller_Website {

    public $siteinfo = array(
        'name' => '闲竹书画',
        'desc' => '书画爱好者交流',
        'logo' => 'http://7xkkhh.com1.z0.glb.clouddn.com/2016/06/09/14654379440103.png',
    );
    
    protected $user;
    
    public function before() {
        parent::before();
        
        $is_weixin = false;
        $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (strpos($ua, 'micromessenger') !== false) {
            $is_weixin = true;
        }

        $auth = Auth::instance('member');
        $this->user = $auth->get_user();
        
        if ($this->auto_render === TRUE) {
            View::bind_global('is_weixin', $is_weixin);
            View::bind_global('siteinfo', $this->siteinfo);
            
            if ($is_weixin) {
                $wx_js_api = new WeixinJSAPI('test');
                $wx_jsapi_config = $wx_js_api->get_jsapi_config();
                View::bind_global('wx_jsapi_config', $wx_jsapi_config);
            }
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
            if(empty($pic_info['scheme'])) {
                $item['src'] = URL::site('/imagefly/w'.$w.'-h'.$h.'/' . $pic);
                $item['src_sml'] = URL::site('/imagefly/w200-h200/' . $pic);
            } else {
                $pic = $pic_info['scheme'].'://'.$pic_info['host'].$pic_info['path'];
                $item['src'] = $pic;
                $item['src_sml'] = $pic.'?imageView2/2/w/200/h/200';
            }
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
        if (empty($this->user)) {
            $ret = array('errno'=>100, 'errmsg'=>'请先登录');
            echo json_encode($ret);
            exit;
        }
        
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
            'bidder_openid' => $this->user['id'],
            'bidder_name' => $this->user['username'],
            'bidder_avatar' => isset($this->user['avatar']) ? $this->user['avatar'] : '',
            'time' => $now,
        );
    
        $m_bidlog = Model::factory('bidlog', 'paimai');
        $ret = $m_bidlog->insert($data);
    
        if ($ret !== false) {
            $info_data = array('curr_price'=>$price);
            $info_data['bid_num'] = $info['bid_num'] + 1;
            if ($info['end_time'] - $now < 300) {
                $info_data['end_time'] = $info['end_time'] + 300;
                $info_data['delay_num'] = $info['delay_num'] + 1;
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

    public function action_wxlogin() {
        $wx = new WeixinOauth('test');
        $user_info = $wx->get_user_info();
        if (empty($user_info)) {
            $callback_url = URL::curr();
            $this->redirect('weixin/oauth/login?callback_url=' . urlencode($callback_url));
        }
        
        $update_user_info = Cookie::get('update_wx_user');
        if (empty($update_user_info)) {
            $m_wx = Model::factory('oauth_wx_user', 'admin');
            $wx_user_field = array('openid'=>1,'nickname'=>1,'sex'=>1,'city'=>1,'province'=>1,'country'=>1,'headimgurl'=>1);
            $wx_user_info = array_intersect_key($user_info, $wx_user_field);
            $m_wx->replace_into($wx_user_info);
            Cookie::set('update_wx_user', 1, 86400);
        }
        $user = array(
            'id' => 'wx_' . $user_info['openid'],
            'username' => $user_info['nickname'],
            'avatar' => $user_info['headimgurl'],
        );
        $auth = Auth::instance('member');
        if ($auth->force_login($user)) {
            $this->redirect(Request::$referrer);
        }
    }
    
    public function action_qqlogin() {
        $redirect_uri = URL::curr();
        $client = OAuth2_Client::factory('QQ');
        $user_info = $client->get_user_data($redirect_uri);
        if (empty($user_info)) {
            $this->redirect('oauth/qq/login?redirect_uri=' . urlencode($redirect_uri));
        }
        var_dump($user_info);
        exit;
        
        $update_user_info = Cookie::get('update_qq_user');
        if (empty($update_user_info)) {
            $m_qq = Model::factory('oauth_qq_user', 'admin');
            $qq_user_field = array('openid'=>1,'nickname'=>1,'gender'=>1,'figureurl'=>1);
            $qq_user_info = array_intersect_key($user_info, $qq_user_field);
            $m_qq->replace_into($qq_user_info);
            Cookie::set('update_qq_user', 1, 86400);
        }
        
        $user = array(
            'id' => 'qq_' . $user_info['openid'],
            'username' => $user_info['nickname'],
            'avatar' => $user_info['figureurl'],
        );
        $auth = Auth::instance('member');
        if ($auth->force_login($user)) {
            $this->redirect(Request::$referrer);
        }
    }
    
    public function action_recentbid() {
        $logid = Arr::get($_GET, 'logid');
        $item_id = Arr::get($_GET, 'id');
    
        $where = array(
            'id' => array('<'=>$logid),
            'item_id' => $item_id,
            'ORDER' => 'id desc',
        );
    
        $size = 5;
        $m_bidlog = Model::factory('bidlog', 'paimai');
        $total = $m_bidlog->count($where);
        $pager = new Pager($total, $size);
        $list_bidlog = $m_bidlog->select($pager->offset, $pager->size, $where)->as_array();
        $next_page = $pager->next_page ? $pager->url($pager->next_page) : '';
    
        $content = View::factory('auction/bidlog');
        $content->list_bidlog = $list_bidlog;
    
        header('Content-Type: application/json; charset=utf-8');
        $ret = array('content' => (string)$content, 'next_page' => $next_page);
        echo json_encode($ret);
        exit;
    }
    
    public function action_latestbid() {
        $logid = Arr::get($_GET, 'logid');
        $item_id = Arr::get($_GET, 'id');
    
        $where = array(
            'id' => array('>'=>$logid),
            'item_id' => $item_id,
            'ORDER' => 'id desc',
        );
        $m_bidlog = Model::factory('bidlog', 'paimai');
        $list_bidlog = $m_bidlog->getAll($where)->as_array();
    
        $content = View::factory('auction/bidlog');
        $content->list_bidlog = $list_bidlog;
    
        header('Content-Type: application/json; charset=utf-8');
        $ret = array('content' => (string)$content);
        echo json_encode($ret);
        exit;
    }
    
}

