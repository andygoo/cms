<?php

class Controller_Article extends Controller_Website {

    public function action_index() {
        $id = Arr::get($_GET, 'id');
        $m_article = Model::factory('article');
        $article = $m_article->getRow($id);
        if (empty($article)) return;

        $cid = $article['cid'];
        $m_category = Model::factory('category');
        $cat_info = $m_category->getRow($cid);
        $article['cat_name'] = $cat_info['name'];
        
        $where = array('ORDER'=>'id ASC', 'id|>'=>$id);
        $prev_article = $m_article->getRow($where);
        $where = array('ORDER'=>'id DESC', 'id|<'=>$id);
        $next_article = $m_article->getRow($where);
        
        $this->add_history($id);
        
        $pv = $this->get_pv($id);
        $article['pv'] = $pv;
        $this->set_pv($id, $pv+1);
        
        $this->content = View::factory('article');
        $this->content->article = $article;
        $this->content->prev_article = $prev_article;
        $this->content->next_article = $next_article;
    }

    public function add_history($id) {
        $history = Cookie::get('history');
        $history = explode(',', $history);
        array_unshift($history, $id);
        $history = array_map('intval', $history);
        $history = array_unique($history);
        $history = array_filter($history);
        $history = array_slice($history, 0, 10);
        $history = implode(',', $history);
        Cookie::set('history', $history, 30*86400);
    }
    
    public function get_pv($id) {
        $key = 'artivle_pv_'.$id;
        $cache = Cache::instance('sqlite');
        $pv = $cache->get($key, 0);
        return $pv;
    }
    
    public function set_pv($id, $pv) {
        $key = 'artivle_pv_'.$id;
        $cache = Cache::instance('sqlite');
        $cache->set($key, $pv, 86400*365);
    }
}

