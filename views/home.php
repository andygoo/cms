
<style>
.swiper-container {
    width: 100%;
    height: 100%;
	margin-bottom: 20px;
}
.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    width: 100%;
    
    /* Center slide text vertically */
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
    align-items: center;
}
</style>

<!-- 
<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php foreach($list as $item): ?>
        <div class="swiper-slide"><img src="<?= $item['pic']?>?imageView2/1/w/500/h/250" width="100%"></div>
        <?php endforeach;?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
 -->

<ul class="media-list">
<?php foreach($list as $item): ?>
    <li class="media post" style="padding: 15px;margin-bottom:0">
    <?php if ($item['featured']):?>
    <div class="featured">
        <i class="fa fa-star"></i>
    </div>
    <?php endif;?>
        <div class="media-left">
            <?php if (strpos($item['pic'], '://') !== false):?>
            <?= HTML::image($item['pic'].'?imageView2/2/w/160/h/120', array('width'=>160)) ?>
            <?php else:?>
            <?= HTML::image('/imagefly/w200-h150-c/' . $item['pic'], array('width'=>160)) ?>
            <?php endif;?>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><a href="<?= URL::site('article?id='.$item['id'])?>"><?= $item['title'] ?></a></h4>
            <div class="post-meta">
                <time class="post-date"><?= date('Y-m-d', $item['add_time'])?></time> &bull;
                <a href="<?= URL::site('home?cid='.$item['cid'])?>"><?= $item['cat_name']?></a>
            </div>
            <div class="text-muted"><?= Text::limit_chars($item['brief'],80) ?></div>
        </div>
    </li>
<?php endforeach; ?>
</ul>



<?php foreach ($list as $item):?>
<?php continue;?>
<article class="post">
    <?php if ($item['featured']):?>
    <div class="featured">
        <i class="fa fa-star"></i>
    </div>
    <?php endif;?>
    <div class="post-head">
        <h1 class="post-title"><a href="<?= URL::site('article?id='.$item['id'])?>"><?= $item['title']?></a></h1>
        <div class="post-meta">
            <time class="post-date"><?= date('Y-m-d', $item['add_time'])?></time> &bull;
            <a href="<?= URL::site('home?cid='.$item['cid'])?>"><?= $item['cat_name']?></a>
        </div>
    </div>
    <div class="post-content">
        <?= $item['brief']?>
    </div>
    <div class="post-permalink">
        <a href="<?= URL::site('article?id='.$item['id'])?>" class="btn btn-default">阅读全文</a>
    </div>
</article>
<?php endforeach;?>

<?= $pager?>

<?= HTML::script('media/swiper/js/swiper.min.js')?>
<script>
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,

    //nextButton: '.swiper-button-next',
    //prevButton: '.swiper-button-prev',
    
    //slidesPerView: 3,
    //slidesPerView: 'auto',
    //spaceBetween: 20,
    
    //autoplay: 2500,
    //autoplayDisableOnInteraction: false,
    
    loop: true
});
</script>
