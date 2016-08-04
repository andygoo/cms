
<style>
.mdl-layout-title{width: 90%;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;}
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header ">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
            <i class="mdicon arrow-back"></i>
        </button>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">北京现代ix35 2013款 2.0L 自动两驱智能型GLS 国IV</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
</header>

<?= HTML::style('media/swiper/css/swiper.min.css')?>
<main class="mdl-layout__content">
    <?php 
    $list = array(
        'http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg',
        'http://image1.hc51img.com/3c17b5cbefbf874ee03158d5a5201222dfa35991.jpg',
        'http://image1.hc51img.com/3fda95a16aa7e9b381226e8a2d520e2b775e1012.jpg',
        'http://image1.hc51img.com/e74343983ec7218a055f9b632d9c25107058018d.jpg',
    );
    ?>
    <div class="swiper-container" id="swiper">
        <div class="swiper-wrapper">
            <?php foreach($list as $key=>$pic): ?>
            <div class="swiper-slide" style="min-height:240px">
                <a class="swipe" href="<?= $pic?>?imageView2/1/w/800/h/600" data-size="800x600">
                    <img data-src="<?= $pic?>?imageView2/1/w/500/h/375" width="100%" class="swiper-lazy">
                    <span style="display: none;">外观图<br><small>车辆左右两侧对称一致，前方行驶灯功能正常，发动机舱盖合缝严密。</small></span>
                </a>
                <div class="swiper-lazy-preloader"></div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="swiper-pagination" style="color:#fff"></div>
    </div>
</main>
</div>

<?php include __DIR__ . '/common/photoswipe.php';?>

<?= HTML::script('media/js/swiper-3.3.1.jquery.min.js');?>
<script>
$(function() {
	swiper = new Swiper('#swiper', {
		lazyLoading : true,
		lazyLoadingInPrevNext : true,
		pagination: '.swiper-pagination',
        paginationType: 'fraction'
		//loop: true
	});
});
</script>
