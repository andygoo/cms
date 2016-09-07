<?php 

class SearchApi {

    protected static function parseQuery($query) {
        $parse_rlt = array();
        preg_match_all("/([0-9]+)[至到~-]+([0-9]+)万/", $query, $matches);
        if(!empty($matches[1])) {
            $parse_rlt['price_f'] = $matches[1][0];
            $parse_rlt['price_t'] = $matches[2][0];
            $query = str_replace($matches[0],"",$query);
        } else {
            preg_match_all("/([0-9]+)万/",$query, $matches);
            if(!empty($matches[1])) {
                $parse_rlt['price_f'] = $matches[1][0];
                $parse_rlt['price_t'] = $matches[1][0];
                $query = str_replace($matches[0]," ", $query);
            }
        }
        
        $keywords = Kohana::config('keyword');
        foreach ($keywords as $type=>$item) {
            foreach ($item as $word => $value) {
                if ($type == 'series' && $query == $word) {
                    list($series_id, $brand_id) = explode('|', $value);
                    $parse_rlt['brand_id'] = $brand_id;
                    $parse_rlt['class_id'] = $series_id;
                    break;
                }
                if ($type == 'brand' && $query == $word) {
                    $parse_rlt['brand_id'] = $value;
                    break;
                }
            }
        }
        
        return $parse_rlt;
    }
    
    public static function query($params, $query, $page_num, $page_size) {
        $params_q = self::parseQuery($query);
        $params = array_merge($params, $params_q);
        
        $ret = self::search($params, $page_num, $page_size);
        $ret['query'] = $params_q;
        return $ret;
    }
    
    public static function search($params, $page_num, $page_size) {
        $where = array();
        foreach ($params as $key => $value) {
            switch ($key) {
                case 'city_id':
                    $where[] = "city_id={$value}";
                    break;
                case 'brand_id':
                    $where[] = "brand_id={$value}";
                    break;
                case 'series_id':
                    $where[] = "class_id={$value}";
                    break;
                case 'price_f':
                    $where[] = "seller_price>={$value}";
                    break;
                case 'price_t':
                    $where[] = "seller_price<={$value}";
                    break;
                case 'year_f':
                    $value = strtotime("-$value year");
                    $where[] = "register_time>={$value}";
                    break;
                case 'year_t':
                    $value = strtotime("-$value year");
                    $where[] = "register_time<={$value}";
                    break;
                case 'mile':
                    $value = explode('-', $value);
                    $value = array_filter($value);
                    $mile_list = Common::$mile_list;
                    //$where[] = "miles>={$value}";
                    break;
                case 'mile_f':
                    $where[] = "miles>={$value}";
                    break;
                case 'mile_t':
                    $where[] = "miles<={$value}";
                    break;
                case 'sort_f':
                    $field_arr = array('y'=>'register_time', 'm'=>'miles', 'p'=>'seller_price');
                    $sort_field = $field_arr[$value];
                    break;
                case 'sort_d':
                    $direct_arr = array('a'=>'asc', 'd'=>'desc');
                    $sort_direct = $direct_arr[$value];
                    break;
                default:
                    break;
            }
        }
        
        $m_vehicle = Model::factory('vehicle_source');
        
        $where = !empty($where) ? ' WHERE ' . implode(' AND ', $where) : '';
        $count = $m_vehicle->count($where);
        
        if (isset($sort_field) && isset($sort_direct)) {
            $where .= " ORDER BY $sort_field $sort_direct";
        }
        $offset = ($page_num-1) * $page_size;
        $list = $m_vehicle->select($offset, $page_size, $where, '*')->as_array();
        
        return array('list'=>$list, 'count'=>$count);
    }
    
}