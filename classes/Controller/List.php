<?php
define('CODE_BASE', 'D:/codebasev1');
require_once CODE_BASE . "/api/search_api/SearchApi.php";

class Controller_List extends Controller_Website {
    
    protected $params = array();
    protected $_filter_array = array();
    protected $filter_list = array();
    protected $city_info = array();

    public function __construct(Request $request) {
        parent::__construct($request);

        $this->params = $this->request->param();
        //$this->params = $_GET;
        $this->params = array_filter($this->params, 'strlen');
        
        $allowed = array(
                'city_pinyin', 'brand_id', 'series_id',
                'price_f', 'price_t', 'mile_f', 'mile_t',
                'year_f', 'year_t', 'sort_f', 'sort_d',
        );
        
        $this->_filter_array = array_intersect_key($this->params, array_flip($allowed));
    }
    
    public function action_index() {

        if (isset($_GET['get_vehicle_count'])) {
            unset($_GET['get_vehicle_count']);
            if ($this->auto_render === false) {
                $year_list = $this->_getYearList();
                $miles_list = $this->_getMilesList();
                
                $view = View::factory('vehicle_list/list_more');
                $view->year_list = $year_list;
                $view->miles_list = $miles_list;
                echo $view;
                exit;
            }
        }
        if (isset($_GET['get_vehicle_series'])) {
            unset($_GET['get_vehicle_series']);
            if ($this->auto_render === false) {
                $series_list = array();
                if (isset($this->_filter_array['brand_id'])) {
                    $brand_id = $this->_filter_array['brand_id'];
                    $series_list = $this->_getSeriesList($brand_id);
                }
                
                $view = View::factory('vehicle_list/list_series');
                $view->series_list = $series_list;
                echo $view;
                exit;
            }
        }
        
        $city_list = $this->_getCityList();
        
        $size = 10;
        //*/
        $total = $this->_getVehicleCount();
        $pager = new Pager($total, $size, 'route');
        //$pager = new Pager($total, $size);
        $vehicle_list = $this->_getVehicleList($pager->offset, $pager->size)->as_array();
        /*/
        $page_num = $this->request->param('page', 1);
        $ret = $this->_getVehicleListOnSale($page_num, $size);
        $vehicle_list = $ret['data']['vehicles'];
        $total = $ret['data']['count'];
        $pager = new Pager($total, $size, 'route');
        $query = $ret['query'];
        if (!empty($query)) {
            $this->_getColsFromQuery($query);
            if (isset($this->_filter_array['brand_id'])) {
                $brand_id = $this->_filter_array['brand_id'];
                $series_list = $this->_getSeriesList($brand_id);
            }
        }
        //*/
        $this->_format_list($vehicle_list);

        if ($this->auto_render === false) {
            $view = View::factory('vehicle_list/list_vehicle');
            $view->vehicle_list = $vehicle_list;
            echo $view;
            exit;
        }

        $brand_list = $this->_getBrandList();
        $price_list = $this->_getPriceList();
        $year_list = $this->_getYearList();
        $miles_list = $this->_getMilesList();
        $sort_list = $this->_getSortList();

        $series_list = array();
        if (isset($this->_filter_array['brand_id'])) {
            $brand_id = $this->_filter_array['brand_id'];
            $series_list = $this->_getSeriesList($brand_id);
        }
        
        $filter_list = $this->filter_list;
        uksort($filter_list, function ($a, $b) {
            $sort_filter = array_flip(array('brand', 'series', 'price', 'year', 'mile'));
            return $sort_filter[$a] > $sort_filter[$b];
        });
        
        $this->content = View::factory('list');
        $this->content->city_list = $city_list;
        $this->content->city_info = $this->city_info;
        
        $this->content->brand_list = $brand_list;
        $this->content->series_list = $series_list;
        $this->content->price_list = $price_list;
        $this->content->year_list = $year_list;
        $this->content->miles_list = $miles_list;
        $this->content->sort_list = $sort_list;
        $this->content->filter_list = $filter_list;
        $this->content->vehicle_list = $vehicle_list;
        
        //var_dump($pager->url($pager->next_page));exit;
        
        $this->content->total_items = $pager->total_items;
        $this->content->curr_page = $pager->current_page;
        $this->content->total_pages = $pager->total_pages;
        $this->content->page_url = $this->_getUrl(array('page'=>''));
    }

