<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>海南</title>
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<style>
img {max-width:100%}
</style>
<style>
.swiper-container {
    width: 100%;
	height:100%;
}
.swiper-slide {
    text-align: center;
    background: #fff;
    width: 100%;
    
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
</style>
</head>
<body>
<?php $list = array();?>
<div class="container-fluid">
    <div class="row">
        <div class="swiper-container" id="swiper1">
            <div class="swiper-wrapper">
                <?php foreach($list[0] as $key=>$item): ?>
                <div class="swiper-slide"><img src="<?= $item['pic']?>?imageView2/1/w/480/h/240" width="100%"></div>
                <?php endforeach;?>
            </div>
            <div class="swiper-pagination swiper-pagination1" style="text-align: right;"></div>
        </div>
        <?= $article['content']?>
    </div>
</div>
</body>
</html>

