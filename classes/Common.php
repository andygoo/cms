<?php 

class Common {

    public static $mile_list = array(
        array('mile_f'=>'', 'mile_t'=>'', 'desc'=>'不限'),
        array('mile_f'=>0, 'mile_t'=>2, 'desc'=>'2万公里内'),
        array('mile_f'=>0, 'mile_t'=>5, 'desc'=>'5万公里内'),
        array('mile_f'=>1, 'mile_t'=>3, 'desc'=>'1~3万公里'),
        array('mile_f'=>3, 'mile_t'=>5, 'desc'=>'3~5万公里'),
        array('mile_f'=>5, 'mile_t'=>8, 'desc'=>'5~8万公里'),
        array('mile_f'=>8, 'mile_t'=>100, 'desc'=>'8万公里以上'),
    );
}