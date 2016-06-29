
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
    <div class="col-lg-4">
        <h2 class="images">0</h2>
        <h3>Images</h3>
    </div>
    <div class="col-lg-4">
        <h2 class="imageCounter">0</h2>
        <h3>Images Served</h3>
    </div>
    <div class="col-lg-4">
        <h2 class="bandwidthCounter">0 GB</h2>
        <h3>Bandwidth Used</h3>
    </div>
</div>
</div>
</div>

<div class="content-section-right">
<div class="container">
<div class="row">
    <div class="col-lg-5 col-sm-6">
        <div class="clearfix"></div>
        <h2 class="section-heading">Basic Usage</h2>
        <p class="lead">Just put your image size (width &amp; height) after our URL and you'll get a placeholder.</p>
        <pre><code>https://unsplash.it/200/300</code></pre>
        <p class="lead">To get a square image, just put the size you want.</p>
        <pre><code>https://unsplash.it/200</code></pre>
    </div>
    <div class="col-lg-5 col-lg-offset-2 col-sm-6">
        <img class="img-responsive" src="https://unsplash.it/458/354" alt="">
    </div>
</div>
</div>
</div>

<div class="content-section-left">
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-lg-offset-1 col-sm-push-6 col-sm-6">
            <div class="clearfix"></div>
            <h2 class="section-heading">Random image</h2>
            <p class="lead">Get a random image by appending <code>?random</code> to the end of the url.</p>
            <pre><code>https://unsplash.it/200/300/?random</code></pre>
        </div>
        <div class="col-lg-5 col-sm-pull-6 col-sm-6">
            <img class="img-responsive random-image" src="https://unsplash.it/458/354?random" alt="">
        </div>
    </div>
</div>
</div>

<div class="content-section-right">
<div class="container">
<div class="row">
    <div class="col-lg-5 col-sm-6">
        <div class="clearfix"></div>
        <h2 class="section-heading">Specific Image</h2>
        <p class="lead">Get a specific image by appending <code>?image</code> to the end of the url.</p>
        <pre><code>https://unsplash.it/200/300?image=0</code></pre>
        <p>You can find a list of all images <a href="https://unsplash.it/images">here.</a></p>
    </div>
    <div class="col-lg-5 col-lg-offset-2 col-sm-6">
        <img class="img-responsive" src="https://unsplash.it/458/354?image=0" alt="">
    </div>
</div>
</div>
</div>

<div class="content-section-left">
<div class="container">
<div class="row">
    <div class="col-lg-5 col-lg-offset-1 col-sm-push-6 col-sm-6">
        <div class="clearfix"></div>
        <h2 class="section-heading">Blurred image</h2>
        <p class="lead">Get a blurred image by appending <code>?blur</code> to the end of the url.</p>
        <pre><code>https://unsplash.it/200/300/?blur</code></pre>
    </div>
    <div class="col-lg-5 col-sm-pull-6 col-sm-6">
        <img class="img-responsive" src="https://unsplash.it/458/354?image=0&blur" alt="">
    </div>
</div>
</div>
</div>

<div class="content-section-right">
<div class="container">
<div class="row">
    <div class="col-lg-5 col-sm-6">
        <div class="clearfix"></div>
        <h2 class="section-heading">Crop Gravity</h2>
        <p class="lead">Select the cropping gravity by adding <code>?gravity</code> to the end of the url.</p>
        <p>Valid options are: <code>north, east, south, west, center</code></p>
        <pre><code>https://unsplash.it/200/300/?gravity=east</code></pre>
    </div>
    <div class="col-lg-5 col-lg-offset-2 col-sm-6">
        <img class="img-responsive" src="https://unsplash.it/458/354?gravity=east" alt="">
    </div>
</div>
</div>
</div>

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
