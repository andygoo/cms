
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::style('media/css/article/m.css')?>

<?= HTML::script('media/swiper/js/swiper.min.js')?>

<div class="swiper-pagination nav_bar"></div>

<div id="swiper" class="swiper-container">
    <div class="swiper-wrapper">
        <?php foreach($all_list as $cid=>$list): ?>
        <div class="swiper-slide swiper-slide2" data-hash="slide<?= $cid?>">
        
            <div class="swiper-container swiper_c" id="<?= $cid?>">
                <div class="swiper-wrapper">
                    <?php foreach(array_slice($list, 0, 2) as $item): ?>
                    <div class="swiper-slide ajax-click" onclick="window.open('<?= URL::site('article/detail?id='.$item['id'], true)?>')">
                        <img class="img" src="<?= $item['pic']?>?imageView2/1/w/400/h/200" width="100%">
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination" id="pagination_<?= $cid?>"></div>
            </div>
                
            <?php unset($list[0],$list[1])?>
            <?php include __DIR__ . '/article/list_incr.php';?>
            
        </div>
        <?php endforeach;?>
    </div>
</div>

<script>
$(function() {
	$('.swiper_c').each(function() {
		var t = $(this);
		var pid = t.attr('id');
		new Swiper($(this), {pagination: '#pagination_'+pid});
	});
	$('.swiper-slide2').attr('style', 'height:'+($(window).height()-42)+'px;overflow:auto');
	var swiper = new Swiper('#swiper', {
	    pagination: '.nav_bar',
	    hashnav:true,
	    paginationClickable: true,
	    paginationBulletRender: function (index, className) {
	        var cat = ['检测保障','二手车问答','好车杂谈','车主卖车'];
	        return '<span class="' + className + '">' + cat[index] + '</span>';
	    },
        onSlideChangeStart: function(swiper) {
            var idx = swiper.activeIndex;
        }
	});
});
</script>
