<?php

class Controller_User extends Controller_Shop {

    public function __construct(Request $request) {
        parent::__construct($request);
        
        if (!empty($this->user)) {
            $this->redirect('product');
        }
    }

    public function action_qqlogin() {
        $redirect_uri = URL::curr();
        $client = OAuth2_Client::factory('QQ');
        $user_info = $client->get_user_data($redirect_uri);
        if (empty($user_info)) {
            $this->redirect('oauth/qq/login?redirect_uri=' . urlencode($redirect_uri));
        }
        var_dump($user_info);
        exit;

        $update_user_info = Cookie::get('update_qq_user');
        if (empty($update_user_info)) {
            $m_wx = Model::factory('oauth_qq_user', 'admin');
            $qq_user_field = array('openid'=>1,'nickname'=>1,'gender'=>1,'figureurl'=>1);
            $user_info = array_intersect_key($user_info, $qq_user_field);
            $m_wx->replace_into($user_info);
            Cookie::set('update_qq_user', 1, 86400);
        }
        
        $user = array(
            'id' => 'qq_' . $user_info['openid'],
            'username' => $user_info['nickname'],
        );
        $auth = Auth::instance('member');
        if ($auth->force_login($user)) {
            $this->redirect(Request::$referrer);
        }
    }
    
    public function action_login() {
        if (!empty($_POST)) {
            $username = Arr::get($_POST, 'username');
            $password = Arr::get($_POST, 'password');
            
            $auth = Auth::instance('member');
            if ($auth->login($username, $password)) {
                $this->redirect(Request::$referrer);
            } else {
                exit('用户名或密码错误');
            }
        }
        $this->content = View::factory('user_login');
    }

    public function action_register() {
        if (!empty($_POST)) {
            $username = Arr::get($_POST, 'username');
            $password = Arr::get($_POST, 'password');
            $password2 = Arr::get($_POST, 'password2');
            if ($password !== $password2) {
                exit('两次密码不匹配');
            }
            $auth = Auth::instance('member');
            $password = $auth->hash($password);
            $user_data = array(
                'username' => $username,
                'password' => $password,
                'created_at' => time(),
            );
            $m_member = Model::factory('member', 'admin');
            $user_exist = $m_member->has(array('username' => $username));
            if (!$user_exist) {
                $ret = $m_member->insert($user_data);
                if ($ret !== false) {
                    $user_data['id'] = $ret[0];
                    if ($auth->force_login($user_data)) {
                        $this->redirect(Request::$referrer);
                    }
                } else {
                    exit('注册失败');
                }
            } else {
                exit('用户名已存在');
            }
        }
        $this->content = View::factory('user_register');
    }
    
}