    protected function _getCityList() {
        $city_list = array();
        $all_city = Kohana::config('city');
        
        if (empty($this->_filter_array['city_pinyin'])) {
            $this->_filter_array['city_pinyin'] = 'bj';
        }
        
        foreach ($all_city as $item) {
            $selected = ($this->_filter_array['city_pinyin'] == $item[1]);
            $city_list[] = array(
                 'city_id' => $item[0],
                 'city_pinyin' => $item[1],
                 'city_name' => $item[2],
                 'selected' => $selected,
                 'url' => $this->_getUrl(array('city_pinyin' => $item[1])),
            );
            if ($selected) {
                $this->_filter_array['city_id'] = $item[0];
                $this->city_info = array(
                     'city_id' => $item[0],
                     'city_pinyin' => $item[1],
                     'city_name' => $item[2],
                );
            }
        }

        return $city_list;
    }
    
    protected function _getBrandList() {
        $m_brand = Model::factory('auto_brand');
        $brand_list = $m_brand->getAll()->as_array();
        
        $list = array();
        foreach($brand_list as $item) {
            $brand_id = $item['id'];
            $selected = isset($this->_filter_array['brand_id']) && ($brand_id == $this->_filter_array['brand_id']);
            $list[$item['first_char']][] = array(
                'id' => $brand_id,
                'desc' => $item['name'],
                'url' => $this->_getUrl(array(
                    'brand_id' => $brand_id 
                )),
                'selected' => $selected 
            );
            if ($selected) {
                $this->filter_list['brand'] = array(
                    'desc' => $item['name'],
                    'url' => $this->_getUrl(array(
                        'brand_id' => '' 
                    )) 
                );
            }
        }
        ksort($list);
        return $list;
    }

    protected function _getSeriesList($brand_id) {
        $m_series = Model::factory('auto_series');
        $series_list = $m_series->getAll(array(
            'brand_id' => $brand_id 
        ))->as_array();
        
        $list = array();
        $list[] = array(
            'desc' => '不限',
            'url' => $this->_getUrl(array(
                'series_id' => '',
            )),
            'selected' => !isset($this->_filter_array['series_id']),
        );
        foreach($series_list as $item) {
            $series_id = $item['id'];
            $selected = isset($this->_filter_array['series_id']) && ($series_id == $this->_filter_array['series_id']);
            $list[] = array(
                'desc' => $item['name'],
                'url' => $this->_getUrl(array(
                    'brand_id' => $brand_id,
                    'series_id' => $series_id 
                )),
                'selected' => $selected 
            );
            if ($selected) {
                $this->filter_list['series'] = array(
                    'desc' => $item['name'],
                    'url' => $this->_getUrl(array(
                        'brand_id' => $brand_id,
                        'series_id' => '' 
                    )) 
                );
            }
        }
        return $list;
    }

