<?php

class Controller_Shop extends Controller_Website {

    public $template = 'shop_template';
    protected $cart;
    protected $user;

    public function __construct(Request $request) {
        parent::__construct($request);

        $this->obj_cart = new Cart;
        if ($this->auto_render === TRUE) {
            $this->cart = $this->obj_cart->contents();
            View::bind_global('cart', $this->cart);
        }
        $auth = Auth::instance('member');
        $this->user = $auth->get_user();
        View::bind_global('user', $this->user);
    }
}

