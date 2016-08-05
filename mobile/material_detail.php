
<style>
.mdl-layout-title{width: 90%;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;}
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
            <i class="mdicon arrow-back"></i>
        </button>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title" style="display: none">北京现代ix35 2013款 2.0L 自动两驱智能型GLS 国IV</span>
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

<style>
body {font-family:"Comic Sans MS","幼圆","黑体",sans-serif;font-size:12px;color:#212121;}
.sweet-alert .sa-error-container .icon {width: 20px; height: 20px;}
.sweet-alert .sa-input-error{top: 23px; right: 13px}
.sweet-alert .sa-input-error.show {opacity:0}

.auto-tit{background:#fff;padding:13px 10px 13px 10px;position:relative;}
.auto-tit span:nth-child(1){font-size:18px;display:block;padding:0 0 3px 0;}
.auto-tit span:nth-child(2){}
.auto-quote{text-align:center;padding:14px 10px 10px 10px;}
.aqdrop{font-size:12px;color:#43a047;text-shadow:#fff 0 1px 0;}
.aqdeli{text-decoration:line-through;font-size:12px;}
.auto-quote .aqtit{display:block;font-size:20px;padding:0 0 3px 0;}
.tax-price{color:#929292;}
.auto-price{border-bottom:1px solid #fff;text-align:center;padding:0 10px 10px 10px;color:#ea2504;}
.auto-price .price{font-size:30px;font-weight:bold;text-shadow:#fff 0 1px 0;}
</style>

<?= HTML::style('media/css/flexboxgrid.min.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<main class="mdl-layout__content" style="margin-top:-56px;padding-bottom:55px;">
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
    
    <div class="auto-tit">
        <span>北京现代ix35 2013款 2.0L 自动两驱智能型GLS 国IV</span>
        2014.04上牌 · 3.0万公里 · 手动
    </div>
    
    <div class="auto-quote">
        <span class="aqtit">车主报价</span>
        <span class="tax-price">新车含税价 3.89万</span>
    </div>
    <div class="auto-price">
        <span class="price">2.68</span>万 
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <div class="row" style="position: fixed; left:0; bottom:0; width: 100%; height: 44px; line-height: 44px; text-align: center; font-size: 16px; margin: 0">
        <div class="col-xs" id="img_tel" style="background: #fff;color: #dd0000;border-top:1px solid #eee">
            <div>电话咨询</div>
        </div>
        <div class="col-xs" id="yuyue_kanche_btn" style="background: #dd0000;color: #fff">
            <div>预约看车</div>
        </div>
    </div>
    
</main>
</div>


<?php include __DIR__ . '/common/photoswipe.php';?>

<?= HTML::script('media/swiper/js/swiper.jquery.min.js');?>
<script>
$(function() {
	swiper = new Swiper('#swiper', {
		lazyLoading : true,
		lazyLoadingInPrevNext : true,
		pagination: '.swiper-pagination',
        paginationType: 'fraction'
		//loop: true
	});

	$('.mdl-layout__content').scroll(function() {
		if ($(this).scrollTop() > 200) {
			$('.mdl-layout-title').show();
			$('.mdl-layout__header').removeClass('mdl-layout__header--transparent');
		} else {
			$('.mdl-layout-title').hide();
			$('.mdl-layout__header').addClass('mdl-layout__header--transparent');
		}
	});
});
</script>
