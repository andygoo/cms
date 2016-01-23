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
<?= HTML::style('media/css/animations.css')?>
<?= HTML::script('media/js/jquery.min.js')?>
</head>
<body>
<div id="pt-main" class="pt-perspective">
	<div class="pt-page pt-page-1">
    	<nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="javascript:void(0)"><i class="glyphicon glyphicon-home"></i>&nbsp;好车故事</a>
              <a class="navbar-brand pull-right ajax-click" href="<?= URL::site('history')?>"><i class="glyphicon glyphicon-time"></i></a>
            </div>
          </div>
        </nav>
        <div id="home_page">
            <div class="page-loading">
                <div class="page-loading-logo">
                    <div class="page-loading-anim"></div>
                </div>
                <div class="page-loading-text">加载中，请稍候...</div>
            </div>
        </div>
	</div>
	<div class="pt-page pt-page-2" style="background: #fff">
    	<nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="javascript:void(0)" onclick="history.back()"><i class="glyphicon glyphicon-menu-left"></i></a>
            </div>
          </div>
        </nav>
        <div id="other_page1"></div>
	</div>
	<div class="pt-page pt-page-3" style="background: #fff">
    	<nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="javascript:void(0)" onclick="history.back()"><i class="glyphicon glyphicon-menu-left"></i></a>
            </div>
          </div>
        </nav>
        <div id="other_page2"></div>
	</div>
</div>

<?= HTML::script('media/js/modernizr.custom.js')?>
<?= HTML::script('media/js/pagetransitions.js')?>
<?= HTML::script('media/js/app.js')?>
</body>
</html>