
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/font-awesome-4.3.0/css/font-awesome.min.css')?>


<?php //HTML::style('media/bootsnav/css/animate.css')?>
<?php //HTML::style('media/bootsnav/css/bootsnav.css')?>
<?php //HTML::style('media/bootsnav/css/overwrite.css')?>
<?php //HTML::style('media/bootsnav/skins/color.css')?>

<?php //HTML::style('media/minicss/bootsnav.css')?>

<?= HTML::groupstyle('bootsnav')?>

<!-- Start Navigation -->
<nav class="navbar navbar-default bootsnav">
    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->
    <div class="container">      
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#brand"><img src="/media/bootsnav/images/brand/logo.jpg" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?php echo URL::site('vehicle')?>">首页</a></li>                    
                <li class="active"><a href="<?php echo URL::site('ershouche')?>">我要买车</a></li>
                <li><a href="#">出售爱车</a></li>
                <li><a href="#">服务保障</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right nav-search">
                <li>&nbsp;
                    <form class="form-inline" method="get" action="<?php echo URL::site($city_info['city_pinyin'] . '/ershouche')?>">
                        <div class="form-group">
                            <div class="input-group" style="line-height: 100%;color:#333">
                                <input type="text" id="search-input" name="kw" class="form-control" style="width:300px" value="<?= htmlspecialchars(Arr::get($_GET, 'kw'))?>" placeholder="请输入关键字" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-danger">搜索</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>   
</nav>
<!-- End Navigation -->
<div class="clearfix"></div>


