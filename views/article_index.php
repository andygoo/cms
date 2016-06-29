
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/css/article/index.css')?>

<div class="intro-header" style="background: url(http://7xkkhh.com1.z0.glb.clouddn.com/2016/06/28/14671172206735.jpg)">
<div class="overlay">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="intro-message">
            <h1>Unsplash It</h1>
            <h3>Beautiful placeholders using images from <a href="https://unsplash.com">unsplash</a></h3>
        </div>
    </div>
</div>
</div>
</div>
</div>

<div class="content-section">
<div class="container">
<div class="row">
    <div class="col-lg-4 col-sm-4">
        <h2 class="images">0</h2>
        <h3>Images</h3>
    </div>
    <div class="col-lg-4 col-sm-4">
        <h2 class="imageCounter">0</h2>
        <h3>Images Served</h3>
    </div>
    <div class="col-lg-4 col-sm-4">
        <h2 class="bandwidthCounter">0 GB</h2>
        <h3>Bandwidth Used</h3>
    </div>
</div>
</div>
</div>

<?php foreach (range(1, 5) as $idx):?>
<?php if ($idx % 2):?>
<div class="content-section-right">
<div class="container">
<div class="row">
    <div class="col-lg-5 col-sm-6">
        <div class="clearfix"></div>
        <h2 class="section-heading">Random image</h2>
        <p class="lead">Get a random image by appending <code>?random</code> to the end of the url.</p>
        <p class="lead">Get a random image by appending <code>?random</code> to the end of the url.</p>
    </div>
    <div class="col-lg-5 col-lg-offset-2 col-sm-6">
        <img class="img-responsive" src="https://unsplash.it/458/354" alt="">
    </div>
</div>
</div>
</div>
<?php else:?>
<div class="content-section-left">
<div class="container">
<div class="row">
    <div class="col-lg-5 col-lg-offset-1 col-sm-push-6 col-sm-6">
        <div class="clearfix"></div>
        <h2 class="section-heading">Random image</h2>
        <p class="lead">Get a random image by appending <code>?random</code> to the end of the url.</p>
        <p class="lead">Get a random image by appending <code>?random</code> to the end of the url.</p>
    </div>
    <div class="col-lg-5 col-sm-pull-6 col-sm-6">
        <img class="img-responsive random-image" src="https://unsplash.it/458/354?random" alt="">
    </div>
</div>
</div>
</div>
<?php endif;?>
<?php endforeach;?>

<footer style="background: url(http://7xkkhh.com1.z0.glb.clouddn.com/2016/06/28/14671191571578.jpg)">
<div class="footer-overlay">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <p>Created by <a href="http://dmarby.se">David Marby</a> & <a href="https://github.com/Nijikokun">Nijiko Yonskai</a></p>
        <p><a href="https://github.com/DMarby/unsplash-it">Source</a></p>
    </div>
</div>
</div>
</div>
</footer>
