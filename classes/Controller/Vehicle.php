<?php

class Controller_Vehicle extends Controller_Website {

    public function action_index() {
        $this->content = View::factory('vehicle_index');
    }
}

