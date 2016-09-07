<?php 

class Common {

    public static $city_list = array(
        array(0, 'cn', '全国', '华北'),
        array(12, 'bj', '北京', '华北'),
        array(45, 'cd', '成都', '中西部'),
        array(15, 'cq', '重庆', '中西部'),
        array(113, 'jn', '济南', '华东'),
        array(67, 'su', '苏州', '华东'),
        array(103, 'zz', '郑州', '中西部'),
    );
    
    public static $price_list = array(
        array('price_f'=>'', 'price_t'=>'', 'desc'=>'不限'),
        array('price_f'=>0, 'price_t'=>2, 'desc'=>'2万以内'),
        array('price_f'=>2, 'price_t'=>3, 'desc'=>'2-3万'),
        array('price_f'=>3, 'price_t'=>5, 'desc'=>'3-5万'),
        array('price_f'=>5, 'price_t'=>8, 'desc'=>'5-8万'),
        array('price_f'=>8, 'price_t'=>10, 'desc'=>'8-10万'),
        array('price_f'=>10, 'price_t'=>15, 'desc'=>'10-15万'),
        array('price_f'=>15, 'price_t'=>20, 'desc'=>'15-20万'),
        array('price_f'=>20, 'price_t'=>30, 'desc'=>'20-30万'),
        array('price_f'=>30, 'price_t'=>1000, 'desc'=>'30万以上'),
    );
    
    public static $year_list = array(
        array('year_f'=>'', 'year_t'=>'', 'desc'=>'不限'),
        array('year_f'=>1, 'year_t'=>0, 'desc'=>'1年内'),
        array('year_f'=>3, 'year_t'=>1, 'desc'=>'1-3年'),
        array('year_f'=>5, 'year_t'=>3, 'desc'=>'3-5年'),
        array('year_f'=>8, 'year_t'=>5, 'desc'=>'5-8年'),
        array('year_f'=>100, 'year_t'=>8, 'desc'=>'8年以上'),
    );
    
    public static $mile_list = array(
        array('mile_f'=>'', 'mile_t'=>'', 'desc'=>'不限'),
        array('mile_f'=>0, 'mile_t'=>2, 'desc'=>'2万公里内'),
        array('mile_f'=>0, 'mile_t'=>5, 'desc'=>'5万公里内'),
        array('mile_f'=>1, 'mile_t'=>3, 'desc'=>'1~3万公里'),
        array('mile_f'=>3, 'mile_t'=>5, 'desc'=>'3~5万公里'),
        array('mile_f'=>5, 'mile_t'=>8, 'desc'=>'5~8万公里'),
        array('mile_f'=>8, 'mile_t'=>100, 'desc'=>'8万公里以上'),
    );
    
    public static $sort_list = array(
        array('sort_f'=>'', 'sort_d'=>'', 'desc'=>'默认排序'),
        array('sort_f'=>'p', 'sort_d'=>'a', 'desc'=>'价格低到高'),
        array('sort_f'=>'p', 'sort_d'=>'d', 'desc'=>'价格高到低'),
        array('sort_f'=>'y', 'sort_d'=>'d', 'desc'=>'车龄新到旧'),
        array('sort_f'=>'m', 'sort_d'=>'a', 'desc'=>'里程短到长'),
    );
}