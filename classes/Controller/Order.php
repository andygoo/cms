<?php

class Controller_Order extends Controller_Shop {

    public function action_index() {
        $order_id = Arr::get($_GET, 'id');
        
        $m_order = Model::factory('orders', 'admin');
        $order_info = $m_order->getRow(array('id'=>$order_id, 'member_id'=>$this->user['id']));
        
        $order_items = array();
        if (!empty($order_info)) {
            $m_order_goods = Model::factory('order_goods', 'admin');
            $order_items = $m_order_goods->getAll(array('order_id'=>$order_id));
        }
        
        $this->content = View::factory('shop_order');
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
            $this->redirect('order?id='.$order_id);
        }
    }
    
    public function action_pay() {
        
        $this->content = View::factory('order_pay');
    }
    
}

