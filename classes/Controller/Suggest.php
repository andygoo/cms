<?php

class Controller_Suggest extends Controller_Ajax {

    public function action_index() {
        if(empty($_GET['query'])) {
            $this->response = array();
            return ;
        }
        
        $ret = array();
        $query = strtolower(trim($_GET['query']));
        $suggest_data = Kohana::config('suggest');
        if (isset($suggest_data[$query])) {
            $ret = $suggest_data[$query];
            $ret = array_values(array_unique($ret));
            $ret = array_slice($ret, 0, 10);
        }
        
        $this->response = $ret;
    }
}

