<?php 

class SearchApi {

    protected function parseQuery($query) {
        return array();
    }
    
    public static function query($query) {
        $params = $this->parseQuery($query);
        return $this->search($params);
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
                case 'mile_f':
                    $where[] = "miles>={$value}";
                    break;
                case 'mile_t':
                    $where[] = "miles<={$value}";
                    break;
                case 'sort_f':
                    $field_arr = array('y'=>'register_time', 'm'=>'miles', 'p'=>'seller_price');
                    $sort_field = $field_arr[$value];
                case 'sort_d':
                    $direct_arr = array('a'=>'asc', 'd'=>'desc');
                    $sort_direct = $field_arr[$value];
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