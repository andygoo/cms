
<?= HTML::style('media/css/article/list.css')?>
<?= HTML::style('media/css/pager.css')?>

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
            <?php foreach ($order_list as $order):?>
            <div class="panel panel-info">
                <div class="panel-heading">订单号：
                    <span class="text-danger"><?php echo $order['id']?></span>，共有 
                    <span class="text-danger"><?php echo $order['order_items']?></span> 件商品， 总额 
                    <span class="text-danger"><?php echo $order['order_amount']?></span> 元
                    <a class="btn btn-info">立即支付</a>
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
                    <?php foreach ($order['goods_list'] as $key=>$item):?>
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
                      <?php if (0&&$key==0):?>
                      <td rowspan="<?php echo $order['order_items']?>">
                          <p class="text-danger"><?php echo $order['status']?></p>
                          <a class="btn btn-info">立即支付</a>
                      </td>
                      <?php endif;?>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
            </div>
            <?php endforeach;?>
            <?php echo $pager?>
        </div>
    </div>
</div>
