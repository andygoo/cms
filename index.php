<?php
$application = __DIR__;
$modules = __DIR__ . '/../kohana/modules';
$system = __DIR__ . '/../kohana/system';

define('DOCROOT', realpath(__DIR__) . DIRECTORY_SEPARATOR);
define('APPPATH', realpath($application) . DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules) . DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system) . DIRECTORY_SEPARATOR);
unset($application, $modules, $system);

require SYSPATH . 'classes/Kohana.php';

date_default_timezone_set('Asia/Shanghai');
setlocale(LC_ALL, "chs");

spl_autoload_register(array('Kohana', 'auto_load'));
ini_set('unserialize_callback_func', 'spl_autoload_call');

define('ENV', 'dev');
if (ENV == 'dev') {
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', TRUE);
} else {
    error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}

Kohana::init(array(
    'base_url' => '/',
    'index_file' => false,
    'profile' => ENV=='dev', 
));

Kohana::modules(array(
    'database' => MODPATH . 'database',
    'helper' => MODPATH . 'helper',
    'image' => MODPATH . 'image',
    'imagefly' => MODPATH . 'imagefly',
    'captcha' => MODPATH . 'captcha',
    'cache' => MODPATH . 'cache',
    'devtools' => MODPATH . 'devtools',
    'logreader' => MODPATH . 'logreader',
    'myadmin' => MODPATH . 'myadmin',
    'media' => MODPATH . 'media',
    'weixin' => MODPATH . 'weixin',
    'auth' => MODPATH . 'auth',
    'oauth2' => MODPATH . 'oauth2',
));
Kohana::$log->attach(new Log_File(APPPATH . 'logs'));


Route::set('list_pinyin', '(<city_pinyin>/)ershouche(/<brand_pinyin>(-<series_pinyin>))(/(p<price_f>-<price_t>)(y<year_f>-<year_t>)(m<mile_f>-<mile_t>)(s<sort_f>-<sort_d>))(/p<page>)(.<format>)', array(
'city_pinyin' => '[a-z]+',
'brand_pinyin' => '[a-z]+',
'series_pinyin' => '([a-z]+([a-z0-9]+)?){2,}',
'price_f' => '(\d+)',
'price_t' => '(\d+)',
'year_f' => '(\d+)',
'year_t' => '(\d+)',
'mile_f' => '(\d+)',
'mile_t' => '(\d+)',
'sort_f' => '(p|y|m)',
'sort_d' => '(a|d)',
'page' => '(\d+)',
'format' => '(html|htm)',
))->defaults(array(
'controller' => 'list'
));

Route::set('list', '(<city_pinyin>/)ershouche(/(b<brand_id>)(c<series_id>)(p<price_f>-<price_t>)(y<year_f>-<year_t>)(m<mile_f>-<mile_t>)(s<sort_f>-<sort_d>))(/p<page>)(.<format>)', array(
'city_pinyin' => '([a-z]+)',
'brand_id' => '(\d+)',
'series_id' => '(\d+)',
'price_f' => '(\d+)',
'price_t' => '(\d+)',
'year_f' => '(\d+)',
'year_t' => '(\d+)',
'mile_f' => '(\d+)',
'mile_t' => '(\d+)',
'sort_f' => '(p|y|m)',
'sort_d' => '(a|d)',
'page' => '(\d+)',
'format' => '(html|htm)',
))->defaults(array(
'controller' => 'list' 
));

Route::set('detail', 'detail/<id>', array(
    'id' => '(\d+)' 
))->defaults(array(
    'controller' => 'vehicle',
    'action' => 'detail'  
));

Route::set('custom', 'fruit/<customurl>', array(
    'customurl' => '[a-z0-9_-]+' 
))->defaults(array(
    'controller' => 'article',
    'action' => 'customurl' 
));

Route::set('default', '(<controller>(/<action>))')->defaults(array(
    'controller' => 'home',
    'action' => 'index' 
));

Route::set('catch_all', '<path>', array(
    'path' => '.*' 
))->defaults(array(
    'controller' => 'Error',
    'action' => '404' 
));

if (!defined('KOHANA_START_TIME')) {
    define('KOHANA_START_TIME', microtime(TRUE));
}

if (!defined('KOHANA_START_MEMORY')) {
    define('KOHANA_START_MEMORY', memory_get_usage());
}

if (ENV == 'dev') {
    echo Request::instance()->execute();
} else {
    try {
        echo Request::instance()->execute();
    } catch(Exception $e) {
    	Kohana_Exception::log($e);
    }
}

