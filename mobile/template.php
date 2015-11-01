<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>好车故事</title>
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/font-awesome-4.3.0/css/font-awesome.min.css')?>
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<?= HTML::script('media/js/jquery.min.js')?>
<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
</head>
<body>

<div class="container-fluid">
    <div class="row">
    <?php echo $content?>
    </div>
</div>

<?php include Kohana::find_file('mobile', 'footer');?>

<script>
var _maq = _maq || [];
_maq.push(['_setAccount', '222222']);
(function() {
    var ma = document.createElement('script'); ma.type = 'text/javascript'; ma.async = true;
    ma.src = document.location.protocol + '//analytics.jiesc.net/ma.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ma, s);
})();
</script>

</body>
</html>
