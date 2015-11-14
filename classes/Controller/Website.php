<?php

abstract class Controller_Website extends Controller {

    protected $title = '';
    protected $content;
    protected $history;

    public function before() {
        if ($this->request->user_agent('mobile')) {
            Request::$theme = 'mobile';
        }
        parent::before();

        $history_list = array();
        $history = Cookie::get('history');
        if (!empty($history)) {
            $ids = explode(',', $history);
            $m_article = Model::factory('article');
            $where = array('id'=>$ids);
            $where['ORDER'] = "FIELD(id, $history)";
            $history_list = $m_article->getAll($where);
        }
        
        $this->history = View::factory('history');
        $this->history->list = $history_list;
        
        $m_category = Model::factory('category');
        $catlist = $m_category->getAll(array('status'=>'open'));
        
        if ($this->auto_render === TRUE) {
            View::bind_global('uri', $this->request->uri);
            View::bind_global('controller', $this->request->controller);
            View::bind_global('action', $this->request->action);
            View::bind_global('title', $this->title);
            View::bind_global('content', $this->content);
            View::bind_global('catlist', $catlist);
            View::bind_global('history', $this->history);
        }
    }
    
    public function after() {
        parent::after();

        if ($this->auto_render !== TRUE) {
            header('Content-Type: application/json; charset=utf-8');
            $ret = array(
                'content'=>(string)$this->content, 
                'history'=>(string)$this->history, 
            );
            echo json_encode($ret);
            exit;
        }
    }
} 
