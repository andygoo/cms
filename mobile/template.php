<!DOCTYPE html>
<html lang="zh-cn" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="shortcut icon" href="/media/img/webapp-news-logo.png">
<title><?= $title?></title>
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::style('media/css/component.css')?>
<?= HTML::script('media/js/jquery.min.js')?>
<?= HTML::script('media/js/iscroll.js')?>
<?= HTML::script('media/swiper/js/swiper.min.js')?>
</head>
<body>
<?php echo $content?>
</body>
</html>