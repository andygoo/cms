<?php

class Controller_Product extends Controller_Shop {

    public function action_index() {
        $m_vehicle = Model::factory('vehicle_source');
        $vehicle_list = $m_vehicle->select(0, 8);
        
        $this->content = View::factory('shop_home');
        $this->content->vehicle_list = $vehicle_list;
    }

    public function action_detail() {
        $id = Arr::get($_GET, 'id', 0);
        $m_vehicle = Model::factory('vehicle_source');
        $vehicle_info = $m_vehicle->getRowById($id);
    
        $this->content = View::factory('shop_product');
        $this->content->vehicle_info = $vehicle_info;
    }
}

