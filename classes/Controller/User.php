<?php

class Controller_User extends Controller_Website {

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
        $this->content = View::factory('common/user_login');
    }

    public function action_register() {
        if (!empty($_POST)) {
            $username = Arr::get($_POST, 'username');
            $password = Arr::get($_POST, 'password');
            $password2 = Arr::get($_POST, 'password2');
            $vcode = Arr::get($_POST, 'vcode');
            if ($password !== $password2) {
                exit('两次密码不匹配');
            }
            if (!Captcha::valid($vcode)) {
                exit('验证码错误');
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
        $this->content = View::factory('common/user_register');
    }

    public function action_logout() {
        $auth = Auth::instance();
        $ret = $auth->logout();
        if ($ret) {
            $this->redirect(Request::$referrer);
        }
    }
    
    public function action_wxlogin() {
        $wx = new WeixinOauth('test');
        $user_info = $wx->get_user_info();
        if (empty($user_info)) {
            $redirect_uri = URL::curr();
            $this->redirect('weixin/oauth/login?callback_url=' . urlencode($redirect_uri));
        }
    
        $update_user_info = Cookie::get('update_wx_user');
        if (empty($update_user_info)) {
            $m_wx = Model::factory('oauth_wx_user', 'admin');
            $wx_user_field = array('openid'=>1,'nickname'=>1,'sex'=>1,'city'=>1,'province'=>1,'country'=>1,'headimgurl'=>1);
            $wx_user_info = array_intersect_key($user_info, $wx_user_field);
            $m_wx->replace_into($wx_user_info);
            Cookie::set('update_wx_user', 1, 86400);
        }
        $user = array(
            'id' => 'wx_' . $user_info['openid'],
            'username' => $user_info['nickname'],
            'avatar' => $user_info['headimgurl'],
        );
        $auth = Auth::instance('member');
        if ($auth->force_login($user)) {
            $this->redirect(Request::$referrer);
        }
    }
    
    public function action_qqlogin() {
        $redirect_uri = URL::curr();
        $client = OAuth2_Client::factory('QQ');
        $user_info = $client->get_user_data($redirect_uri);
        if (empty($user_info)) {
            $this->redirect('oauth/qq/login?redirect_uri=' . urlencode($redirect_uri));
        }
    
        $update_user_info = Cookie::get('update_qq_user');
        if (empty($update_user_info)) {
            $m_qq = Model::factory('oauth_qq_user', 'admin');
            $qq_user_field = array('openid'=>1,'nickname'=>1,'gender'=>1,'figureurl'=>1);
            $qq_user_info = array_intersect_key($user_info, $qq_user_field);
            $m_qq->replace_into($qq_user_info);
            Cookie::set('update_qq_user', 1, 86400);
        }
    
        $user = array(
            'id' => 'qq_' . $user_info['openid'],
            'username' => $user_info['nickname'],
            'avatar' => $user_info['figureurl'],
        );
        $auth = Auth::instance('member');
        if ($auth->force_login($user)) {
            $this->redirect(Request::$referrer);
        }
    }

    public function action_phoneverify() {
        header('Content-Type: application/json; charset=utf-8');
        
        $phone = Arr::get($_GET, 'phone');
        if(empty($phone)) {
            $ret = array('errno'=>100, 'errmsg'=>'请输入手机号码！');
            echo json_encode($ret, JSON_UNESCAPED_UNICODE);
            exit;
        }
        if(!preg_match("/1[34578]{1}\d{9}$/", $phone)) {
            $ret = array('errno'=>100, 'errmsg'=>'手机号码不正确！');
            echo json_encode($ret, JSON_UNESCAPED_UNICODE);
            exit;
        }

        $m_sms = Model::factory('sms_queue', 'admin');

        $type = 'login';
        $where = array('ORDER'=>'id DESC', 'phone'=>$phone, 'type'=>$type);
        $lastsms = $m_sms->getRow($where);
        if (!empty($lastsms)) {
            $timeleft = 60 + $lastsms['add_time'] - strtotime('now'); //还剩几秒可以重发
            if ($timeleft > 0) {
                $ret = array('errno'=>0, 'errmsg'=>'请'.$timeleft.'秒后重发', 'data' => $timeleft);
                echo json_encode($ret, JSON_UNESCAPED_UNICODE);
                exit;
            }
        }
        
        $start_time = strtotime('now')-3600;
        $end_time = strtotime('now');
        $where = array('phone'=>$phone, 'add_time'=>array('>' => $start_time), 'add_time'=>array('<=' => $end_time));
        $sms_num = $m_sms->count($where);
        if($sms_num > 411) {//每小时最多发5条
            $ret = array('errno'=>100, 'errmsg'=>'您发送短信频率太高！请稍后再发');
            echo json_encode($ret, JSON_UNESCAPED_UNICODE);
            exit;
        }
        
        $start_time = strtotime('now');
        $end_time = strtotime('+1 day');
        $where = array('phone'=>$phone, 'add_time'=>array('>' => $start_time), 'add_time'=>array('<=' => $end_time));
        $sms_num = $m_sms->count($where);
        if($sms_num > 911) {//每天最多发10条
            $ret = array('errno'=>100, 'errmsg'=>'您今天已超过发送短信限制！请明天再发');
            echo json_encode($ret, JSON_UNESCAPED_UNICODE);
            exit;
        }
        
        $vcode = Text::random('numeric', 5);
        $session = Session::instance();
        $session->set('vcode', $phone . '|' . $vcode);
        
        $content = Kohana::config('sms.' . $type);
        $content = sprintf($content, $vcode);
        $data = array(
            'type' => $type,
            'phone' => $phone,
            'code' => $vcode,
            'content'=> $content,
            'add_time' => time(),
        );
        $ret = $m_sms->insert($data);
        
        if ($ret !== false) {
            $ret = array('errno'=>0, 'errmsg'=>'您的验证码已发送！请注意查收');
            echo json_encode($ret, JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
    
    public function action_phonelogin() {
        if (!empty($_POST)) {
            $phone = Arr::get($_POST, 'phone');
            if(empty($phone)) {
                exit('请输入手机号码！');
            }
            if(!preg_match("/1[34578]{1}\d{9}$/", $phone)) {
                exit('手机号码不正确！');
            }
            
            $vcode = Arr::get($_POST, 'vcode');
            $session = Session::instance();
            $_vcode = $session->get('vcode');
            list($phone2, $vcode2) = explode('|', $_vcode);
            if ($phone != $phone2 || $vcode != $vcode2) {
                exit('验证码不正确！');
            }

            $auth = Auth::instance('member');
            $password = $auth->hash($vcode2);
            $user_data = array(
                'username' => $phone,
                'password' => $password,
                'phone' => $phone,
                'created_at' => time(),
            );
            $m_member = Model::factory('member', 'admin');
            $user_exist = $m_member->getRow(array('phone' => $phone));
            if (!empty($user_exist)) {
                $user_data['id'] = $user_exist['id'];
            } else {
                $ret = $m_member->insert($user_data);
                if ($ret !== false) {
                    $user_data['id'] = $ret[0];
                } else {
                    exit('登录出错！');
                }
            }
            $auth = Auth::instance('member');
            if ($auth->force_login($user_data)) {
                $this->redirect(Request::$referrer);
            }
        }
        $this->content = View::factory('common/user_login_phone');
    }
    
}

