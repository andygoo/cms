<?php

class Controller_Shop extends Controller_Website {

    public function action_tt() {
        $data = array(
            array(
                'id'      => 'sku_123ABC',
                'qty'     => 1,
                'price'   => 39.95,
                'options' => array('Size' => 'L', 'Color' => 'Red')
            ),
            array(
                'id'      => 'sku_567ZYX',
                'qty'     => 1,
                'price'   => 9.95,
            ),
        );
        $this->cart = new Cart;
        $this->cart->insert($data);
    }
    
    public function action_cart() {
        $this->cart = new Cart;
        $contents = $this->cart->contents();
        var_dump($contents);
        $this->content = View::factory('shop_cart');
    }
    
    public function action_checkout() {
        $this->content = View::factory('shop_checkout');
    }
}

