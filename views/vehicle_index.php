
<?php include __DIR__ . '/vehicle/header.php';?>
<?= HTML::style('media/css/card.css')?>

<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::script('media/js/swiper-3.3.1.jquery.min.js');?>

<style>
.card-title {font-size: 16px;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
.card-title a{color: #222}
.card-title a:hover{color: #d00}
.card-text {font-size: 14px;#666}

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
<div class="row" style="margin: -5px;">
    <?php foreach (range(1, 8) as $item):?>
    <div class="col-md-3 col-sm-4" style="padding: 5px;">
        <div class="card" style="background: #f8f8f8;border:none;">
            <a href="/detail/6573">
                <img class="card-img-top" width="100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
            </a>
            <div class="card-block">
                <h4 class="card-title"><a href="/detail/6573">帕萨特 2011款 1.8TSI DSG至尊版</a></h4>
                <p class="card-text text-muted">2011.06 上牌 · 8.3万公里 · 手动</p>
                <p class="card-text" style="color: #d00; font-size: 28px;">20.00                    <span style="color: #d00; font-size: 14px;">万</span></p>
            </div>
        </div>
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