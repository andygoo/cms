<?php

class Controller_Member extends Controller_Shop {

    public function __construct(Request $request) {
        parent::__construct($request);
        
        if (empty($this->user)) {
            $this->redirect('user/login');
        }
    }
    
    public function action_logout() {
        $auth = Auth::instance();
        $ret = $auth->logout();
        if ($ret) {
            $this->redirect('product');
        }
    }
}

