<!DOCTYPE html>
<html lang="zh-cn"<?php if ($uri == 'material/index'):?> manifest="/manifest.appcache"<?php endif;?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">
<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Material Design Lite">
<title>Material</title>
<?= HTML::style('media/MDicons/css/MDicon.min.css')?>
<?= HTML::style('media/mdl/material.cyan-red.min.css')?>
<style>
.mdl-layout-title {color: #fff}
header .mdicon{font-size: 24px;color: #fff}
.mdl-layout__content{background: #f7f7f7}
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
