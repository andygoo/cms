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
</head>
<body>
<div id="pt-main" class="pt-perspective">
	<div class="pt-page pt-page-1"><?= $content?></div>
	<div class="pt-page pt-page-2" id="pt-page-2" style="background: #fff"></div>
</div>
<?= HTML::script('media/js/pagetransitions.js')?>
<script>
var loading = false;
$(function() {
    window.addEventListener("popstate",function(event) {
    	if (loading == false) {
    	    PageTransitions.next(2);
		} else {
			setTimeout(function() {
				PageTransitions.next(2);
			}, 300);
		}
    });
	$(document).on('click', '.ajax-click', function() {
		loading = true;
		var t = $(this);
		var url = t.data('url');
		if (url != location.href) {
		    history.pushState({}, null, url);
			PageTransitions.next(1);
			$.get(url, function(res) {
				setTimeout(function() {
					$('#pt-page-2').html(res);
					loading = false;
				}, 600);
			});
		}
	});
});
</script>
</body>
</html>
