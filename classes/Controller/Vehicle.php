<?php

class Controller_Vehicle extends Controller_Website {

    protected $city_info = array();
    
    public function __construct(Request $request) {
        parent::__construct($request);
        $city_pinyin = $this->request->param('city_pinyin', 'bj');

        $all_city = Kohana::config('city');
        foreach ($all_city as $item) {
            if ($city_pinyin == $item[1]) {
                $this->city_info = array(
                    'city_id' => $item[0],
                    'city_pinyin' => $item[1],
                    'city_name' => $item[2],
                );
            }
        }
        
        if ($this->auto_render === TRUE) {
            View::bind_global('city_info', $this->city_info);
        }
    }
    
    public function action_index() {
        $this->content = View::factory('vehicle_index');
    }
    
    public function action_detail() {
        $id = $this->request->param('id');
        $m_vehicle = Model::factory('vehicle_source');
        $vehicle_info = $m_vehicle->getRowById($id);
    
        $this->content = View::factory('vehicle_detail');
        $this->content->vehicle_info = $vehicle_info;
    }
    
}