    protected function _getPriceList() {
        $pf = -1;
        $pt = -1;
        if (!empty($this->_filter_array['price_f']) || !empty($this->_filter_array['price_t'])) {
            $pf = $this->_filter_array['price_f'];
            $pt = $this->_filter_array['price_t'];
        }
        $selected_idx = 0;
        
        $list = array(
            array(
                'desc' => '不限',
                'url' => $this->_getUrl(array(
                    'price_f' => '',
                    'price_t' => '' 
                )),
                'selected' => ($pf == -1 && $pt == -1) 
            ),
            array(
                'desc' => '2万以内',
                'url' => $this->_getUrl(array(
                    'price_f' => 0,
                    'price_t' => 2 
                )),
                'selected' => ($pf == 0 && $pt == 2 && $selected_idx = 1) 
            ),
            array(
                'desc' => '2-3万',
                'url' => $this->_getUrl(array(
                    'price_f' => 2,
                    'price_t' => 3 
                )),
                'selected' => ($pf == 2 && $pt == 3 && $selected_idx = 2) 
            ),
            array(
                'desc' => '3-5万',
                'url' => $this->_getUrl(array(
                    'price_f' => 3,
                    'price_t' => 5 
                )),
                'selected' => ($pf == 3 && $pt == 5 && $selected_idx = 3) 
            ),
            array(
                'desc' => '5-7万',
                'url' => $this->_getUrl(array(
                    'price_f' => 5,
                    'price_t' => 7 
                )),
                'selected' => ($pf == 5 && $pt == 7 && $selected_idx = 4) 
            ),
            array(
                'desc' => '7-9万',
                'url' => $this->_getUrl(array(
                    'price_f' => 7,
                    'price_t' => 9 
                )),
                'selected' => ($pf == 7 && $pt == 9 && $selected_idx = 5) 
            ),
            array(
                'desc' => '9-12万',
                'url' => $this->_getUrl(array(
                    'price_f' => 9,
                    'price_t' => 12 
                )),
                'selected' => ($pf == 9 && $pt == 12 && $selected_idx = 6) 
            ),
            array(
                'desc' => '12-15万',
                'url' => $this->_getUrl(array(
                    'price_f' => 12,
                    'price_t' => 15 
                )),
                'selected' => ($pf == 12 && $pt == 15 && $selected_idx = 7) 
            ),
            array(
                'desc' => '15-20万',
                'url' => $this->_getUrl(array(
                    'price_f' => 15,
                    'price_t' => 20 
                )),
                'selected' => ($pf == 15 && $pt == 20 && $selected_idx = 8) 
            ),
            array(
                'desc' => '20-30万',
                'url' => $this->_getUrl(array(
                    'price_f' => 20,
                    'price_t' => 30 
                )),
                'selected' => ($pf == 20 && $pt == 30 && $selected_idx = 9) 
            ),
            array(
                'desc' => '30万以上',
                'url' => $this->_getUrl(array(
                    'price_f' => 30,
                    'price_t' => 10000 
                )),
                'selected' => ($pf == 30 && $pt == 10000 && $selected_idx = 10) 
            ) 
        );
        
        if ($selected_idx != 0) {
            $this->filter_list['price'] = array(
                'desc' => $list[$selected_idx]['desc'],
                'url' => $list[0]['url'] 
            );
        }
        return $list;
    }

    protected function _getSortList() {
        $sf = '';
        $od = '';
        if (isset($this->_filter_array['sort_f'])) {
            $sf = $this->_filter_array['sort_f'];
        }
        if (isset($this->_filter_array['sort_d'])) {
            $od = $this->_filter_array['sort_d'];
        }
        $list = array(
            array(
                'desc' => '默认排序',
                'url' => $this->_getUrl(array(
                    "sort_f" => '',
                    "sort_d" => '' 
                )),
                'selected' => ($sf == "" && $od == "") 
            ),
            array(
                'desc' => '价格低到高',
                'url' => $this->_getUrl(array(
                    "sort_f" => 'p',
                    "sort_d" => 'a' 
                )),
                'selected' => ($sf == "p" && $od == "a") 
            ),
            array(
                'desc' => '价格高到低',
                'url' => $this->_getUrl(array(
                    "sort_f" => 'p',
                    "sort_d" => 'd' 
                )),
                'selected' => ($sf == "p" && $od == "d") 
            ),
            array(
                'desc' => '车龄新到旧',
                'url' => $this->_getUrl(array(
                    "sort_f" => 'y',
                    "sort_d" => 'd' 
                )),
                'selected' => ($sf == "y" && $od == "d") 
            ),
            array(
                'desc' => '里程短到长',
                'url' => $this->_getUrl(array(
                    "sort_f" => 'm',
                    "sort_d" => 'a' 
                )),
                'selected' => ($sf == "m" && $od == "a") 
            ) 
        );
        return $list;
    }

    protected function _getYearList() {
        $year_f = -1;
        $year_t = -1;
        if (!empty($this->_filter_array['year_f']) || !empty($this->_filter_array['year_t'])) {
            $year_f = $this->_filter_array['year_f'];
            $year_t = $this->_filter_array['year_t'];
        }
        
        $year_list = array(
            array('year_f'=>1, 'year_t'=>0, 'desc'=>'1年内'), 
            array('year_f'=>3, 'year_t'=>1, 'desc'=>'1-3年'),
            array('year_f'=>5, 'year_t'=>3, 'desc'=>'3-5年'),
            array('year_f'=>8, 'year_t'=>5, 'desc'=>'5-8年'),
            array('year_f'=>100, 'year_t'=>8, 'desc'=>'8年以上'),
        );
        foreach($year_list as $item) {
            $selected = ($year_f == $item['year_f'] && $year_t == $item['year_t']);
            if ($selected) {
                $url = $this->_getUrl(array('year_f' => '', 'year_t' => ''));
                $this->filter_list['year'] = array(
                    'desc' => $item['desc'],
                    'url' => $url,
                );
            } else {
                $url = $this->_getUrl(array('year_f' => $item['year_f'], 'year_t' => $item['year_t']));
            }
            $list[] = array(
                'url' => $url,
                'desc' => $item['desc'],
                'selected' => $selected,
            );
        }
        
        return $list;
    }

