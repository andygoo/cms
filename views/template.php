<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kohana-CMS</title>
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/font-awesome-4.3.0/css/font-awesome.min.css')?>
<?= HTML::style('media/css/screen.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
</head>
<body>

<?php include Kohana::find_file('views', 'header');?>
<?php include Kohana::find_file('views', 'nav');?>

<section class="content-wrap">
    <div class="container">
        <div class="row">
            <main class="col-md-8 main-content" id="content">
            <?php echo $content?>
            </main>
            <?php include Kohana::find_file('views', 'sidebar');?>
        </div>
    </div>
</section>

<?php include Kohana::find_file('views', 'footer');?>

<?= View::factory('profiler/stats');?>

<script>
var _maq = _maq || [];
_maq.push(['_setAccount', '222222']);
(function() {
    var ma = document.createElement('script'); ma.type = 'text/javascript'; ma.async = true;
    ma.src = document.location.protocol + '//analytics.jiesc.net/ma.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ma, s);
})();
</script>

<script>
$(function(){
	var currentState = {
        url: document.location.href,
        title: document.title,
        content: $("#content").html(),
        history: $("#history").html()
    };
	$(document).on('click', 'a', function(){
		var t = $(this);
		var url = t.attr('href');
		if (url.split('#')[0].length) {
    		$.get(url, function(res) {
    			$('#content').html(res.content);
    			$('#history').html(res.history);
    			var state = {
                    url: url,
                    title: document.title,
                    content: $("#content").html(),
                    history: $("#history").html()
                };
                history.pushState(state,null,url);
                $(document).scrollTop(0);
                themeApp.responsiveIframe();
    		});
		}
		return false;
	});
    window.addEventListener("popstate",function(event) {
        if(event && event.state) {
            document.title = event.state.title;
            $("#content").html(event.state.content);
            $("#history").html(event.state.history);
        } else{
            document.title = currentState.title;
            $("#content").html(currentState.content);
            $("#history").html(currentState.history);
        }
    });
    
	var nav = $('#main-nav');
	var nt = nav.offset().top;
	$(window).scroll(function() {
		var st = $(document).scrollTop();
		if (nt < st) {
			nav.css({"position":"fixed","top":0, 'width':'100%','z-index':9});
			$('.content-wrap').css({'margin-top': '95px'});
		} else {
			nav.css({"position":"static"});
			$('.content-wrap').css({'margin-top': '0'});
		}
	});
});
</script>

</body>
</html>
