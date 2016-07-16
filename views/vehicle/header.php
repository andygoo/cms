
<?= HTML::style('media/css/flexboxgrid.min.css')?>
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/font-awesome-4.3.0/css/font-awesome.min.css')?>

<?= HTML::style('media/bootsnav/css/animate.css')?>
<?= HTML::style('media/bootsnav/css/bootsnav.css')?>
<?= HTML::style('media/bootsnav/css/overwrite.css')?>
<?= HTML::style('media/bootsnav/skins/color.css')?>

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
        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
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
                <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>        
        <!-- End Atribute Navigation -->
        
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#brand"><img src="/media/bootsnav/images/brand/logo-black.png" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?php echo URL::site('vehicle')?>">Home</a></li>                    
                <li><a href="<?php echo URL::site('ershouche')?>">我要买车</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>   
</nav>
<!-- End Navigation -->
<div class="clearfix"></div>


