
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::style('media/css/weui.min.css')?>
<style>
body {background: #f5f2f2}
img {max-width: 100%}
.weui_grid{padding: 12px;font-size:12px;color:#444}

.table-equal {
  display: table;
  table-layout: fixed;
  width: 100%;
}
.table-equal li {
  display: table-cell;
}
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

<div class="container-fluid">
    <div class="row" style="background: #fff; padding: 15px 0;">
        <div class="col-xs-6">
            <button type="button" class="btn btn-danger btn-block">我要买车</button>
        </div>
        <div class="col-xs-6">
            <button type="button" class="btn btn-warning btn-block">我要卖车</button>
        </div>
    </div>
</div>

<div class="weui_grids" style="background: #fff;">
    <div class="weui_grid weui_grid_label">3万以下</div>
    <div class="weui_grid weui_grid_label">3-5万</div>
    <div class="weui_grid weui_grid_label">5-7万</div>
    <div class="weui_grid weui_grid_label">7-9万</div>
    <div class="weui_grid weui_grid_label">9-12万</div>
    <div class="weui_grid weui_grid_label">12-15万</div>
    <div class="weui_grid weui_grid_label">15-20万</div>
    <div class="weui_grid weui_grid_label">20-30万</div>
    <div class="weui_grid weui_grid_label">30万以上</div>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0; border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">超值低价</div>
    <ul class="table-equal" style="padding:0 5px;">
        <li style="border:none;padding:10px 5px;"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></li>
        <li style="border:none;padding:10px 5px;"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></li>
        <li style="border:none;padding:10px 5px;"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></li>
    </ul>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0; border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">超值低价</div>
    <ul class="table-equal" style="padding:0 5px;">
        <li style="border:none;padding:10px 5px;"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></li>
        <li style="border:none;padding:10px 5px;"><img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210"></li>
    </ul>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0; border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">超值低价</div>
    <div class="container-fluid">
    <div class="row" style="padding: 5px;">
        <div class="col-xs-6 col-sm-4 col-md-3" style="padding:5px;">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3" style="padding:5px;">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3" style="padding:5px;">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3" style="padding:5px;">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3" style="padding:5px;">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3" style="padding:5px;">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3" style="padding:5px;">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3" style="padding:5px;">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
        </div>
    </div>
    </div>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0;border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">热门专题</div>
    <ul class="list-group" style="padding:5px 0;">
        <li class="list-group-item" style="border:none;padding:5px 10px;"><img style="width: 100%" src="http://image3.hc51img.com/2016/05/30/14645769291006.jpg"></li>
        <li class="list-group-item" style="border:none;padding:5px 10px;"><img style="width: 100%" src="http://image3.hc51img.com/2016/05/30/14645769291006.jpg"></li>
    </ul>
</div>

<script>
$(function() {
	swiper = new Swiper('#swiper', {
		lazyLoading : true,
		lazyLoadingInPrevNext : true,
		pagination: '.swiper-pagination',
        //paginationType: 'fraction'
		//loop: true
	});
});
</script>