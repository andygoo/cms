<?php 

class SEO {

    public static function getBrandPinyin() {
        $redis = Cache::instance('redis');
        $cache_key = '_ALL_BRAND_PINYIN_';
        $data = $redis->get($cache_key);
        if (empty($data)) {
            $m_brand = Model::factory('auto_brand');
            $data = $m_brand->getAll('', 'id,pinyin')->as_array();
            $data = array_column($data, 'pinyin', 'id');
            $data = array_map(function ($v) {return preg_replace('/[^0-9a-z]/', '', strtolower($v));}, $data);
            $redis->setex($cache_key, 86400, json_encode($data));
        } else {
            $data = json_decode($data, true);
        }
        return $data;
    }
    
    public static function getSeriesPinyin() {
        $redis = Cache::instance('redis');
        $cache_key = '_ALL_SERIES_PINYIN_';
        $data = $redis->get($cache_key);
        if (empty($data)) {
            $m_brand = Model::factory('auto_series');
            $data = $m_brand->getAll('', 'id,pinyin')->as_array();
            $data = array_column($data, 'pinyin', 'id');
            $data = array_map(function ($v) {return preg_replace('/[^0-9a-z]/', '', strtolower($v));}, $data);
    
            $tmp = array();
            foreach ($data as $id => $pinyin) {
                if (isset($tmp[$pinyin])) {
                    $tmp[$pinyin] += 1;
                    $data[$id] = $pinyin . $tmp[$pinyin];
                } else {
                    $tmp[$pinyin] = 1;
                }
            }
    
            $redis->setex($cache_key, 86400, json_encode($data));
        } else {
            $data = json_decode($data, true);
        }
        return $data;
    }
}