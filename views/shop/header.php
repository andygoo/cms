
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/font-awesome-4.3.0/css/font-awesome.min.css')?>

<?= HTML::style('media/bootsnav/css/animate.css')?>
<?= HTML::style('media/bootsnav/css/bootsnav.css')?>
<?= HTML::style('media/bootsnav/css/overwrite.css')?>
<?= HTML::style('media/bootsnav/skins/color.css')?>

<!-- Start Navigation -->
<nav class="navbar navbar-default navbar-mobile bootsnav">
    <div class="container">
        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
                <li class="dropdown">
                    <a href="<?php echo URL::site('cart')?>" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <span class="badge" id="cart-items"><?php echo $cart['items']?></span>
                    </a>
                    <ul class="dropdown-menu cart-list animated" id="mini-cart" style="display: none; opacity: 1;">
                        <?php include __DIR__ . '/mini-cart.php';?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Atribute Navigation -->
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#brand"><img src="/media/bootsnav/images/brand/logo.jpg" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo URL::site('product')?>">Home</a></li>
                <li><a href="<?php echo URL::site('product')?>">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <?php if (empty($user)):?>
                <li><a class="ajax-modal-sm" href="<?php echo URL::site('user/login')?>">登录</a></li>
                <?php else:?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">欢迎 <?php echo $user['username']?></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo URL::site('order/list')?>">我的订单</a></li>
                        <li><a href="<?php echo URL::site('member/logout')?>">退出</a></li>
                    </ul>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>   
</nav>
<!-- End Navigation -->
<div class="clearfix"></div>

