<?php

class Controller_Home extends Controller_Website {

    public function action_index() {
        $cid = Arr::get($_GET, 'cid');

        if ($this->request->user_agent('mobile')) {
            $list = array();
            $pager = array();
            $cids = array(1,2,3,5);
            foreach ($cids as $cid) {
                $where = array();
                $where['cid'] = $cid;
                $where['status'] = 'open';
                $where['ORDER'] = 'featured DESC,id DESC';
                $where = array_filter($where);
                
                $m_article = Model::factory('article');
                $total = $m_article->count($where);
                $page = new Pager($total, 10);
                $pager[] = $page;
                $list[] = $m_article->select($page->offset, $page->size, $where)->as_array();
            }
        } else {
            $where = array();
            $where['cid'] = $cid;
            $where['status'] = 'open';
            $where['ORDER'] = 'featured DESC,id DESC';
            $where = array_filter($where);
            
            $m_article = Model::factory('article');
            $total = $m_article->count($where);
            $pager = new Pager($total, 10);
            $list = $m_article->select($pager->offset, $pager->size, $where)->as_array();
            
            $m_category = Model::factory('category');
            $cat_list = $m_category->getAll()->as_array('id', 'name');
            foreach ($list as &$item) {
                $item['cat_name'] = isset($cat_list[$item['cid']]) ? $cat_list[$item['cid']] : '';
            }
            unset($item);
        }
        
        $this->content = View::factory('home');
        $this->content->list = $list;
        $this->content->pager = $pager;
    }

}

