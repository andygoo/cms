
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/font-awesome-4.3.0/css/font-awesome.min.css')?>

<?= HTML::style('media/bootsnav/css/bootsnav.css')?>
<?= HTML::style('media/bootsnav/css/overwrite.css')?>
<?= HTML::style('media/bootsnav/skins/color.css')?>

<!-- Start Navigation -->
<nav class="navbar navbar-default bootsnav">
    <div class="container">
        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
                <?php if (empty($user)):?>
                <li><a class="ajax-modal-sm" href="<?php echo URL::site('user/login')?>"><i class="glyphicon glyphicon-user"></i></a></li>
                <?php else:?>
                <li><a href="<?php echo URL::site('member')?>"><i class="glyphicon glyphicon-user"></i> <?php echo $user['username']?></a></li>
                <?php endif;?>
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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo URL::site('product')?>">Home</a></li>     
                <li><a href="<?php echo URL::site('product')?>">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>   
</nav>
<!-- End Navigation -->
<div class="clearfix"></div>


<div class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

