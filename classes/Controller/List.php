<?php

class Controller_List extends Controller_Website {
    
    protected $params = array();
    protected $_filter_array = array();
    protected $filter_list = array();
    protected $city_info = array();
    
    protected $all_brand_pinyin;
    protected $all_series_pinyin;

    public function __construct(Request $request) {
        parent::__construct($request);

        $this->params = $this->request->param();
        //$this->params = $_GET;
        $this->params = array_filter($this->params, 'strlen');
        
        $this->all_brand_pinyin = SEO::getBrandPinyin();
        $this->all_series_pinyin = SEO::getSeriesPinyin();
        
        if (!empty($this->params['brand_pinyin'])) {
            $all_brand_pinyin = array_flip($this->all_brand_pinyin);
            if (isset($all_brand_pinyin[$this->params['brand_pinyin']])) {
                $this->params['brand_id'] = $all_brand_pinyin[$this->params['brand_pinyin']];
            }
        }
        if (!empty($this->params['series_pinyin'])) {
            $all_series_pinyin = array_flip($this->all_series_pinyin);
            if (isset($all_series_pinyin[$this->params['series_pinyin']])) {
                $this->params['series_id'] = $all_series_pinyin[$this->params['series_pinyin']];
            }
        }
        
        $allowed = array(
            'city_pinyin', 'brand_id', 'series_id', 'brand_pinyin', 'series_pinyin',
            'price_f', 'price_t', 'mile', 'mile_f', 'mile_t', 'year_f', 'year_t', 'sort_f', 'sort_d', 'format',
        );
        
        $this->_filter_array = array_intersect_key($this->params, array_flip($allowed));
    }
    
    public function action_index() {
        if (isset($_GET['get_vehicle_count'])) {
            unset($_GET['get_vehicle_count']);
            if ($this->auto_render === false) {
                $year_list = $this->_getYearList();
                $miles_list = $this->_getMilesList();
                
                $view = View::factory('vehicle/list_more');
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
                
                $view = View::factory('vehicle/list_series');
                $view->series_list = $series_list;
                echo $view;
                exit;
            }
        }
        
        $city_list = $this->_getCityList();
        
        $page_size = 12;
        $page_num = $this->request->param('page', 1);
        //*/
        $ret = $this->_getVehicleList($page_num, $page_size);
        $vehicle_list = $ret['list'];
        $total = $ret['count'];
        $pager = new Pager($total, $page_size, 'route');
        if (!empty($ret['query'])) {
            $this->_getColsFromQuery($ret['query']);
        }
        /*/
        $ret = $this->_getVehicleList2($page_num, $page_size);
        $vehicle_list = $ret['data']['vehicles'];
        $total = $ret['data']['count'];
        $pager = new Pager($total, $page_size, 'route');
        if (!empty($ret['query'])) {
            $this->_getColsFromQuery($ret['query']);
        }
        //*/
        $this->_format_list($vehicle_list);

        if ($this->auto_render === false) {
            $view = View::factory('vehicle/list_vehicle');
            $view->vehicle_list = $vehicle_list;
            echo $view;
            exit;
        }

        list($brand_top_list, $brand_list) = $this->_getBrandList();
        $series_list = array();
        if (isset($this->_filter_array['brand_id'])) {
            $brand_id = $this->_filter_array['brand_id'];
            $series_list = $this->_getSeriesList($brand_id);
        }
        list($price_list, $custom_price) = $this->_getPriceList();
        $year_list = $this->_getYearList();
        $miles_list = $this->_getMilesList();
        $sort_list = $this->_getSortList();

        $filter_list = $this->filter_list;
        /*uksort($filter_list, function ($a, $b) {
            $sort_filter = array_flip(array('brand', 'series', 'price', 'year', 'mile'));
            return $sort_filter[$a] > $sort_filter[$b];
        });*/
        
        $this->content = View::factory('vehicle_list');
        $this->content->city_list = $city_list;
        $this->content->city_info = $this->city_info;

        $this->content->brand_top_list = $brand_top_list;
        $this->content->brand_list = $brand_list;
        $this->content->series_list = $series_list;
        $this->content->price_list = $price_list;
        $this->content->custom_price = $custom_price;
        $this->content->year_list = $year_list;
        $this->content->miles_list = $miles_list;
        $this->content->sort_list = $sort_list;
        $this->content->filter_list = $filter_list;
        $this->content->vehicle_list = $vehicle_list;
        
        //var_dump($pager->url($pager->next_page));exit;

        $this->content->pager = $pager->render('common/pager');
        $this->content->total_items = $pager->total_items;
        $this->content->total_pages = $pager->total_pages;
        $this->content->curr_page = $pager->current_page;
        $this->content->page_url = $this->_getUrl(array('page'=>''));
    }

