<?php

class Controller_History extends Controller_Website {

    public function action_index() {
        $history_list = array();
        $history = Cookie::get('history');
        if (!empty($history)) {
            $ids = explode(',', $history);
            $m_article = Model::factory('article');
            $where = array('id'=>$ids);
            $where['ORDER'] = "FIELD(id, $history)";
            $history_list = $m_article->getAll($where);
        }
        
        $this->content = View::factory('history');
        $this->content->article_list = $history_list;
    }
}

