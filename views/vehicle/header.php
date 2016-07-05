


<?= HTML::style('https://fonts.googleapis.com/icon?family=Material+Icons')?>
<?= HTML::style('media/materialize/css/materialize.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>
<?= HTML::style('media/css/vehicle/index.css')?>

<nav class="white" role="navigation">
<div class="nav-wrapper container-fluid">
  <a id="logo-container" href="#" class="brand-logo">好车无忧</a>
  <ul class="right hide-on-med-and-down">
    <li><a href="<?php echo URL::site('ershouche')?>">我要买车</a></li>
    <li><a href="#">我要买车</a></li>
  </ul>

  <ul id="nav-mobile" class="side-nav">
    <li><a href="<?php echo URL::site('ershouche')?>">我要买车</a></li>
  </ul>
  <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
</div>
</nav>