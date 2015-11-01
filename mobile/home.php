<style>
.swiper-container {
    width: 100%;
	height:100%;
}
.swiper-slide {
    text-align: center;
    background: #fff;
    width: 100%;
    
    /* Center slide text vertically
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center; */
}

.media {margin-top:8px;padding-bottom:8px; border-bottom: 1px solid #f5f5f5;text-align:left;}
.media-list{margin:10px;}
.swiper-pagination2 {
	position: relative;
    background: #fff;
    display: table;
    overflow: hidden;
    position: relative;
    table-layout: fixed;
    height: 41px;
    width: 100%;
    border-bottom: 1px solid #d9d9d9;
}
.swiper-pagination2 .swiper-pagination-bullet {
    float: left;
    width: 25%;
    height: 40px;
    line-height: 40px;
    border-bottom: 1px solid #fff;
    overflow: hidden;
    text-align: center;
    text-overflow: ellipsis;
    transition: background-color 0.1s linear 0s;
    white-space: nowrap;
    position: relative;	
	border-radius: 0;
	background: #fff;
	opacity: 0.8;
}
.swiper-pagination2 .swiper-pagination-bullet-active  {
    border-bottom: 2px solid #dd0000;
    color: #dd0000;
}
</style>

<div class="swiper-container" id="swiper1">
    <div class="swiper-wrapper">
        <?php foreach($list[0] as $key=>$item): ?>
        <div class="swiper-slide"><img src="<?= $item['pic']?>?imageView2/1/w/480/h/240" width="100%"></div>
        <?php endforeach;?>
    </div>
    <div class="swiper-pagination swiper-pagination1" style="text-align: right;"></div>
</div>

<div class="swiper-pagination swiper-pagination2"></div>
<div class="swiper-container" id="swiper2" style="position: relative;">
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
                        <h4 class="media-heading"><a style="color:#4d4d4d;font-size:16px;" href="<?= URL::site('article?id='.$item['id'])?>"><?= $item['title'] ?></a></h4>
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
var swiper1 = new Swiper('#swiper1', {
    pagination: '.swiper-pagination1',
    paginationClickable: true,
    loop: true
});
var swiper2 = new Swiper('#swiper2', {
    pagination: '.swiper-pagination2',
    paginationClickable: true,
    paginationBulletRender: function (index, className) {
        var cat = ['检测保障','二手车问答','好车杂谈','车主卖车'];
        return '<span class="' + className + '">' + cat[index] + '</span>';
    }
});
$(function() {
	var h2 = $('.swiper-pagination2').height();
	var h = $(window).height();
	$('#swiper2').find('.swiper-slide').attr('style', 'height:'+(h-h2)+'px;overflow:auto');
	$(window).on('orientationchange', function() {
	    var h = $(window).width();
		$('#swiper2').find('.swiper-slide').attr('style', 'height:'+(h-h2)+'px;overflow:auto');
	});
});
</script>
