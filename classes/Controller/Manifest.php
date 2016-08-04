<?php

class Controller_Manifest extends Controller {

    public function action_index() {
        exit;
    }
    
    public function action_demo2() {
        header("Last-Modified: " . gmdate('D, d M Y H:i:s T'));
        header("Expires: " . gmdate('D, d M Y H:i:s T', time()+315360000));
        header("Cache-Control: max-age=315360000");
		header('Content-Type: text/cache-manifest; charset=utf-8');
		//header("HTTP/1.1 304 Not Modified");
		$version = date('Y-m-d H:i:s');
        echo <<<EOF
﻿CACHE MANIFEST

# VERSION $version

# 直接缓存的文件
CACHE:
/media/MDicons/css/MDicon.min.css
/media/mdl/material.cyan-red.min.css
/media/mdl/material.min.js
/media/sidebarjs/sidebarjs.css
/media/css/weui.min.css
/media/js/jquery.min.js
/media/sidebarjs/sidebarjs.js
/media/MDicons/fonts/mdicon.woff
http://7xkkhh.com1.z0.glb.clouddn.com/2016/08/01/14700177870141.jpg?imageView2/1/w/600/h/302

# 需要在线访问的文件
NETWORK:
*

# 替代方案
FALLBACK:
#/ offline.html
EOF;
        exit;
    }
}

