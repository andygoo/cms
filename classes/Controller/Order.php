<?php

class Controller_Order extends Controller_Shop {

    public function __construct(Request $request) {
        parent::__construct($request);
    
        if (empty($this->user)) {
            $this->redirect('user/login');
        }
    }

    public function action_list() {
        $where = array('member_id'=>$this->user['id'], 'ORDER' => 'id DESC');
        $m_order = Model::factory('orders', 'admin');
    
        $size = 5;
        $total = $m_order->count($where);
        $pager = new Pager($total, $size);
        $order_list = $m_order->select($pager->offset, $size, $where)->as_array();

        $deliver_status_arr = array(
            '0' => '等待发货',
            '1' => '已发货',
        );
        $m_order_goods = Model::factory('order_goods', 'admin');
        foreach ($order_list as &$item) {
            $order_id = $item['id'];
            $item['goods_list'] = $m_order_goods->getAll(array('order_id'=>$order_id));
            $item['deliver_status_str'] = isset($deliver_status_arr[$item['deliver_status']]) ? $deliver_status_arr[$item['deliver_status']] : '';
        }
        unset($item);
    
        $this->content = View::factory('order_list');
        $this->content->order_list = $order_list;
        $this->content->pager = $pager->render('common/pager');
    }
    
    public function action_detail() {
        $order_id = Arr::get($_GET, 'id');
        
        $m_order = Model::factory('orders', 'admin');
        $order_info = $m_order->getRow(array('id'=>$order_id, 'member_id'=>$this->user['id']));
        
        $order_items = array();
        if (!empty($order_info)) {
            $deliver_status_arr = array(
                '0' => '等待发货',
                '1' => '已发货',
            );
            $order_info['deliver_status_str'] = isset($deliver_status_arr[$order_info['deliver_status']]) ? $deliver_status_arr[$order_info['deliver_status']] : '';
            
            $m_order_goods = Model::factory('order_goods', 'admin');
            $order_items = $m_order_goods->getAll(array('order_id'=>$order_id));
        }
        
        $this->content = View::factory('order_detail');
        $this->content->order_info = $order_info;
        $this->content->order_items = $order_items;
    }

    public function action_submit() {
        if (!empty($_POST)) {
            $consignee = Arr::get($_POST, 'consignee');
            $phone = Arr::get($_POST, 'phone');
            $address = Arr::get($_POST, 'address');
        
            $order_id = date('ym').substr(time(), 4).str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $data = array(
                'id' => $order_id,
                'member_id' => $this->user['id'],
                'order_amount' => $this->cart['total'],
                'order_items' => $this->cart['items'],
                'consignee' => $consignee,
                'phone' => $phone,
                'address' => $address,
                'created_at' => time(),
            );
            $m_order = Model::factory('orders', 'admin');
            $m_order->insert($data);
        
            $m_order_goods = Model::factory('order_goods', 'admin');
            foreach ($this->cart['contents'] as $item) {
                $goodsdata = array(
                    'order_id' => $order_id,
                    'goods_id' => $item['id'],
                    'goods_price' => $item['price'],
                    'goods_qty' => $item['qty'],
                    'goods_total' => $item['subtotal'],
                    'goods_opts' => json_encode($item['options']),
                );
                $m_order_goods->insert($goodsdata);
            }
            $this->redirect('order/detail?id='.$order_id);
        }
    }
    
    public function action_pay() {
        $order_id = Arr::get($_GET, 'id');
        
        $m_order = Model::factory('orders', 'admin');
        $info = $m_order->getRow(array('id'=>$order_id, 'member_id'=>$this->user['id']));
        
        $alipay_url = '';
        if (!empty($info)) {
            $order_info = array(
                'order_id' => $order_id,
                'order_amount' => $info['order_amount'],
            );
            
            $payment = Payment::instance('alipay');
            $alipay_url = $payment->get_pay_url($order_info);
        }
        
        $this->content = View::factory('order_pay');
        $this->content->alipay_url = $alipay_url;
    }
    
}

