<style>
.swiper-container {
    width: 100%;
	height:100%;
}
.swiper-slide {
    text-align: center;
    background: #fff;
    width: 100%;
}
.nav_bar {
    position: relative;	
    display: table;
    table-layout: fixed;
    width: 100%;
    height: 40px;
    background: #fff;
    border-bottom: 1px solid #d9d9d9;
}
.nav_bar span {
	display: table-cell;
    vertical-align: middle;
	height: 100%;
	background: #fff;
	border-radius: 0;
    border-bottom: 2px solid #fff;
	opacity: 0.8;
}
.nav_bar span.swiper-pagination-bullet-active  {
    border-bottom: 2px solid #dd0000;
    color: #dd0000;
}

.swiper_c .swiper-pagination{bottom: 0; text-align: right}
.swiper_c .swiper-pagination-bullet{background: #fff;opacity: .8}
.swiper_c .swiper-pagination-bullet-active{background: #dd0000}


.ui-refresh{ display: block; height:36px;line-height:36px;background-color:#f8f9fa;text-align:center;border:1px solid #ebedef;border-radius:1px;color:#545454;margin:14px 40px}

</style>
<div class="swiper-pagination nav_bar"></div>
<div class="swiper-container" id="swiper">
    <div class="swiper-wrapper">
        <?php foreach($list as $cid=>$article_list): ?>
        <div class="swiper-slide">
        
            <div class="swiper-container swiper_c" id="<?= $cid?>" style="height:160px">
                <div class="swiper-wrapper">
                    <?php foreach(array_slice($article_list, 0, 2) as $item): ?>
                    <div class="swiper-slide ajax-click" data-url="<?= URL::site('article?id='.$item['id'], true)?>">
                        <img class="img" src="<?= $item['pic']?>?imageView2/1/w/400/h/200" width="100%">
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination" id="pagination_<?= $cid?>"></div>
            </div>
                
            <?php unset($article_list[0],$article_list[1])?>
            <?php include __DIR__ . '/list_incr.php';?>

            <?php if (!empty($next_page[$cid])): ?>
            <div class="ui-refresh ajax-link" data-url="<?= $next_page[$cid] ?>">点击加载更多</div>
            <?php endif ?>
        </div>
        <?php endforeach;?>
    </div>
</div>

<?= HTML::script('media/swiper/js/swiper.min.js')?>
<script>
$('.swiper_c').each(function() {
	var t = $(this);
	var pid = t.attr('id');
	new Swiper(t, {pagination: '#pagination_'+pid});
});
var swiper = new Swiper('#swiper', {
    pagination: '.nav_bar',
    paginationClickable: true,
    paginationBulletRender: function (index, className) {
        var cat = ['检测保障','二手车问答','好车杂谈','车主卖车'];
        return '<span class="' + className + '">' + cat[index] + '</span>';
    }
});
</script>
