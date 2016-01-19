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
<?= HTML::style('media/font-awesome-4.3.0/css/font-awesome.min.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<link rel="stylesheet" type="text/css" href="/media/css/component.css" />
<link rel="stylesheet" type="text/css" href="/media/css/animations.css" />
<?= HTML::script('media/js/jquery.min.js')?>
<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
<?= HTML::script('media/js/modernizr.custom.js')?>
<style>
.img, .article_content img {max-width: 100%}
a:link, a:hover, a:active, a:visited {text-decoration:none;}
a:focus, a:hover {color: #fff}
.navbar {min-height: 50px;margin-bottom:0px;background: #dd0000;}
.navbar-brand {height: 50px;line-height: 50px;padding: 2px 0 0 10px; color:#fff;}
.navbar-header span{ color:#fff;height: 50px;line-height: 50px; text-align:center}
</style>
</head>
<body>
<img src="http://news.baidu.com/resource/img/webapp-news-logo1.png" style="position: absolute; left: -500px; top: -500px; z-index: -100; opacity: 0.1;">
<div id="pt-main" class="pt-perspective">
	<div class="pt-page pt-page-1"><?= $content?></div>
	<div class="pt-page pt-page-2" id="content" style="background: #fff"></div>
</div>

<script>
$(function() {
	var currentState = {
        url: document.location.href,
        title: document.title,
        html: $('.pt-page-current').html()
    };
    window.addEventListener("popstate",function(event) {
        PageTransitions.next(2);
        /*if(history.state) {
        	console.log(history.state);
        	currentState = history.state;
        }
        document.title = currentState.title;
		setTimeout(function() {
		$('.pt-page-current').html(currentState.html);
		}, 500);*/
			/*
        if(event && event.state) {
            console.log('111111');
            document.title = event.state.title;
			setTimeout(function() {
			$('.pt-page-current').html(event.state.html);
			}, 500);
        } else{
            console.log('222222');
            document.title = currentState.title;
			setTimeout(function() {
			$('.pt-page-current').html(currentState.html);
			}, 500);
        }*/
    });
    
	$(document).on('click', '.ajax-click', function(){
		var t = $(this);
		var url = t.data('url');
		if (url != location.href) {
			pushState(url);
		}
		return false;
	});
	
	function pushState(url){
		PageTransitions.next(1);
		$.get(url, function(res) {
			setTimeout(function() {
				$('.pt-page-current').html(res);
			}, 500);
			var state = {
                url: url,
                title: document.title,
                html: res
            };
            history.pushState(state,null,url);
		});
	}
	
	function replaceState(url){
		$.get(url, function(res) {
			$('#content').html(res);
			var state = {
                url: url,
                title: document.title,
                html: res
            };
            history.replaceState(state,null,url);
		});
	}
});
</script>
<?= HTML::script('media/js/pagetransitions.js')?>
<?= HTML::script('media/js/jquery.fitvids.min.js')?>
<?= HTML::script('media/js/main.js')?>
</body>
</html>
