<?php

class Controller_Shop extends Controller_Website {

    public $template = 'shop_template';
    protected $cart;

    public function __construct(Request $request) {
        parent::__construct($request);

        $this->obj_cart = new Cart;
        if ($this->auto_render === TRUE) {
            $this->cart = $this->obj_cart->contents();
            View::bind_global('cart', $this->cart);
        }
    }
}

