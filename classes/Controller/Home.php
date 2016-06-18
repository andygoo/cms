<?php

class Controller_Home extends Controller_Website {

    public function action_index() {
        //Kohana::$log->add(Log::DEBUG, 'dddsdsdsdsdsdsd');
        //echo $d;
        //throw new Kohana_Exception('Directory :dir must be writable', array(
        //        ':dir' => 'dddddddddddddd'
        //));
        $this->content = View::factory('home');
    }
}

