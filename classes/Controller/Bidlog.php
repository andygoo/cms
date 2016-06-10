<?php

class Controller_Bidlog extends Controller_Auction {

    public function action_recent() {
        $logid = Arr::get($_GET, 'logid');
        $item_id = Arr::get($_GET, 'id');
    
        $where = array(
            'id' => array('<'=>$logid),
            'item_id' => $item_id,
            'ORDER' => 'id desc',
        );
    
        $size = 5;
        $m_bidlog = Model::factory('bidlog', 'paimai');
        $total = $m_bidlog->count($where);
        $pager = new Pager($total, $size);
        $list_bidlog = $m_bidlog->select($pager->offset, $pager->size, $where)->as_array();
        $next_page = $pager->next_page ? $pager->url($pager->next_page) : '';
    
        $content = View::factory('auction/bidlog');
        $content->list_bidlog = $list_bidlog;
    
        header('Content-Type: application/json; charset=utf-8');
        $ret = array('content' => (string)$content, 'next_page' => $next_page);
        echo json_encode($ret);
        exit;
    }
    
    public function action_latest() {
        $logid = Arr::get($_GET, 'logid');
        $item_id = Arr::get($_GET, 'id');
    
        $where = array(
            'id' => array('>'=>$logid),
            'item_id' => $item_id,
            'ORDER' => 'id desc',
        );
        $m_bidlog = Model::factory('bidlog', 'paimai');
        $list_bidlog = $m_bidlog->getAll($where)->as_array();
    
        $content = View::factory('auction/bidlog');
        $content->list_bidlog = $list_bidlog;
    
        header('Content-Type: application/json; charset=utf-8');
        $ret = array('content' => (string)$content);
        echo json_encode($ret);
        exit;
    }

}

