
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::style('media/css/weui.min.css')?>
<style>
body {background: #f5f2f2; overflow-x:hidden}
img {max-width: 100%}
a:hover,a:focus {text-decoration: none;}

#swiper .swiper-pagination{bottom: 0;}
#swiper .swiper-pagination-bullet{width:6px;height:6px;background: #fff;opacity: .6}
#swiper .swiper-pagination-bullet-active{opacity: 1}

.weui_grid{padding: 12px;font-size:12px;color:#444}
</style>

<?= HTML::script('media/js/swiper-3.3.1.jquery.min.js');?>

<?php 
$list = array(
    'http://image3.haoche51.com/o_1ak31dluk1pbl16m1brts3p1iks7.jpg',
    'http://image3.haoche51.com/o_1ak31e9g010ur9fh145p11rrapn7.jpg',
    'http://image3.haoche51.com/o_1ak31fah8eir196o4u1rn11kb7.jpg',
);
?>

<div class="swiper-container" id="swiper">
    <div class="swiper-wrapper">
        <?php foreach($list as $key=>$pic): ?>
        <div class="swiper-slide" style="min-height:160px">
            <img data-src="<?= $pic?>?imageView2/1/w/600/h/300" width="100%" class="swiper-lazy">
            <div class="swiper-lazy-preloader"></div>
        </div>
        <?php endforeach;?>
    </div>
    <div class="swiper-pagination" style="color:#fff"></div>
</div>

<div class="row" style="background: #fff; padding: 15px 20px;">
    <div class="col-xs">
        <button type="button" class="btn btn-danger btn-block">我要买车</button>
    </div>
    <div class="col-xs">
        <button type="button" class="btn btn-warning btn-block">我要卖车</button>
    </div>
</div>

<div class="row weui_grids" style="background: #fff; text-align:center">
    <a class="col-xs-4 weui_grid">3万以下</a>
    <a class="col-xs-4 weui_grid">3-5万</a>
    <a class="col-xs-4 weui_grid">5-7万</a>
    <a class="col-xs-4 weui_grid">7-9万</a>
    <a class="col-xs-4 weui_grid">9-12万</a>
    <a class="col-xs-4 weui_grid">12-15万</a>
    <a class="col-xs-4 weui_grid">15-20万</a>
    <a class="col-xs-4 weui_grid">20-30万</a>
    <a class="col-xs-4 weui_grid">30万以上</a>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0; border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">超值低价</div>
    <div class="row">
        <a class="col-xs"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
        <a class="col-xs"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
        <a class="col-xs"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
    </div>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0; border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">超值低价</div>
    <div class="row" style="padding:10px">
        <a class="col-xs"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
        <a class="col-xs"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
    </div>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0; border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">超值低价</div>
    <div class="row" style="padding: 0 10px 10px;">
        <a class="col-xs-6 col-sm-4" style="margin-top: 10px"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
        <a class="col-xs-6 col-sm-4" style="margin-top: 10px"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
        <a class="col-xs-6 col-sm-4" style="margin-top: 10px"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
        <a class="col-xs-6 col-sm-4" style="margin-top: 10px"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
        <a class="col-xs-6 col-sm-4" style="margin-top: 10px"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>
        <a class="col-xs-6 col-sm-4" style="margin-top: 10px"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></a>    
    </div>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0;border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">热门专题</div>
    <div class="row" style="padding: 0 10px 10px;">
        <a class="col-xs-12" style="margin-top: 10px"><img style="width: 100%" src="http://image3.hc51img.com/2016/05/30/14645769291006.jpg"></a>
        <a class="col-xs-12" style="margin-top: 10px"><img style="width: 100%" src="http://image3.hc51img.com/2016/05/30/14645769291006.jpg"></a>
    </div>
</div>

<script>
$(function() {
	swiper = new Swiper('#swiper', {
		lazyLoading : true,
		lazyLoadingInPrevNext : true,
		pagination: '.swiper-pagination',
		loop: true
	});
});
</script>