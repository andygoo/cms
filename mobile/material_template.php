<!DOCTYPE html>
<html lang="zh-cn"<?php if ($uri == 'material/index'):?> manifest="/xx.appcache"<?php endif;?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<meta name="theme-color" content="<?= $theme_color?>">
<link rel="shortcut icon" href="http://ns13.bdstatic.com/static/news/webapp/webappandroid/img/webapp-news-logo.png">
<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">
<!-- Add to homescreen for Safari on iOS -->
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Material Design Lite">
<link rel="apple-touch-icon-precomposed" href="/media/img/apple-touch-icon.png">
<title>Material</title>
<?= HTML::style('media/mdl/theme/material.'.$curr_theme.'.min.css')?>
<?= HTML::style('media/MDicons/css/MDicon.min.css')?>
<style>
.mdl-layout-title {color: #fff}
.mdl-layout__content{background: #f7f7f7;}
.mdl-layout__header .mdicon{color: #fff}
.mdl-layout__content .mdicon{color: <?= $theme_color?>;vertical-align: middle;}
.mdl-layout__drawer-button {line-height:48px;}
</style>
<?= HTML::script('media/mdl/material.min.js')?>
<?= HTML::script('media/js/jquery.min.js')?>
</head>
<body>
<body>
<?php include __DIR__ . '/material/header.php';?>

<?= $content?>

<?php include __DIR__ . '/material/footer.php';?>
</body>
</html>
