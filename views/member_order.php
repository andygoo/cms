
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
            <h3 class="page-header">我的订单</h3>
            <?php foreach (range(1, 3) as $a):?>
            <div class="panel panel-default">
                <div class="panel-heading">订单号：183272366437437，共有 <?php echo $cart['items']?> 件商品， 总额 <?php echo $cart['total']?></div>
                <table class="table">
                  <thead>
                    <tr>
                      <th>选购的商品</th>
                      <th class="col-xs-2">单价</th>
                      <th class="col-xs-2">数量</th>
                      <th class="col-xs-2">金额小计</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($cart['contents'] as $item):?>
                    <tr>
                      <td>
                        <div class="media">
                          <div class="media-left"><a href="<?= $item['options']['url']?>"><img class="media-object" width="80" src="<?= $item['options']['pic']?>"></a></div>
                          <div class="media-body"><h5 class="media-heading"><?= $item['options']['title']?></h5></div>
                        </div>
                      </td>
                      <td>￥<?php echo $item['price']?></td>
                      <td><?php echo $item['qty']?></td>
                      <td>￥<?php echo $item['subtotal']?></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
