<?php

class Controller_User extends Controller_Shop {

    public function __construct(Request $request) {
        parent::__construct($request);
        
        if (!empty($this->user)) {
            $this->redirect('product');
        }
    }
    
    public function action_login() {
        if (!empty($_POST)) {
            $username = Arr::get($_POST, 'username');
            $password = Arr::get($_POST, 'password');
            $auth = Auth::instance('member');
            if ($auth->login($username, $password)) {
                $this->redirect(Request::$referrer);
            }
        }
        $this->content = View::factory('user_login');
    }

    public function action_register() {
        if (!empty($_POST)) {
            $username = Arr::get($_POST, 'username');
            $password = Arr::get($_POST, 'password');
            $this->redirect(Request::$referrer);
        }
        $this->content = View::factory('user_register');
    }
    
}

