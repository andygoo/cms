<?php

class Controller_Order extends Controller_Shop {

    public function action_index() {
        $order_status_arr = array(
            '0' => '未支付',
            '1' => '待发货',
            '2' => '已收货',
        );
        $this->content = View::factory('shop_order');
        $this->content->order_status_arr = $order_status_arr;
    }

}

