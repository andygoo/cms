<?php

class Controller_Shop extends Controller_Website {

    public $template = 'shop_template';
    protected $user;

    public function __construct(Request $request) {
        parent::__construct($request);

        $this->cart = new Cart;
        if ($this->auto_render === TRUE) {
            $cart = $this->cart->contents();
            View::bind_global('cart', $cart);
        }
        $auth = Auth::instance('member');
        $this->user = $auth->get_user();
        View::bind_global('user', $this->user);
    }
    
/*
    public function action_product() {
        $m_vehicle = Model::factory('vehicle_source');
        $vehicle_list = $m_vehicle->select(0, 8);
        
        $this->content = View::factory('shop_product');
        $this->content->vehicle_list = $vehicle_list;
    }
    
    public function action_cart() {
        $this->content = View::factory('shop_cart');
    }
    
    public function action_checkout() {
        $this->content = View::factory('shop_checkout');
    }
    
    public function action_order() {
        $order_status_arr = array(
            '0' => '未支付',
            '1' => '待发货',
            '2' => '已收货',
        );
        $this->content = View::factory('shop_order');
        $this->content->order_status_arr = $order_status_arr;
    }

    public function action_addcart() {
        $id = Arr::get($_GET, 'id');
        
        $m_vehicle = Model::factory('vehicle_source');
        $vehicle_info = $m_vehicle->getRowById($id);
        
        if (!empty($vehicle_info)) {
            $opts = array(
                'title' => $vehicle_info['vehicle_name'], 
                'pic' => 'http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210',
                'url' => URL::site('detail/'.$id),
            );
            $data = array(
                'id'      => $id,
                'qty'     => 1,
                'price'   => $vehicle_info['seller_price'],
                'options' => $opts,
            );
            $this->cart->insert($data);
        }
        $cart = $this->cart->contents();
        
        $this->content = View::factory('shop/mini-cart');
        $this->content->cart = $cart;
    }

    public function action_upcart() {
        $rowid = Arr::get($_GET, 'id');
        $qty = Arr::get($_GET, 'qty');
		$data = array(
			'rowid'   => $rowid,
			'qty'     => $qty,
		);
		$this->cart->update($data);
        $cart = $this->cart->contents();
        
        $this->content = View::factory('shop/mini-cart');
        $this->content->cart = $cart;
    }

    public function action_clrcart() {
        $this->cart->destroy();
        $this->redirect(Request::$referrer);
    }
    */
}

