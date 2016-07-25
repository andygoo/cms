
<?= HTML::style('media/css/normalize.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>

<?= HTML::style('media/sweetalert/sweetalert.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>

<?= HTML::script('media/sweetalert/sweetalert.min.js');?>
<?= HTML::script('media/js/swiper-3.3.1.jquery.min.js');?>
<?php 
//HTML::script('media/swiper/js/swiper.min.js');
?>

<style>
body {font-family:"Comic Sans MS","幼圆","黑体",sans-serif;font-size:12px;background:#f5f2f2;color:#212121;}
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
    <div class="col-xs" id="img_tel" style="background: #fff;color: #dd0000;border-top:1px solid #eee">
        <div>电话咨询</div>
    </div>
    <div class="col-xs" id="yuyue_kanche_btn" style="background: #dd0000;color: #fff">
        <div>预约看车</div>
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

	$('#img_tel').click(function () {
		swal({
			title: "预约看车",
			text: '<fieldset>购车顾问将马上与您联系\
				<input style="display:block" name="price" type="tel" placeholder="请输入意向价格">\
				<input style="display:block" name="phone" type="tel" placeholder="请输入电话号码">\
				</fieldset>',
			html: true,
			confirmButtonText: "提交",
			allowOutsideClick: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: true
		}, function() {
			var price = $('.sweet-alert input[name=price]').val();
			var phone = $('.sweet-alert input[name=phone]').val();
			if (price === "") {
				swal.showInputError("请输入意向价格");
				$('.sweet-alert input[name=price]').focus();
    			return false;
			}
			if (phone === "") {
				swal.showInputError("请输入手机号码");
				$('.sweet-alert input[name=phone]').focus();
    			return false;
			}
			var phone_ptn = /^1[34578][0-9]{9}$/;
	        if (!phone_ptn.test(phone)) {
				swal.showInputError("请输入正确的手机号码");
				$('.sweet-alert input[name=phone]').focus();
				return false;
			}
	        setTimeout(function() {
    			swal({
    				type: 'success',
    				title: '',
    				text: '提交成功，我们会尽快联系您！',
    				allowOutsideClick: true 
    			});
	        }, 1000);
		});
		setTimeout(function() {
			$('.sweet-alert input')[0].focus();
			$('.sweet-alert input').keyup(swal.resetInputError);
        }, 400)
	});
	
	$('#yuyue_kanche_btn').click(function () {
		swal({
			type: 'input',
			inputType: 'tel',
			title: "预约看车",
			text: '购车顾问将马上与您联系',
			inputPlaceholder: "请输入电话号码",
			confirmButtonText: "提交",
			allowOutsideClick: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: true
		},
		function(phone) {
			if (phone === false) return false;
			if (phone === "") {
				swal.showInputError("请输入手机号码");
				return false;
			}
			var phone_ptn = /^1[34578][0-9]{9}$/;
	        if (!phone_ptn.test(phone)) {
				swal.showInputError("请输入正确的手机号码");
				return false;
			}
	        setTimeout(function(){
    			swal({
    				type: 'success',
    				title: '',
    				text: '提交成功，我们会尽快联系您！',
    				allowOutsideClick: true 
    			});
	        }, 1000);
		});
	});
		
});
</script>