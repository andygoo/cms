
<?= HTML::style('media/css/article/list.css')?>

<style>
body {background: #f7f7f7;}
</style>

<!-- Start Home -->
<div class="pageheader">
    <div class="container">
        <h2 class="title">Navbar Right Menu</h2>
        <p>Navigation menu on right</p>
    </div>
</div>
<!-- End Home -->

<div class="container" style="background: #fff;margin-top: 20px;margin-bottom: 20px; ">
    <div class="row">
        <div class="col-md-8">
            <h3 class="page-header">个人中心</h3>
            
        </div>

        <div class="col-md-4">
            <h3 class="page-header">管理菜单</h3>
            <ul class="list-group">
              <li class="list-group-item"><a href="<?php echo URL::site('member/logout')?>">我的订单</a></li>
              <li class="list-group-item"><a href="<?php echo URL::site('member/logout')?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>
