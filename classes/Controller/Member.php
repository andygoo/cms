<?php

class Controller_Member extends Controller_Shop {

    public function __construct(Request $request) {
        parent::__construct($request);
        
        if (empty($this->user)) {
            $this->redirect('user/login');
        }
    }
    
    public function action_order() {
        $where = array('member_id'=>$this->user['id'], 'ORDER' => 'id DESC');
        $m_order = Model::factory('orders', 'admin');
        
        $size = 5;
        $total = $m_order->count($where);
        $pager = new Pager($total, $size);
        $order_list = $m_order->select($pager->offset, $size, $where)->as_array();

        $order_status_arr = array(
            '0' => '未支付', //立即支付
            '1' => '待发货', //
            '2' => '已发货', //确认发货
            '3' => '已完成', //
        );
        $m_order_goods = Model::factory('order_goods', 'admin');
        foreach ($order_list as &$item) {
            $order_id = $item['id'];
            $item['goods_list'] = $m_order_goods->getAll(array('order_id'=>$order_id));
            $item['status'] = isset($order_status_arr[$item['status']]) ? $order_status_arr[$item['status']] : '';
        }
        unset($item);
        
        $this->content = View::factory('member_order');
        $this->content->order_list = $order_list;
        $this->content->pager = $pager->render('common/pager');
    }

    public function action_logout() {
        $auth = Auth::instance();
        $ret = $auth->logout();
        if ($ret) {
            $this->redirect('product');
        }
    }
}

