

<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('https://fonts.googleapis.com/icon?family=Material+Icons')?>
<?= HTML::style('media/materialize/css/materialize.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>
<?= HTML::style('media/css/vehicle/index.css')?>

<nav class="white" role="navigation">
<div class="nav-wrapper container-fluid">
  <a id="logo-container" href="#" class="brand-logo">好车无忧</a>
  <ul class="right">
    <li>
    <form class="form-inline" method="get" action="<?php echo URL::site('ershouche')?>">
        <div class="form-group">
            <div class="input-group" style="line-height: 100%;color:#333">
                <input type="text" id="search-input" name="kw" class="form-control" style="width:300px" value="<?= htmlspecialchars(Arr::get($_GET, 'kw'))?>" placeholder="请输入关键字" required>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-info">搜索</button>
                </span>
            </div>
        </div>
    </form>
    </li>
    <li><a href="<?php echo URL::site('ershouche')?>">我要买车</a></li>
    <li><a href="#">我要买车</a></li>
  </ul>
</div>
</nav>