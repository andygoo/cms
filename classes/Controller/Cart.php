<?php

class Controller_Cart extends Controller_Shop {

    public function action_index() {
        $this->content = View::factory('shop_cart');
    }
    
    public function action_checkout() {
        $this->content = View::factory('shop_checkout');
    }
    
    public function action_add() {
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

    public function action_update() {
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

    public function action_clear() {
        $this->cart->destroy();
        $this->redirect(Request::$referrer);
    }
    
}

