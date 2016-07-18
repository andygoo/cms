
<?php include __DIR__ . '/article/header.php';?>
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
        <div class="col-md-12">
            <h3 class="page-header">预定义样式</h3>
            <table class="table">
              <thead>
                <tr>
                  <th>名称</th>
                  <th>单价</th>
                  <th>数量</th>
                  <th>合计</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach (range(1, 5) as $item):?>
                <tr>
                  <td>Mark</td>
                  <td>Mark</td>
                  <td>1</td>
                  <td>@mdo</td>
                </tr>
                <?php endforeach;?>
                <tr>
                  <td colspan="2"></td>
                  <td>总计</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                  <td><a href="<?php echo URL::site('shop/checkout')?>" class="btn btn-info">CHECKOUT</a></td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>


<?php include __DIR__ . '/article/footer.php';?>