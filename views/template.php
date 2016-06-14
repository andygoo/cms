<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/font-awesome-4.3.0/css/font-awesome.min.css')?>
<?= HTML::style('media/css/screen.css')?>
</head>
<body>
<?php include __DIR__ . '/header.php';?>
<?php include __DIR__ . '/nav.php';?>

<section class="content-wrap">
    <div class="container">
        <div class="row">
            <main class="col-md-8 main-content" id="content">
            <?php echo $content?>
            </main>
            <?php include __DIR__ . '/sidebar.php';?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php';?>
<script>
$(function(){
	var currentState = {
        url: document.location.href,
        title: document.title,
        content: $("#content").html(),
    };
	$(document).on('click', '.pagination a', function() {
		var t = $(this);
		var url = t.attr('href');
		if (url.split('#')[0].length) {
    		$.get(url, function(res) {
    			$('#content').html(res);
    			var state = {
                    url: url,
                    title: document.title,
                    content: $("#content").html(),
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
        } else{
            document.title = currentState.title;
            $("#content").html(currentState.content);
        }
    });
});
</script>
</body>
</html>
