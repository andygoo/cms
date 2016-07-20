
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
        <?php if ($cart['items'] > 0):?>
        <div class="col-md-8">
            <h3 class="page-header">订单详情 <small>共有 <?php echo $cart['items']?> 件商品， 总额 <?php echo $cart['total']?></small></h3>
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
        <div class="col-md-4">
            <h3 class="page-header">订单状态 <small>未支付</small></h3>
            
        </div>
        <?php else:?>
        <div class="col-md-12">
            <h3 class="page-header">没有此订单</h3>
            <div class="center-block" style="width: 200px;padding-top: 30px;padding-bottom: 50px;">
                <a href="<?= URL::site('product')?>" class="btn btn-info btn-lg btn-block">去选购</a>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