    protected function _getCityList() {
        $city_pinyin = isset($this->_filter_array['city_pinyin']) ? $this->_filter_array['city_pinyin'] : 'bj';
        
        $all_city = Common::$city_list;
        foreach ($all_city as $item) {
            $selected = ($city_pinyin == $item[1]);
            $list[] = array(
                 'city_id' => $item[0],
                 'city_pinyin' => $item[1],
                 'city_name' => $item[2],
                 'selected' => $selected,
                 //'url' => $this->_getUrl(array('city_pinyin' => $item[1])),
                 'url' => Route::url('list_pinyin_mult', array('city_pinyin' => $item[1])),
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

        return $list;
    }
    
    protected function _getBrandList() {
        $m_brand = Model::factory('auto_brand');
        $brand_list = $m_brand->getAll()->as_array();
        
        $top_list[] = array(
            'desc' => '不限',
            'url' => $this->_getUrl(array('brand_id' => '', 'series_id' => '',)),
            'selected' => !isset($this->_filter_array['brand_id']),
        );
        
        $group_list = array();
        foreach($brand_list as $key => $item) {
            $brand_id = $item['id'];
            $selected = isset($this->_filter_array['brand_id']) && ($brand_id == $this->_filter_array['brand_id']);
            $brand_item = array(
                'id' => $brand_id,
                'desc' => $item['name'],
                'url' => $this->_getUrl(array('brand_id' => $brand_id, 'series_id' => '',)),
                'selected' => $selected 
            );
            $group_list[$item['first_char']][] = $brand_item;
            
            if ($selected) {
                $this->filter_list['brand'] = array(
                    'desc' => $item['name'],
                    'url' => $this->_getUrl(array('brand_id' => '', 'series_id' => '',)),
                    'selected' => $selected,
                );
            }
            if ($key < 15) {
                $top_list[] = $brand_item;
            }
        }
        ksort($group_list);
        
        $top_brand_ids = array_column($top_list, 'id');
        if (isset($this->filter_list['brand']) && !in_array($this->_filter_array['brand_id'], $top_brand_ids)) {
            array_pop($top_list);
            $top_list[] = $this->filter_list['brand'];
        }
        
        return array($top_list, $group_list);
    }

    protected function _getSeriesList($brand_id) {
        $m_series = Model::factory('auto_series');
        $series_list = $m_series->getAll(array('brand_id' => $brand_id))->as_array();
        
        $list = array();
        $list[] = array(
            'desc' => '不限',
            'url' => $this->_getUrl(array('series_id' => '',)),
            'selected' => !isset($this->_filter_array['series_id']),
        );
        foreach($series_list as $item) {
            $series_id = $item['id'];
            $selected = isset($this->_filter_array['series_id']) && ($series_id == $this->_filter_array['series_id']);
            $list[] = array(
                'desc' => $item['name'],
                'url' => $this->_getUrl(array('brand_id' => $brand_id, 'series_id' => $series_id)),
                'selected' => $selected 
            );
            if ($selected) {
                $this->filter_list['series'] = array(
                    'desc' => $item['name'],
                    'url' => $this->_getUrl(array('brand_id' => $brand_id, 'series_id' => '')) 
                );
            }
        }
        return $list;
    }

    protected function _getPriceList() {
        $price_f = isset($this->_filter_array['price_f']) ? $this->_filter_array['price_f'] : '';
        $price_t = isset($this->_filter_array['price_t']) ? $this->_filter_array['price_t'] : '';
        
        $price_list = Common::$price_list;
        $selected = 0;
        foreach($price_list as $key => $item) {
            if ($price_f == $item['price_f'] && $price_t == $item['price_t']) {
                $selected = $key;
            }
            $list[$key] = array(
                'url' => $this->_getUrl(array('price_f' => $item['price_f'], 'price_t' => $item['price_t'])),
                'desc' => $item['desc'],
                'selected' => ($price_f == $item['price_f'] && $price_t == $item['price_t']),
            );
        }

        if ($selected) {
            $this->filter_list['price'] = array(
                'url' => $this->_getUrl(array('price_f' => '', 'price_t' => '')),
                'desc' => $list[$selected]['desc'],
            );
        } elseif (!empty($price_f) || !empty($price_t)) {
            $this->filter_list['price'] = array(
                'url' => $this->_getUrl(array('price_f' => '', 'price_t' => '')),
                'desc' => "$price_f-{$price_t}万",
            );
        }
        $custom_price = array(
            'price_f' => !$selected ? $price_f : '',
            'price_t' => !$selected ? $price_t : '',
            'url' => $this->_getUrl(array('price_f' => 1, 'price_t' => 100)),
        );
        
        return array($list, $custom_price);
    }

    protected function _getYearList() {
        $year_f = isset($this->_filter_array['year_f']) ? $this->_filter_array['year_f'] : '';
        $year_t = isset($this->_filter_array['year_t']) ? $this->_filter_array['year_t'] : '';
        
        $year_list = Common::$year_list;
        foreach($year_list as $item) {
            $selected = ($year_f == $item['year_f'] && $year_t == $item['year_t']);
            if ($selected) {
                $url = $this->_getUrl(array('year_f' => '', 'year_t' => ''));
            } else {
                $url = $this->_getUrl(array('year_f' => $item['year_f'], 'year_t' => $item['year_t']));
            }
            $list[] = array(
                'url' => $url,
                'desc' => $item['desc'],
                'selected' => $selected,
            );
            if ($selected && $year_f!=='' && $year_t!=='') {
                $this->filter_list['year'] = array(
                    'desc' => $item['desc'],
                    'url' => $url,
                );
            }
        }
        
        return $list;
    }

    protected function _getMilesList2() {
        $mile_f = isset($this->_filter_array['mile_f']) ? $this->_filter_array['mile_f'] : '';
        $mile_t = isset($this->_filter_array['mile_t']) ? $this->_filter_array['mile_t'] : '';

        $mile_list = Common::$mile_list;
        foreach($mile_list as $item) {
            $selected = ($mile_f == $item['mile_f'] && $mile_t == $item['mile_t']);
            if ($selected) {
                $url = $this->_getUrl(array('mile_f' => '', 'mile_t' => ''));
            } else {
                $url = $this->_getUrl(array('mile_f' => $item['mile_f'], 'mile_t' => $item['mile_t']));
            }
            $list[] = array(
                'url' => $url,
                'desc' => $item['desc'],
                'selected' => $selected,
            );
            if ($selected && $mile_f!=='' && $mile_t!=='') {
                $this->filter_list['mile'] = array(
                    'desc' => $item['desc'],
                    'url' => $url,
                );
            }
        }
        return $list;
    }

    protected function _getMilesList() {  
        $mile_keys = isset($this->_filter_array['mile']) ? explode('-', $this->_filter_array['mile']) : array();
        
        $mile_list = Common::$mile_list;
        foreach($mile_list as $key => $item) {
            $selected = ($key==0 && empty($mile_keys)) || in_array($key, $mile_keys);
            $_mile_keys = $mile_keys;
            if ($selected) {
                $_key = array_search($key, $_mile_keys);
                if ($_key !== false) {
                    unset($_mile_keys[$_key]);
                }
            } else {
                $_mile_keys[] = $key;
            }
            if ($key == 0) {
                $url = $this->_getUrl(array('mile' => ''));
            } else {
                sort($_mile_keys);
                $url = $this->_getUrl(array('mile' => implode('-', $_mile_keys)));
            }
            $list[] = array(
                'url' => $url,
                'desc' => $item['desc'],
                'selected' => $selected,
            );
            if ($selected && !empty($mile_keys)) {
                $this->filter_list[] = array(
                    'desc' => $item['desc'],
                    'url' => $url,
                );
            }
        }
        return $list;
    }
    
    protected function _getSortList() {
        $sort_f = isset($this->_filter_array['sort_f']) ? $this->_filter_array['sort_f'] : '';
        $sort_d = isset($this->_filter_array['sort_d']) ? $this->_filter_array['sort_d'] : '';
        
        $sort_list = Common::$sort_list;
        foreach($sort_list as $item) {
            $selected = ($sort_f == $item['sort_f'] && $sort_d == $item['sort_d']);
            $url = $this->_getUrl(array('sort_f' => $item['sort_f'], 'sort_d' => $item['sort_d']));
            $list[] = array(
                'url' => $url,
                'desc' => $item['desc'],
                'selected' => $selected,
            );
        }
        return $list;
    }
    
    protected function _getVehicleList($page_num, $page_size) {
        $params = $this->_filter_array;
        if (!empty($_GET['kw'])) {
            $query = $_GET['kw'];
            return SearchApi::query($params, $query, $page_num, $page_size);
        } else {
            return SearchApi::search($params, $page_num, $page_size);
        }
    }
    
    protected function _getVehicleList2($page_num, $page_size) {
        $params = $this->_filter_array;
        return SearchApi2::search($params, $page_num, $page_size);
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
        $params += $this->_filter_array;
    
        if (!empty($params['brand_id'])) {
            $params['brand_pinyin'] = $this->all_brand_pinyin[$params['brand_id']];
        } elseif (isset($params['brand_id'])) {
            $params['brand_pinyin'] = '';
        }
        if (!empty($params['series_id'])) {
            $params['series_pinyin'] = $this->all_series_pinyin[$params['series_id']];
        } elseif (isset($params['series_id'])) {
            $params['series_pinyin'] = '';
        }
        //return URL::site($this->request->uri($params));
    
        //return URL::site('list') . URL::query($params);
        
        return Route::url('list_pinyin_mult', array_filter($params, 'strlen'));
        return Route::url('list_pinyin', array_filter($params, 'strlen'));
        return Route::url('list', array_filter($params, 'strlen'));
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
        if (isset($query['price_f'])) {
            $this->_filter_array['price_f'] = $query['price_f'];
        }
        if (isset($query['price_t'])) {
            $this->_filter_array['price_t'] = $query['price_t'];
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
    
}

