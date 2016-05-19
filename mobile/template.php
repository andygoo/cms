<!DOCTYPE html>
<html lang="zh-cn" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="shortcut icon" href="/media/img/webapp-news-logo.png">
<title><?= $title?></title>
<?= HTML::script('media/js/jquery.min.js')?>
</head>
<body>
<?php include __DIR__ . '/header.php';?>

<?= $content?>

<?php include __DIR__ . '/footer.php';?>
</body>
</html>