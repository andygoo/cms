
<?php include __DIR__ . '/shop/header.php';?>
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
        <h3 class="page-header">我的订单 <small>共有<?php echo $cart['items']?>件商品</small></h3>
            <table class="table">
              <thead>
                <tr>
                  <th>名称</th>
                  <th class="col-xs-2">单价</th>
                  <th class="col-xs-2">数量</th>
                  <th class="col-xs-2">合计</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cart['contents'] as $item):?>
                <tr>
                  <td><?php echo $item['id']?></td>
                  <td><?php echo $item['price']?> 元</td>
                  <td><?php echo $item['qty']?></td>
                  <td><?php echo $item['subtotal']?> 元</td>
                </tr>
                <?php endforeach;?>
                <tr>
                  <td colspan="2"></td>
                  <td>总计</td>
                  <td><?php echo $cart['total']?> 元</td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                  <td><a href="<?php echo URL::site('shop/checkout')?>" class="btn btn-info">去支付</a></td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>


<?php include __DIR__ . '/shop/footer.php';?>