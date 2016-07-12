<?php 
define('CODE_BASE', 'D:/codebasev1');
require_once CODE_BASE . "/api/search_api/SearchApi.php";

class SearchApi2 {

    public static function search($params, $page_num, $page_size) {
        //return require_once 'D:/test/test_vehicle.php';
        $ret = array('data'=>array('count'=>0,'vehicles'=>array()), 'query'=>array());

        $cityid = $params['city_id'];
        
        $field = 'time';
        $direct = '1';
        if (isset($params['sort_f']) && isset($params['sort_d'])) {
            $field_arr = array('y'=>'register_time', 'm'=>'miles', 'p'=>'price');
            $direct_arr = array('a'=>'0', 'd'=>'1');
            $field = $params['sort_f'];
            $direct = $params['sort_d'];
            $field = $field_arr[$field];
            $direct = $direct_arr[$direct];
        }
        
        if (!empty($_GET['kw'])) {
            $query_filter = array(
                'query' => htmlspecialchars($_GET['kw']),
                'city' => $cityid,
            );
            $query_filter = array_filter($query_filter);
            $ret = SearchApi::getMsVehicles($query_filter, $page_num, $page_size, SearchApi::ONSALE);
        } else {
            $query_filter = self::_buildQueryCondition($params);
            $query_filter['city'] = $cityid;
            $query_filter['type'] = array(1, 1);
            $query_filter = array_filter($query_filter);
            $query = array(
                'query' => $query_filter,
                'page_num' => $page_num,
                'page_size' => $page_size,
                'order' => $field,
                'desc' => $direct,
                'offsite' => 0,
            );
            $ret = SearchApi::SearchMs($query);
        }
        
        if ($ret['errno']==0 && !empty($ret['data']['vehicles'])) {
            foreach ($ret['data']['vehicles'] as &$vehicle) {
                $vehicle['json'] = base64_decode($vehicle['json']);
                $vehicle_info = json_decode($vehicle['json'], true);
                $vehicle = array_merge($vehicle_info, $vehicle);
                unset($vehicle['json']);
                unset($vehicle['name']);
            }
            unset($vehicle);
        }
        return $ret;
    }
    
    protected static function _buildQueryCondition($params) {
        $ret = array();
        if (isset($params['brand_id'])) {
            $ret['brand_id'] = $params['brand_id'];
        }
        if (isset($params['series_id'])) {
            $ret['class_id'] = $params['series_id'];
        }
         
        $price = array();
        if (isset($params["price_f"])) {
            $price[] = $params["price_f"];
        }
        if (isset($params["price_t"])) {
            $price[] = $params["price_t"];
        }
        $ret['price'] = $price;
    
        $year = array();
        if (isset($params["year_f"])) {
            $y = date('Y') - $params["year_f"];
            $m = date('m');
            $year[] = strtotime("$y-$m-01");
        }
        if (isset($params["year_t"])) {
            $y = date('Y') - $params["year_t"];
            $m = date('m');
            $year[] = strtotime("$y-$m-01");
        }
        $ret['register_time'] = $year;
         
        $mile = array();
        if (isset($params["mile_f"])) {
            $mile[] = $params["mile_f"];
        }
        if (isset($params["mile_t"])) {
            $mile[] = $params["mile_t"];
        }
        $ret['miles'] = $mile;
    
        return array_filter($ret);
    }
    
}