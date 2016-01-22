<!DOCTYPE html>
<html lang="zh-cn" class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="shortcut icon" href="http://m.baidu.com/static/news/webapp/webappandroid/img/webapp-news-logo.png">
<title><?= $title?></title>
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::style('media/css/component.css')?>
<?= HTML::style('media/css/animations.css')?>
<?= HTML::script('media/js/jquery.min.js')?>
<?= HTML::script('media/js/modernizr.custom.js')?>
<style>
.img, .article_content img {max-width: 100%}
a:link, a:hover, a:active, a:visited {text-decoration:none;}
a:focus, a:hover {color: #fff}
.navbar {min-height: 50px;margin-bottom:0px;background: #dd0000;}
.navbar-brand {height: 50px;line-height: 50px;padding: 2px 0 0 10px; color:#fff;}
.navbar-header span{ color:#fff;height: 50px;line-height: 50px; text-align:center}
</style>
<style type="text/css">
@-webkit-keyframes loading-anim{0%{-webkit-transform:rotate(0)} 50%{-webkit-transform:rotate(180deg)} 100%{-webkit-transform:rotate(360deg)}} 
.page-loading{position:absolute;left:0;top:50px;right:0;bottom:0;display:inline-block;background-color:#fff;z-index:1000;text-align:center} 
.page-loading-text{color:#888;font:400 16px/30px normal} 
.page-loading-logo,.page-loading-anim{margin-top:160px;height:70px;width:70px;display:inline-block;background:url(/media/img/loading-logo-webapp.png) 0 0 no-repeat;background-size:70px 140px} 
.page-loading-anim{margin:0;-webkit-animation:loading-anim 2s linear infinite;background-position:0 -70px}
</style>
</head>
<body>
<div id="pt-main" class="pt-perspective">
	<div class="pt-page pt-page-1">
    	<nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="javascript:void(0)"><i class="glyphicon glyphicon-home"></i>&nbsp;好车故事</a>
            </div>
          </div>
        </nav>
        <div id="article_list">
            <div class="page-loading">
                <div class="page-loading-logo">
                    <div class="page-loading-anim"></div>
                </div>
                <div class="page-loading-text">加载中，请稍候...</div>
            </div>
        </div>
	</div>
	<div class="pt-page pt-page-2" style="background: #fff">
    	<nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="javascript:void(0)" onclick="history.back()"><i class="glyphicon glyphicon-menu-left"></i></a>
              <span></span>
            </div>
          </div>
        </nav>
        <div id="article_content">
            <div class="page-loading">
                <div class="page-loading-logo">
                    <div class="page-loading-anim"></div>
                </div>
                <div class="page-loading-text">加载中，请稍候...</div>
            </div>
        </div>
	</div>
</div>

<?= HTML::script('media/js/pagetransitions.js')?>
<script>
var loading = false;
var timer = null;
var wh = $(window).height();
var home_url = 'http://'+location.host+'/';
var curr_url = location.href;
var home_content = curr_url==home_url ? true : false;
var currentState = {
    url: home_url,
    title: document.title,
}
$(function() {

	function set_list_content(res) {
        $('#article_list').html(res);
    	$('#swiper').find('.swiper-slide').attr('style', 'height:'+(wh-50-42)+'px;overflow:auto');
    	$('#article_content').html('<div class="page-loading"><div class="page-loading-logo"><div class="page-loading-anim"></div></div><div class="page-loading-text">加载中，请稍候...</div></div>');
    }

	function set_detail_content(res) {
        $('#article_content').html(res);
        $('#article_content').attr('style', 'height:'+(wh-50)+'px;overflow:auto');
        //$('#article_list').html('<div class="page-loading"><div class="page-loading-logo"><div class="page-loading-anim"></div></div><div class="page-loading-text">加载中，请稍候...</div></div>');
	}
	
	function init(url) {
		loading = true;
    	if (url == home_url) {
    	    PageTransitions.init(0);
    	    $.get(url, function(res) {
    	    	set_list_content(res);
            	loading = false;
    	    });
    	} else {
    	    PageTransitions.init(1);
    	    $.get(url, function(res) {
    	    	set_detail_content(res);
            	loading = false;
    	    });
    	}
	}
	function push(url) {
		loading = true;
		PageTransitions.next('left');
	    history.pushState({url: url, title: document.title}, null, url);
    	if (url == home_url) {
    	    $.get(url, function(res) {
    	    	setTimeout(function() {
        	    	set_list_content(res);
                	loading = false;
    	    	}, 600);
    	    });
    	} else {
    	    $.get(url, function(res) {
    	    	setTimeout(function() {
        	    	set_detail_content(res);
                	loading = false;
    	    	}, 600);
    	    });
    	}
	}
	function next(url) {
		PageTransitions.next('left');
    	if (url == home_url) {
    	    $.get(url, function(res) {
    			setTimeout(function() {
        	    	set_list_content(res);
                	loading = false;
    	    	}, 600);
    	    });
    	} else {
    	    $.get(url, function(res) {
    			setTimeout(function() {
        	    	set_detail_content(res);
                	loading = false;
    	    	}, 600);
    	    });
    	}
	}
	function prev(url) {
		timer = setInterval(function() {
			if (loading == false) {
				clearInterval(timer);
			    PageTransitions.next('right');
			    setTimeout(function() {
			        $('#article_content').html('<div class="page-loading"><div class="page-loading-logo"><div class="page-loading-anim"></div></div><div class="page-loading-text">加载中，请稍候...</div></div>');
			    }, 600);
			}
		}, 50);
		if (url != curr_url) {
        	if (url == home_url) {
            	if (home_content == false) {
            	    $.get(url, function(res) {
            			setTimeout(function() {
                	    	set_list_content(res);
                	    	home_content = true;
            				loading = false;
            	    	}, 600);
            	    });
            	}
        	} else {
        	    $.get(url, function(res) {
        			setTimeout(function() {
            	    	set_detail_content(res);
        				loading = false;
        	    	}, 600);
        	    });
        	}
		}
	}
    init(location.href);

    window.addEventListener("popstate",function(event) {
        if(event && event.state) {
            console.log('next');
            console.log(event.state);
            document.title = event.state.title;
            var url = event.state.url;
            next(url);
        } else{
            console.log('prev');
            console.log(currentState);
            document.title = currentState.title;
            var url = currentState.url;
            prev(url);
        }
    });
	$(document).on('click', '.ajax-click', function() {
		var t = $(this);
		var url = t.data('url');
		if (url != location.href) {
			push(url);
		}
	});
});
</script>
</body>
</html>
