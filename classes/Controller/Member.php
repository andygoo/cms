<?php

class Controller_Member extends Controller_Website {

    public function __construct(Request $request) {
        parent::__construct($request);
        
        if (empty($this->user)) {
            $this->redirect('user/login');
        }
    }
    
}

