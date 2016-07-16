
<?php include __DIR__ . '/vehicle/header.php';?>

<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::script('media/js/swiper-3.3.1.jquery.min.js');?>

<style>
.swiper-container {
    width: 100%;
    height: 100%;
}
.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

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
.swiper-pagination-bullet {background: #fff;opacity: .5;}
.swiper-pagination-bullet-active {background: #fff;opacity: 1;}
</style>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img width="100%" src="http://image3.hc51img.com/fev2/banners/pc17.png"></div>
        <div class="swiper-slide"><img width="100%" src="http://image3.hc51img.com/fev2/banners/pc20.png"></div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<div class="container" style="margin-bottom: 20px;">
<div class="page-header" style="text-align: center"><h1>超值低价<br><small>每日精选，车主急售，特价好车</small></h1></div>
<div class="row">
    <?php foreach (range(1, 6) as $item):?>
    <div class="col-md-4" style="margin-bottom: 20px;">
        <img src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/300" width="100%" class="swiper-lazy">
    </div>
    <?php endforeach;?>
</div>
</div>

<?php include __DIR__ . '/vehicle/footer.php';?>

<script>
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    effect: 'fade'
});
</script>