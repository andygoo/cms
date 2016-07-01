
<?= HTML::style('https://fonts.googleapis.com/icon?family=Material+Icons')?>
<?= HTML::style('media/materialize/css/materialize.css')?>
<?= HTML::style('media/css/vehicle/index.css')?>
<?= HTML::script('media/materialize/js/materialize.min.js')?>

<nav class="white" role="navigation">
<div class="nav-wrapper container">
  <a id="logo-container" href="#" class="brand-logo">好车无忧</a>
  <ul class="right hide-on-med-and-down">
    <li><a href="#">我要买车</a></li>
    <li><a href="#">我要买车</a></li>
  </ul>

  <ul id="nav-mobile" class="side-nav">
    <li><a href="#">Navbar Link</a></li>
  </ul>
  <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
</div>
</nav>

<div id="index-banner" class="parallax-container">
<div class="section no-pad-bot">
  <div class="container">
    <br><br>
    <h1 class="header center teal-text text-lighten-2">Parallax Template</h1>
    <div class="row center">
      <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
    </div>
    <div class="row center">
      <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
    </div>
    <br><br>

  </div>
</div>
<div class="parallax"><img src="http://7xkkhh.com1.z0.glb.clouddn.com/2016/07/01/14673617523734.jpg" alt="Unsplashed background img 1"></div>
</div>


<div class="container">
<div class="section">
  <div class="row">
    <?php foreach (range(1, 8) as $item):?>
    <div class="col s12 m3">
      <div class="card">
        <div class="card-image">
          <img class="activator" src="http://image1.hc51img.com/1317f1ea4564-c307-4aa1-aa91-09053e00df21.jpg?imageView2/2/w/320/h/240/format/webp">
        </div>
        <div class="card-content">
          <p><a>骐达 2011款 1.6L CVT舒适型</a></p>
          <small>2012.12上牌 · 6.6万公里 · 自动</small>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
</div>

<footer class="page-footer teal">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Links</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2014 Copyright Text
    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
</footer>

<script>
$(function(){
    $('.button-collapse').sideNav();
    $('.parallax').parallax();
});
</script>