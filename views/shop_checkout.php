

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
        <?php if ($cart['items'] > 0):?>
        <div class="col-md-8">
            <h3 class="page-header">商品清单 <small>共有 <?php echo $cart['items']?> 件商品， 需支付总额 <?php echo $cart['total']?></small></h3>
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
                <?php foreach ($cart['contents'] as $item):?>
                <tr>
                  <td>
                    <div class="media">
                      <div class="media-left"><a href="<?= $item['options']['url']?>"><img class="media-object" width="60" src="<?= $item['options']['pic']?>"></a></div>
                      <div class="media-body"><h5 class="media-heading"><?= $item['options']['title']?></h5></div>
                    </div>
                  </td>
                  <td>￥<?php echo $item['price']?></td>
                  <td><?php echo $item['qty']?></td>
                  <td>￥<?php echo $item['subtotal']?></td>
                </tr>
                <?php endforeach;?>
                <tr>
                  <td colspan="2"></td>
                  <td>需支付总额</td>
                  <td>￥<?php echo $cart['total']?></td>
                </tr>
              </tbody>
            </table>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="page-header">收货信息</h3>
            <form id="delivery_form" method="post" action="<?php echo URL::site('order/submit')?>">
              <div class="form-group">
                <label class="control-label">收货人</label>
                <input type="text" class="form-control" name="consignee" required>
              </div>
              <div class="form-group">
                <label class="control-label">联系电话</label>
                <input type="text" class="form-control" name="phone" required>
              </div>
              <div class="form-group">
                <label class="control-label">收货地址</label>
                <textarea class="form-control" rows="5" name="address" required></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-danger btn-lg">提交订单</button>
                <div class="pull-right">
                <?php if (empty($user)):?>
                <a class="ajax-modal-sm" href="<?php echo URL::site('user/login')?>">登录</a> | 
                <?php endif;?>
                <a href="<?php echo URL::site('cart')?>">返回购物车</a>
                </div>
              </div>
            </form>
        </div>
        <?php else:?>
        <div class="col-md-12">
            <h3 class="page-header">没有需要结算的商品</h3>
            <div class="center-block" style="width: 200px;padding-top: 30px;padding-bottom: 50px;">
                <a href="<?= URL::site('product')?>" class="btn btn-info btn-lg btn-block">去选购</a>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>

<script>
$(function() {
	<?php if (empty($user)):?>
	$('#delivery_form input, #delivery_form textarea, #delivery_form button').focus(function () {
		$(this).blur();
	    $('#delivery_form .ajax-modal-sm').click();
	    return false;
	});
	<?php endif;?>
});
</script>
