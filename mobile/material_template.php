<!DOCTYPE html>
<html lang="zh-cn" manifest="/test.appcache">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<title></title>
<?= HTML::style('media/MDicons/css/MDicon.min.css')?>
<?= HTML::style('media/mdl/material.cyan-red.min.css')?>
<style>
.mdl-layout-title {color: #fff}
header .mdicon{font-size: 24px;color: #fff}
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
