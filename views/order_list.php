
<?= HTML::style('media/css/pager.css')?>

<style>
body {background: #f7f7f7;}
</style>

<!-- Start Home -->
<style>
.pageheader{
    padding: 70px 0;
    background-image: url(http://bootsnav.danurstrap.com/images/bg/brick-wall-dark.png);
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
        <div class="col-md-12">
            <h3 class="page-header">我的订单</h3>
            <?php if (!empty($order_list)):?>
                <?php foreach ($order_list as $order):?>
                <div class="panel panel-info">
                    <div class="panel-heading">订单号：
                        <span class="text-danger"><?php echo $order['id']?></span>，共有 
                        <span class="text-danger"><?php echo $order['order_items']?></span> 件商品， 总额 
                        <span class="text-danger"><?php echo $order['order_amount']?></span> 元
                        <?php if ($order['pay_status'] == 0):?>
                        <a class="btn btn-info ajax-modal" href="<?php echo URL::site('order/pay?id='.$order['id'])?>">立即支付</a>
                        <?php else:?>
                        <?php echo '，'.$order['deliver_status_str']?>
                        <?php endif;?>
                        <span class="text-muted pull-right">订单时间：<?php echo date('Y-m-d H:i:s', $order['created_at'])?></span>
                    </div>
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
                        <?php foreach ($order['goods_list'] as $item):?>
                        <?php $opts = json_decode($item['goods_opts'], true)?>
                        <tr>
                          <td>
                            <div class="media">
                              <div class="media-left"><a href="<?= $opts['url']?>"><img class="media-object" width="80" src="<?= $opts['pic']?>"></a></div>
                              <div class="media-body"><h5 class="media-heading"><?= $opts['title']?></h5></div>
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
                <?php endforeach;?>
                <?php echo $pager?>
            <?php else:?>
                <div class="center-block" style="width: 200px;padding-top: 30px;padding-bottom: 50px;">
                    <h4>您还没有任何订单</h4>
                    <a href="<?= URL::site('product')?>" class="btn btn-info btn-lg btn-block">去选购</a>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
