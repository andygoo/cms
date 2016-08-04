<?php

class Controller_Material extends Controller_Website {

    public $template = 'material_template';
    protected $user;
    
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
        
        if ($this->auto_render === TRUE) {
            View::bind_global('is_weixin', $is_weixin);
            View::bind_global('user', $this->user);
            
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

    public function action_feedback() {
        $this->content = View::factory('material_feedback');
    }
    
    public function action_help() {
        $this->content = View::factory('material_help');
    }
    
}

