<?php

class Controller_Vehicle extends Controller_Website {

    public function action_index() {
        $city_pinyin = $this->request->param('city_pinyin', 'bj');

        $city_info = array();
        $all_city = Kohana::config('city');
        foreach ($all_city as $item) {
            if ($city_pinyin == $item[1]) {
                $city_info = array(
                    'city_id' => $item[0],
                    'city_pinyin' => $item[1],
                    'city_name' => $item[2],
                );
            }
        }
        
        $this->content = View::factory('vehicle_index');
        $this->content->city_info = $city_info;
    }
}

