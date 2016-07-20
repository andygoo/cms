<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<?= HTML::script('media/js/jquery.min.js')?>
</head>
<body>
<?php include __DIR__ . '/common/header.php';?>
<?php include __DIR__ . '/shop/header.php';?>

<?= $content?>

<?php include __DIR__ . '/shop/footer.php';?>
<?php include __DIR__ . '/common/footer.php';?>
</body>
</html>
