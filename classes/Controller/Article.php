<?php

class Controller_Article extends Controller_Website {

    public function action_index() {
        $cid = Arr::get($_GET, 'cid');
    
        if (isset($_GET['page'])) {
            $where = array();
            $where['cid'] = $cid;
            $where['status'] = 'open';
            $where['ORDER'] = 'id DESC';
            $where = array_filter($where);

            $m_article = Model::factory('article', 'cms');
            $total = $m_article->count($where);
            $pager = new Pager($total, 10);
            $list = $m_article->select($pager->offset, $pager->size, $where)->as_array();

            $content = View::factory('article_list/list_incr');
            $content->article_list = $list;
            $next_page = $pager->next_page ? $pager->url($pager->next_page, array('cid'=>$cid)) : '';

            header('Content-Type: application/json; charset=utf-8');
            $ret = array('content' => (string)$content, 'next_page' => $next_page);
            echo json_encode($ret);
            exit;
        }
        
        $list = array();
        $pagers = array();
        $cids = array(1,2,3,5);
        foreach ($cids as $cid) {
            $where = array();
            $where['cid'] = $cid;
            $where['status'] = 'open';
            $where['ORDER'] = 'featured DESC,id DESC';
            $where = array_filter($where);

            $m_article = Model::factory('article', 'cms');
            $total = $m_article->count($where);
            $pager = new Pager($total, 10);
            $pagers[$cid] = $pager->next_page ? $pager->url($pager->next_page, array('cid'=>$cid)) : '';
            $list[$cid] = $m_article->select($pager->offset, $pager->size, $where)->as_array();
        }

        $this->content = View::factory('article_list');
        $this->content->list = $list;
        $this->content->next_page = $pagers;
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
        
        $this->content = View::factory('article_list');
        $this->content->list = $list;
        $this->content->pager = $pager->render('article/pager');
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

