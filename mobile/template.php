<!DOCTYPE html>
<html lang="zh-cn">
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
<?= HTML::script('media/js/jquery.min.js')?>
<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
</head>
<body>
<img src="http://news.baidu.com/resource/img/webapp-news-logo1.png" style="position: absolute; left: -500px; top: -500px; z-index: -100; opacity: 0.1;">
<div class="container">
    <div class="row" id="content">
    <?= $content?>
    </div>
</div>

<script>
$(function() {
	var currentState = {
        url: document.location.href,
        title: document.title,
        html: $("#content").html()
    };
    window.addEventListener("popstate",function(event) {
    	/*console.log(history.state);
    	var currentState = history.state;
        document.title = currentState.title;
        $("#content").html(currentState.html);*/
        if(event && event.state) {
            console.log('111111');
            document.title = event.state.title;
            $("#content").html(event.state.html);
        } else{
            console.log('222222');
            document.title = currentState.title;
            $("#content").html(currentState.html);
        }
    });
    
	$(document).on('click', '.ajax-click', function(){
		var t = $(this);
		var url = this.href;
		if (url != location.href) {
			pushState(url);
		}
		return false;
	});
	
	function pushState(url){
		$.get(url, function(res) {
			$('#content').html(res);
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
</body>
</html>
