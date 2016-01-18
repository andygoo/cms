<?php

abstract class Controller_Website extends Controller {

    protected $title;
    protected $content;

    public function before() {
        if ($this->request->user_agent('mobile')) {
            Request::$theme = 'mobile';
        }
        parent::before();
        
        if ($this->auto_render === TRUE) {
            View::bind_global('uri', $this->request->uri);
            View::bind_global('controller', $this->request->controller);
            View::bind_global('action', $this->request->action);
            View::bind_global('title', $this->title);
            View::bind_global('content', $this->content);
        }
    }
    
    public function after() {
        parent::after();

        if ($this->auto_render !== TRUE) {
            $this->request->response = (string)$this->content;//->render();
        }
    }
} 
