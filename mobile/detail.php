<?= HTML::style('media/css/header.css')?>
<?= HTML::style('media/css/details.css')?>
<?php 
//HTML::script('media/swiper/js/swiper.min.js');
?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::style('media/sweetalert/sweetalert.css')?>
<?= HTML::script('media/js/swiper-3.3.1.jquery.min.js');?>
<?= HTML::script('media/sweetalert/sweetalert.min.js');?>
<style>
.sweet-alert .sa-error-container .icon {width: 20px; height: 20px;}
.sweet-alert .sa-error-container.show {padding: 0;}
.sweet-alert .sa-input-error{top: 23px; right: 13px}
.sweet-alert .sa-input-error.show {opacity:0}
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
    <?php if ($vehicle_info['cut_price'] > 0): ?>
    <span class="aqdrop">已降<?php echo $vehicle_info['cut_price']*10000?>元，</span>
    <?php endif;?>
    <span class="tax-price">新车含税价 <span class="aqdeli"><?php echo sprintf("%.2f", $vehicle_info['quoted_price']*1.1);?>万</span></span>
</div>
<div class="auto-price">
    <span class="price"><?php echo sprintf("%.2f", $vehicle_info['seller_price']);?></span>万 
</div>
<div class="service-charge">服务费
<?php $service_fee = 10000*$vehicle_info['seller_price']*0.03; ?>
<?php echo $service_fee<2000 ? 2000 : $service_fee?>元<span>(车价×3%, 2000元起)</span>
</div>
<div class="service-guarantee">
    <ul>
        <li>
            <div class="icon"> 
                <span class="line tip"></span> 
                <span class="line long"></span> 
                <span class="line dian"></span> 
            </div>
            <div class="ltext">218项专业检测</div>
        </li>
        <li>
            <div class="icon"> 
                <span class="line tip"></span> 
                <span class="line long"></span> 
                <span class="line dian"></span> 
            </div>
            <div class="ltext">1年/2万公里质保</div>
        </li>
        <li>
            <div class="icon"> 
                <span class="line tip"></span> 
                <span class="line long"></span> 
                <span class="line dian"></span> 
            </div>
            <div class="ltext">14天可退车承诺</div>
        </li>
        <li>
            <div class="icon"> 
                <span class="line tip"></span> 
                <span class="line long"></span> 
                <span class="line dian"></span> 
            </div>
            <div class="ltext">全程陪看代办过户</div>
        </li>
    </ul>
    <div class="clear"></div>
</div>
<div style="height:44px;"></div>
<div class="cars-advisory">
    <ul>
        <li class="telcon"><a href="javascript:void(0)" id="img_tel"><span>电话咨询</span></a></li>
        <li class="kancar"><a href="javascript:void(0)" id="yuyue_kanche_btn">预约看车</a></li>
    </ul>
</div>

<?php include __DIR__ . '/photoswipe.php';?>

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