    protected function _getMilesList() {
        $mile_f = -1;
        $mile_t = -1;
        if (!empty($this->_filter_array['mile_f']) || !empty($this->_filter_array['mile_t'])) {
            $mile_f = $this->_filter_array['mile_f'];
            $mile_t = $this->_filter_array['mile_t'];
        }
        
        $mile_list = array(
                array('mile_f'=>0, 'mile_t'=>2, 'desc'=>'2万公里内'),
                array('mile_f'=>0, 'mile_t'=>5, 'desc'=>'5万公里内'),
                array('mile_f'=>1, 'mile_t'=>3, 'desc'=>'1~3万公里'),
                array('mile_f'=>3, 'mile_t'=>5, 'desc'=>'3~5万公里'),
                array('mile_f'=>5, 'mile_t'=>8, 'desc'=>'5~8万公里'),
                array('mile_f'=>8, 'mile_t'=>100, 'desc'=>'8万公里以上'),
        );
        foreach($mile_list as $item) {
            $selected = ($mile_f == $item['mile_f'] && $mile_t == $item['mile_t']);
            if ($selected) {
                $url = $this->_getUrl(array('mile_f' => '', 'mile_t' => ''));
                $this->filter_list['mile'] = array(
                        'desc' => $item['desc'],
                        'url' => $url,
                );
            } else {
                $url = $this->_getUrl(array('mile_f' => $item['mile_f'], 'mile_t' => $item['mile_t']));
            }
            $list[] = array(
                    'url' => $url,
                    'desc' => $item['desc'],
                    'selected' => $selected,
            );
        }
        return $list;
    }

    protected function _buildQueryCondition() {
        $ret = array();
        if (isset($this->_filter_array['brand_id'])) {
            $ret['brand_id'] = $this->_filter_array['brand_id'];
        }
        if (isset($this->_filter_array['series_id'])) {
            $ret['class_id'] = $this->_filter_array['series_id'];
        }
         
        $price = array();
        if (isset($this->_filter_array["price_f"])) {
            $price[] = $this->_filter_array["price_f"];
        }
        if (isset($this->_filter_array["price_t"])) {
            $price[] = $this->_filter_array["price_t"];
        }
        $ret['price'] = $price;
    
        $year = array();
        if (isset($this->_filter_array["year_f"])) {
            $y = date('Y') - $this->_filter_array["year_f"];
            $m = date('m');
            $year[] = strtotime("$y-$m-01");
        }
        if (isset($this->_filter_array["year_t"])) {
            $y = date('Y') - $this->_filter_array["year_t"];
            $m = date('m');
            $year[] = strtotime("$y-$m-01");
        }
        $ret['register_time'] = $year;
         
        $mile = array();
        if (isset($this->_filter_array["mile_f"])) {
            $mile[] = $this->_filter_array["mile_f"];
        }
        if (isset($this->_filter_array["mile_t"])) {
            $mile[] = $this->_filter_array["mile_t"];
        }
        $ret['miles'] = $mile;
    
        return array_filter($ret);
    }
    
