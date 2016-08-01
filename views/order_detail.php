
<style>
body {background: #f7f7f7;}
</style>

<!-- Start Home -->
<style>
.pageheader{
    padding: 70px 0;
    background-image: url(/media/img/brick-wall-dark.png);	
    background-color: #f43438;
}
.pageheader .title{
    text-shadow: 6px 6px 0px rgba(0,0,0,0.2);
    color: #fff !important;
}
.pageheader p{
    margin-bottom: 0;
    color: #f5f5f5;
    font-size: 16px;
}
</style>
<div class="pageheader">
    <div class="container">
        <h2 class="title">Navbar Right Menu</h2>
        <p>Navigation menu on right</p>
    </div>
</div>
<!-- End Home -->

<div class="container" style="background: #fff;margin-top: 20px;margin-bottom: 20px; ">
    <div class="row">
        <?php if (!empty($order_info)):?>
        <div class="col-md-12">
            <h3 class="page-header">订单详情 
                <small>订单号 <span class="text-danger">183272366437437</span>，共有 
                    <span class="text-danger"><?php echo $order_info['order_items']?></span> 件商品， 总额 
                    <span class="text-danger"><?php echo $order_info['order_amount']?></span> 元
                </small> 
                <?php if ($order_info['pay_status'] == 0):?>
                <a class="btn btn-info ajax-modal" href="<?php echo URL::site('order/pay?id='.$order_info['id'])?>">立即支付</a>
                <?php else:?>
                <?php echo '<small>，'.$order_info['deliver_status_str']?></small>
                <?php endif;?>
            </h3>
            <div class="table-responsive">
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
                <?php foreach ($order_items as $item):?>
                <?php $opts = json_decode($item['goods_opts'], true)?>
                <tr>
                  <td>
                    <div class="media">
                      <div class="media-left"><a href="<?= $opts['url']?>"><img class="media-object" width="60" src="<?= $opts['pic']?>"></a></div>
                      <div class="media-body hidden-xs"><h5 class="media-heading"><?= $opts['title']?></h5></div>
                    </div>
                  </td>
                  <td>￥<?php echo $item['goods_price']?></td>
                  <td><?php echo $item['goods_qty']?></td>
                  <td>￥<?php echo $item['goods_total']?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            </div>
        </div>
        <?php else:?>
        <div class="col-md-12">
            <h3 class="page-header">此订单不存在 </h3>
            <div class="center-block" style="width: 200px;padding-top: 30px;padding-bottom: 50px;">
                <a href="<?= URL::site('product')?>" class="btn btn-info btn-lg btn-block">去选购</a>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
