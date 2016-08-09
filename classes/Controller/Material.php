<?php

class Controller_Material extends Controller_Website {

    public $template = 'material_template';
    protected $user;
    public $theme_list = array(
            'blue-red' => '#2196f3',
            'teal-red' => '#009688',
            'cyan-red' => '#00bcd4',
            'green-red' => '#4caf50',
            
            'light_green-red' => '#8bc34a',
            'light_blue-red' => '#03a9f4',
            
            'red-blue' => '#f44336',
            'purple-blue' => '#9c27b0',
            'deep_orange-blue' => '#ff5722',
    );
    
    public function before() {
        Request::$theme = 'mobile';
        parent::before();
        
        $is_weixin = false;
        $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (strpos($ua, 'micromessenger') !== false) {
            $is_weixin = true;
        }

        $auth = Auth::instance('member');
        $this->user = $auth->get_user();

        $curr_theme = 'cyan-red';
        if (isset($_COOKIE['apptheme']) && in_array($_COOKIE['apptheme'], array_keys($this->theme_list))) {
            $curr_theme = $_COOKIE['apptheme'];
        }
        $theme_color = $this->theme_list[$curr_theme];
        
        if ($this->auto_render === TRUE) {
            View::bind_global('is_weixin', $is_weixin);
            View::bind_global('user', $this->user);
            View::bind_global('theme_list', $this->theme_list);
            View::bind_global('theme_color', $theme_color);
            View::bind_global('curr_theme', $curr_theme);
            
            if ($is_weixin) {
                $wx_js_api = new WeixinJSAPI('test');
                $wx_jsapi_config = $wx_js_api->get_jsapi_config();
                View::bind_global('wx_jsapi_config', $wx_jsapi_config);
            }
        }
    }

    public function action_index() {
        $this->content = View::factory('material_home');
    }

    public function action_detail() {
        $this->content = View::factory('material_detail');
    }
    
    public function action_favorite() {
        $this->content = View::factory('material_favorite');
    }

    public function action_history() {
        $this->content = View::factory('material_history');
    }

    public function action_setting() {
        $this->content = View::factory('material_setting');
    }
    
    public function action_feedback() {
        $this->content = View::factory('material_feedback');
    }
    
    public function action_help() {
        $this->content = View::factory('material_help');
    }
    
}

