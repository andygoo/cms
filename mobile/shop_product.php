
<?= HTML::style('media/css/card.css')?>
<?= HTML::style('media/css/weui.min.css')?>

<?= HTML::style('media/css/normalize.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>

<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::script('media/js/swiper-3.3.1.jquery.min.js');?>
<?php 
//HTML::script('media/swiper/js/swiper.min.js');
?>

<style>
body {font-family:"Comic Sans MS","幼圆","黑体",sans-serif;font-size:12px;background:#f5f2f2;color:#212121;padding-bottom:44px;}
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

<?php 
$list = array(
    'http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg',
    'http://image1.hc51img.com/3c17b5cbefbf874ee03158d5a5201222dfa35991.jpg',
    'http://image1.hc51img.com/3fda95a16aa7e9b381226e8a2d520e2b775e1012.jpg',
    'http://image1.hc51img.com/e74343983ec7218a055f9b632d9c25107058018d.jpg',
    'http://image1.hc51img.com/d005616e6e3df01d6c2528981a97860e836056d8.jpg',
    'http://image1.hc51img.com/734c685a67e2f58fc9b34d6076b493135a683d7e.jpg',
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
    <span><?php echo $vehicle_info['vehicle_name']?></span>
    <?php echo sprintf("%s上牌 · %.1f万公里 · %s", date("Y.m", $vehicle_info['register_time']), $vehicle_info['miles'], $vehicle_info['geerbox_type']=='1' ? '手动':'自动');?>
</div>

<div class="auto-quote">
    <span class="aqtit">车主<?php echo $vehicle_info['seller_name']?>报价</span>
    <span class="tax-price">新车含税价 <span class="aqdeli"><?php echo sprintf("%.2f", $vehicle_info['quoted_price']*1.1);?>万</span></span>
</div>

<div class="auto-price">
    <span class="price"><?php echo sprintf("%.2f", $vehicle_info['seller_price']);?></span>万 
</div>

<div class="row" style="position: fixed; left:0; bottom:0; width: 100%; height: 44px; line-height: 44px; text-align: center; font-size: 16px; margin: 0">
    <div class="col-xs" id="add_cart_btn" data-productid="<?= $vehicle_info['id'];?>" style="background: #fff;color: #dd0000;border-top:1px solid #eee">
        <div>电话咨询</div>
    </div>
    <div class="col-xs" id="add_cart_btn2" data-productid="<?= $vehicle_info['id'];?>" style="background: #dd0000;color: #fff">
        <div>预约看车</div>
    </div>
</div>

<div id="toast" style="display: none;">
    <div class="weui_mask_transparent"></div>
    <div class="weui_toast">
        <i class="weui_icon_toast"></i>
        <p class="weui_toast_content">已添加</p>
    </div>
</div>

<?php include __DIR__ . '/common/photoswipe.php';?>

<script>
$(function() {
	swiper = new Swiper('#swiper', {
		lazyLoading : true,
		lazyLoadingInPrevNext : true,
		pagination: '.swiper-pagination',
        paginationType: 'fraction'
		//loop: true
	});

	$('#add_cart_btn').click(function () {
	    var url = "<?php echo URL::site('cart/add')?>";
	    var parmas = {};
	    parmas.id = $(this).data('productid');
		$.get(url, parmas, function (res) {
		    $('#mini-cart').html(res);
		    $('#cart-items').text($('#mini-cart-items').data('count'));
		    if (1) {
    		    $('#toast').show();
                setTimeout(function () {
                    $('#toast').hide();
                }, 2000);
		    } else {
			    location.href = '<?php echo URL::site('cart/checkout')?>';
		    }
		});
		return false;
	});
});
</script>

