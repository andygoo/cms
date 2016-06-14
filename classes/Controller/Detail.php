<?php

class Controller_Detail extends Controller_Website {
    
    public function action_index() {
        $id = $this->request->param('id');
        $vehicle_info = $this->_getVehicleInfo($id);
        
        $this->content = View::factory('vehicle_detail');
        $this->content->vehicle_info = $vehicle_info;
    }

    protected function _getVehicleInfo($id) {
        $m_vehicle = Model::factory('vehicle_source');
        $info = $m_vehicle->getRowById($id);
        return $info;
    }
    
}

