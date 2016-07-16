<?php

class Controller_Article extends Controller_Website {

    public function action_index() {
        $all_list = array();
        $m_article = Model::factory('article', 'cms');
        
        $cids = array(1,2,3,5);
        foreach ($cids as $cid) {
            $where = array();
            $where['cid'] = $cid;
            $where['status'] = 'open';
            $where['ORDER'] = 'featured DESC,id DESC';
            $where = array_filter($where);
            $all_list[$cid] = $m_article->select(0, 6, $where)->as_array();
        }

        $this->content = View::factory('article_index');
        $this->content->all_list = $all_list;
    }
    

    public function action_list() {
        $cid = Arr::get($_GET, 'cid');
        
        $where = array();
        $where['cid'] = $cid;
        $where['status'] = 'open';
        $where['ORDER'] = 'id DESC';
        $where = array_filter($where);
        
        $m_article = Model::factory('article', 'cms');
        $total = $m_article->count($where);
        $pager = new Pager($total, 10);
        $list = $m_article->select($pager->offset, $pager->size, $where)->as_array();
        
        $m_category = Model::factory('category', 'cms');
        $cat_list = $m_category->getAll()->as_array('id', 'name');
        foreach ($list as &$item) {
            $item['cat_name'] = isset($cat_list[$item['cid']]) ? $cat_list[$item['cid']] : '';
        }
        unset($item);
        
        if (isset($_GET['get_next_page'])) {
            $content = View::factory('article/list_incr');
            $content->list = $list;
            $next_page = $pager->next_page ? $pager->url($pager->next_page, array('cid'=>$cid, 'get_next_page'=>'ajax')) : '';
        
            header('Content-Type: application/json; charset=utf-8');
            $ret = array('content' => (string)$content, 'next_page' => $next_page);
            echo json_encode($ret);
            exit;
        }
        
        $this->content = View::factory('article_list');
        $this->content->list = $list;
        $this->content->pager = $pager->render('common/pager');
        $this->content->next_page = $pager->next_page ? $pager->url($pager->next_page, array('cid'=>$cid, 'get_next_page'=>'ajax')) : '';
    }
    
    public function action_detail() {
        $id = Arr::get($_GET, 'id');
        $m_article = Model::factory('article', 'cms');
        $article = $m_article->getRowById($id);
        
        $this->title = $article['title'];
        $this->content = View::factory('article_detail');
        $this->content->article = $article;
    }
    
    public function action_customurl() {
        $customurl = $this->request->param('customurl');
        $m_article = Model::factory('article', 'cms');
        $article = $m_article->getRow(array('custom_url'=>$customurl));

        $this->title = $article['title'];
        $this->content = View::factory('article_detail');
        $this->content->article = $article;
    }

}