    protected function _getColsFromQuery($query) {
        if (isset($query['brand_id'])) {
            $this->_filter_array['brand_id'] = $query['brand_id'];
        }
        if (isset($query['class_id'])) {
            $this->_filter_array['series_id'] = $query['class_id'];
        }
        if (isset($query['price'])) {
            list($price_f, $price_t) = $query['price'];
            $this->_filter_array['price_f'] = $price_f;
            $this->_filter_array['price_t'] = $price_t;
        }
        if (isset($query['register_time'])) {
            list($year_f, $year_t) = $query['register_time'];
            $thismonth = date('Y-m-01');
            $one_years_ago = strtotime($thismonth)-365*24*3600;//strtotime($thismonth.' -1 year');
            $three_years_ago = strtotime($thismonth)-3*365*24*3600;//var_dump($three_years_ago);//strtotime($thismonth.' -3 year');
            $five_years_ago = strtotime($thismonth)-5*365*24*3600;//var_dump($five_years_ago);//strtotime($thismonth.' -5 year');
            $eight_years_ago = strtotime($thismonth)-8*365*24*3600;//strtotime($thismonth.' -8 year');
            if ($year_t<=$eight_years_ago) {
                $y_f = 100; $y_t = 8;//8年前
            }
            if ($year_f>=$one_years_ago) {
                $y_f = 1; $y_t = 0;//1年内
            }
            if ($year_f>=$three_years_ago && $year_t<=$one_years_ago) {
                $y_f = 3; $y_t = 1;//1-3
            }
            if ($year_f>=$five_years_ago && $year_t<=$three_years_ago) {
                $y_f = 5; $y_t = 3;//3-5
            }
            if ($year_f>=$eight_years_ago && $year_t<=$five_years_ago) {
                $y_f = 8; $y_t = 5;//5-8
            }
            $this->_filter_array['year_f'] = $y_f;
            $this->_filter_array['year_t'] = $y_t;
        }
        if (isset($query['mile'])) {
            list($mile_f, $mile_t) = $query['mile'];
            $this->_filter_array['mile_f'] = $mile_f;
            $this->_filter_array['mile_t'] = $mile_t;
        }
    }

    protected function  _getVehicleListOnSale($page_num, $page_size) {
        //return require_once 'D:/test/test_vehicle.php';
        $ret = array('data'=>array('count'=>0,'vehicles'=>array()), 'query'=>array());

        $cityid = $this->_filter_array['city_id'];
        
        $field = 'time';
        $direct = '1';
        if (isset($this->_filter_array['sort_f']) && isset($this->_filter_array['sort_d'])) {
            $field_arr = array('y'=>'register_time', 'm'=>'miles', 'p'=>'price');
            $direct_arr = array('a'=>'0', 'd'=>'1');
            $field = $this->_filter_array['sort_f'];
            $direct = $this->_filter_array['sort_d'];
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
            $query_filter = $this->_buildQueryCondition();
            $query_filter['city'] = $cityid;
            $query_filter['type'] = array(1, 1);
            $query_filter = array_filter($query_filter);
            $query = array(
                'query' => $query_filter,
                'page_num' => $page_num,
                'page_size' => $page_size,
                'order' => $field,
                'desc' => $direct,
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
    
    protected function _buildWhereClause() {
        $where = array();
        foreach ($this->_filter_array as $key => $value) {
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
                default:
                    break;
            }
        }
        $where = !empty($where) ? ' WHERE ' . implode(' AND ', $where) : '';
        return $where;
    }
    
    protected function _getVehicleCount() {
        $where = $this->_buildWhereClause();
        $m_vehicle = Model::factory('vehicle_source');
        $count = $m_vehicle->count($where);
        return $count;
    }
    
    protected function _getVehicleList($offset, $size) {
        $where = $this->_buildWhereClause();
        if (isset($this->_filter_array['sort_f']) && isset($this->_filter_array['sort_d'])) {
            $field_arr = array('y'=>'register_time', 'm'=>'miles', 'p'=>'seller_price');
            $direct_arr = array('a'=>'asc', 'd'=>'desc');
            $field = $this->_filter_array['sort_f'];
            $direct = $this->_filter_array['sort_d'];
            $field = $field_arr[$field];
            $direct = $direct_arr[$direct];
            $where .= " ORDER BY $field $direct";
        }
        
        $m_vehicle = Model::factory('vehicle_source');
        $list = $m_vehicle->select($offset, $size, $where, '*');
        return $list;
    }
    
    protected function _format_list(&$vehicle_list) {
        if(!empty($vehicle_list)) {
            foreach($vehicle_list as &$item) {
                $item['cover_pic'] = 'http://image1.haoche51.com/82993604a789aed0dc26a5626d90bb77a53add03.jpg?imageView2/1/w/280/h/210';
                $item['geerbox'] = $item['geerbox_type']==1 ? '手动' : '自动';
            }
            unset($item);
        }
    }
    
    protected function _getUrl($params) {
        //return URL::site('list') . URL::query($params);
        return Route::url('list', array_filter($params + $this->_filter_array, 'strlen'));
    }
    
}
