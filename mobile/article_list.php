
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::style('media/css/article/m.css')?>

<?= HTML::script('media/swiper/js/swiper.min.js')?>

<div class="swiper-container swiper_c" id="swiper">
    <div class="swiper-wrapper">
        <?php foreach(array_slice($list, 0, 2) as $item): ?>
        <div class="swiper-slide ajax-click" onclick="window.open('<?= URL::site('article/detail?id='.$item['id'], true)?>')">
            <img class="img" src="<?= $item['pic']?>?imageView2/1/w/400/h/200" width="100%">
        </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>
    
<?php unset($list[0],$list[1])?>
<?php include __DIR__ . '/article/list_incr.php';?>

<?php if (!empty($next_page)): ?>
<div class="ui-refresh ajax-link" data-url="<?= $next_page ?>">点击加载更多</div>
<?php endif ?>
        
<script>
$(function() {
	new Swiper('#swiper', {
		pagination: '.swiper-pagination'
	});
	$(document).on('click', '.ajax-link', function() {
		var t = $(this);
		var url = this.href || t.data('url');
	    $.get(url, function(res) {
		    if (res.next_page != '') {
		        t.before(res.content);
		        t.data('url', res.next_page);
		    } else {
		        t.hide();
		    }
	    });
	    return false;
	});
});
</script>
