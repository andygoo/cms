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

.swiper_c .swiper-pagination{bottom: 0; text-align: right}
.swiper_c .swiper-pagination-bullet{background: #fff;opacity: .8}
.swiper_c .swiper-pagination-bullet-active{background: #dd0000}

.media {margin-top:8px;padding-bottom:8px; border-bottom: 1px solid #f5f5f5;text-align:left;}
.media-list{margin:10px;}
.media-list li:last-chid{border-bottom:none;}
.media-heading {font-size:16px;}

</style>

<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)"><i class="glyphicon glyphicon-home"></i>&nbsp;好车故事</a>
    </div>
  </div>
</nav>

<div class="swiper-pagination nav_bar"></div>
<div class="swiper-container" id="swiper">
    <div class="swiper-wrapper">
        <?php foreach($list as $cid=>$article_list): ?>
        <div class="swiper-slide">
        
            <div class="swiper-container swiper_c" id="<?= $cid?>" style="height:160px">
                <div class="swiper-wrapper">
                    <?php foreach(array_slice($article_list, 0, 2) as $item): ?>
                    <div class="swiper-slide">
                        <img class="img" src="<?= $item['pic']?>?imageView2/1/w/400/h/200" width="100%">
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination" id="pagination_<?= $cid?>"></div>
            </div>
                
            <?php unset($article_list[0],$article_list[1])?>
            <ul class="media-list">
                <?php foreach($article_list as $item): ?>
                <li class="media ajax-click" data-url="<?= URL::site('article?id='.$item['id'], true)?>">
                    <div class="media-left">
                        <?= HTML::image($item['pic'].'?imageView2/2/w/160/h/120', array('width'=>'100px')) ?>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $item['title'] ?></h4>
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
$(function() {
	var h = $(window).height();
	var h2 = $('.navbar').height();
	var h3 = $('.nav_bar').height();
	$('#swiper').find('.swiper-slide').attr('style', 'height:'+(h-h2-h3-2)+'px;overflow:auto');
});
</script>
