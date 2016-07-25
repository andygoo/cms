
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

#grid1 .weui_grid {padding: 14px;}
.weui_grid_label {font-size:12px;color:#444}
.weui_grids:after {border-left:none;}
</style>
<style>
.title {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
	text-overflow: ellipsis;
    overflow: hidden;
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

<div class="container" style="background: #fff; padding: 18px 20px;">
    <div class="row">
        <div class="col-xs">
            <a class="btn btn-danger btn-block" href="<?php echo URL::site('ershouche')?>" style="padding: 9px 12px">我要买车</a>
        </div>
        <div class="col-xs">
            <a class="btn btn-warning btn-block" style="padding: 9px 12px">我要卖车</a>
        </div>
    </div>
</div>

<div id="grid1" class="weui_grids" style="background: #fff;">
    <a class="weui_grid"><span class="weui_grid_label">3万以下</span></a>
    <a class="weui_grid"><span class="weui_grid_label">3-5万</span></a>
    <a class="weui_grid"><span class="weui_grid_label">5-7万</span></a>
    <a class="weui_grid"><span class="weui_grid_label">7-9万</span></a>
    <a class="weui_grid"><span class="weui_grid_label">9-12万</span></a>
    <a class="weui_grid"><span class="weui_grid_label">12-15万</span></a>
    <a class="weui_grid"><span class="weui_grid_label">15-20万</span></a>
    <a class="weui_grid"><span class="weui_grid_label">20-30万</span></a>
    <a class="weui_grid"><span class="weui_grid_label">30万以上</span></a>
</div>

<div class="weui_grids" style="background: #fff;text-align: center;margin-top:10px">
    <a href="#/button" class="weui_grid">
        <img class="weui_grid_icon" src="https://weui.io/images/icon_nav_msg.png">
        <span class="weui_grid_label">爱心帮买</span>
    </a>
    <a href="#/button" class="weui_grid">
        <img class="weui_grid_icon" src="https://weui.io/images/icon_nav_msg.png">
        <span class="weui_grid_label">帮检测</span>
    </a>
    <a href="#/button" class="weui_grid">
        <img class="weui_grid_icon" src="https://weui.io/images/icon_nav_msg.png">
        <span class="weui_grid_label">分期购车</span>
    </a>
    <a href="#/button" class="weui_grid">
        <img class="weui_grid_icon" src="https://weui.io/images/icon_nav_msg.png">
        <span class="weui_grid_label">服务保障</span>
    </a>
    <a href="#/button" class="weui_grid">
        <img class="weui_grid_icon" src="https://weui.io/images/icon_nav_msg.png">
        <span class="weui_grid_label">好车故事</span>
    </a>
    <a href="#/button" class="weui_grid">
        <img class="weui_grid_icon" src="https://weui.io/images/icon_nav_msg.png">
        <span class="weui_grid_label">论坛</span>
    </a>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0; border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">超值低价</div>
    <div class="row" style="padding:10px">
        <?php foreach (range(0, 2) as $item):?>
        <a class="col-xs">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
            <div style="padding: 5px; color: #212121;">
                <div class="title">瑞纳 2014款 1.4L 自动时尚型GS</div>
                <span style="color: #ff2626">7.00</span> 万
            </div>
        </a>
        <?php endforeach;?>
    </div>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0; border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">超值低价</div>
    <div class="row" style="padding:10px">
        <?php foreach (range(0, 1) as $item):?>
        <a class="col-xs">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
            <div style="padding: 5px; color: #212121;">
                <div class="title">瑞纳 2014款 1.4L 自动时尚型GS</div>
                <span style="color: #ff2626">7.00</span> 万
            </div>
        </a>
        <?php endforeach;?>
    </div>
</div>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0; border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">超值低价</div>
    <div class="row" style="padding: 0 10px 10px;">
        <?php foreach (range(0, 5) as $item):?>
        <a class="col-xs-6 col-sm-4" style="margin-top: 10px">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
            <div style="padding: 5px; color: #212121;">
                <div class="title">瑞纳 2014款 1.4L 自动时尚型GS</div>
                <span style="color: #ff2626">7.00</span> 万
            </div>
        </a>
        <?php endforeach;?>
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