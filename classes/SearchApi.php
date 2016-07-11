<?php 


class SearchApi {

    protected function parseQuery($query) {
        return array();
    }
    
    public function query($query) {
        $params = $this->parseQuery($query);
        return $this->search($params);
    }
    
    public function search($params) {
        return array();
    }
}