
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/font-awesome-4.3.0/css/font-awesome.min.css')?>

<?= HTML::style('media/bootsnav/css/animate.css')?>
<?= HTML::style('media/bootsnav/css/bootsnav.css')?>
<?= HTML::style('media/bootsnav/css/overwrite.css')?>
<?= HTML::style('media/bootsnav/skins/color.css')?>

<!-- Start Navigation -->
<nav class="navbar navbar-default bootsnav">
    <div class="container">      
        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
                <li class="dropdown">
                    <a href="<?php echo URL::site('shop/cart')?>" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <span class="badge">3</span>
                    </a>
                    <ul class="dropdown-menu cart-list animated" style="display: none; opacity: 1;">
                        <li>
                            <a href="#" class="photo"><img src="images/thumb/thumb01.jpg" class="cart-thumb" alt=""></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>2x - <span class="price">$99.99</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/thumb/thumb02.jpg" class="cart-thumb" alt=""></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$33.33</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/thumb/thumb03.jpg" class="cart-thumb" alt=""></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>2x - <span class="price">$99.99</span></p>
                        </li>
                        <li class="total">
                            <span class="pull-right"><strong>Total</strong>: $0.00</span>
                            <a href="#" class="btn btn-default btn-cart">Cart</a>
                        </li>
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
            <ul class="nav navbar-nav navbar-center">
                <li><a href="<?php echo URL::site('article')?>">Home</a></li>                    
                <li><a href="<?php echo URL::site('article/list')?>">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>   
</nav>
<!-- End Navigation -->
<div class="clearfix"></div>


