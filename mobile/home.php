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
    height: 41px;
    background: #fff;
    border-bottom: 1px solid #d9d9d9;
}
.nav_bar span {
	display: table-cell;
    height: 40px;
    line-height: 40px;
	background: #fff;
	border-radius: 0;
    border-bottom: 1px solid #fff;
	opacity: 0.8;
}
.nav_bar .swiper-pagination-bullet-active  {
    border-bottom: 2px solid #dd0000;
    color: #dd0000;
}

.media {margin-top:8px;padding-bottom:8px; border-bottom: 1px solid #f5f5f5;text-align:left;}
.media-list{margin:10px;}
</style>

<div class="swiper-pagination nav_bar"></div>
<div class="swiper-container" id="swiper">
    <div class="swiper-wrapper">
        <?php foreach($list as $cid=>$article_list): ?>
        <div class="swiper-slide">
            <ul class="media-list">
            <?php foreach($article_list as $item): ?>
                <li class="media">
                    <div class="media-left">
                        <?= HTML::image($item['pic'].'?imageView2/2/w/160/h/120', array('width'=>'100px')) ?>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a style="color:#4d4d4d;font-size:16px;" href="#<?= URL::site('article?id='.$item['id'])?>"><?= $item['title'] ?></a></h4>
                        <div class="text-muted"><?= date('Y-m-d', $item['add_time'])?></div>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endforeach;?>
    </div>
</div>

<?= HTML::script('media/swiper/js/swiper.min.js')?>
<script>
var swiper = new Swiper('#swiper', {
    pagination: '.nav_bar',
    paginationClickable: true,
    paginationBulletRender: function (index, className) {
        var cat = ['检测保障','二手车问答','好车杂谈','车主卖车'];
        return '<span class="' + className + '">' + cat[index] + '</span>';
    }
});
$(function() {
	//alert($(window).height());
	//$('body').attr('style', 'height:'+$(window).height()+'px');
	var h = $(window).height();
	var h2 = $('.nav_bar').height();
	$('#swiper').find('.swiper-slide').attr('style', 'height:'+(h-h2)+'px;overflow:auto');
});
</script>
