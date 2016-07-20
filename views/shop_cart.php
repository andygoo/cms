
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
        <h3 class="page-header">我的购物车 <small>共有 <?= $cart['items']?> 件商品</small></h3>
            <?php if ($cart['items'] > 0):?>
            <table class="table">
              <thead>
                <tr>
                  <th>选购的商品</th>
                  <th class="col-xs-2">单价</th>
                  <th class="col-xs-2">数量</th>
                  <th class="col-xs-2">金额小计</th>
                  <th class="col-xs-2">操作</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cart['contents'] as $key => $item):?>
                <tr data-rowid="<?= $key?>">
                  <td>
                    <div class="media">
                      <div class="media-left"><a href="<?= $item['options']['url']?>"><img class="media-object" width="80" src="<?= $item['options']['pic']?>"></a></div>
                      <div class="media-body"><h5 class="media-heading"><?= $item['options']['title']?></h5></div>
                    </div>
                  </td>
                  <td>￥<?= $item['price']?></td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-default cart-decr"> - </button>
                      <input class="form-control cart-qty" type="text" maxlength="3" data-qty="<?= $item['qty']?>" style="width:49px; border-radius: 0; border-left: none; border-right: none; float: left" value="<?= $item['qty']?>">
                      <button class="btn btn-default cart-incr"> + </button>
                    </div>
                  </td>
                  <td>￥<span class="subtotal" data-price="<?= $item['price']?>"><?= $item['subtotal']?></span></td>
                  <td><button type="button" class="close cart-del" aria-hidden="true" style="float: none">&times;</button></td>
                </tr>
                <?php endforeach;?>
                <tr>
                  <td colspan="2"></td>
                  <td>应付金额（不含运费）</td>
                  <td id="cart-total">￥<?= $cart['total']?></td>
                  <td><a href="<?= URL::site('cart/clear')?>" data-toggle="tooltip" data-placement="top" title="清空购物车"><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                  <td>
                      <a href="<?= URL::site('cart/checkout')?>" class="btn btn-danger btn-lg">去结算</a>
                  </td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            <?php else:?>
            <div class="center-block" style="width: 200px;padding-top: 30px;padding-bottom: 50px;">
                <a href="<?= URL::site('product')?>" class="btn btn-info btn-lg btn-block">去选购</a>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>

<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip();
	
	var max_cart_qty = 999;
	function upcart(rowid, qty) {
	    var url = '<?= URL::site('cart/update')?>';
	    var parmas = [];
	    parmas.push('id=' + rowid);
	    parmas.push('qty=' + qty);
	    url += '?' + parmas.join('&');
	    $.get(url, function(res) {
		    $('#mini-cart').html(res);
		    $('#cart-items').text($('#mini-cart-items').data('count'));
		    $('#cart-total').text($('#mini-cart-total').text());
		});
	}
	$('.cart-decr').click(function () {
		var t = $(this);
		var qtyinput = t.parent('.btn-group').find('.cart-qty');
	    var qty = qtyinput.val();
	    if (qty <= 1) {
		    return false;
	    }
	    qtyinput.val(--qty);
		var row = t.parents('tr');
		var rowid = row.data('rowid');
		
		var subtotal = row.find('.subtotal');
		subtotal.text(parseFloat((subtotal.data('price')*qty).toFixed(2)));
		
	    upcart(rowid, qty);
	});
	$('.cart-incr').click(function () {
		var t = $(this);
		var qtyinput = t.parent('.btn-group').find('.cart-qty');
	    var qty = qtyinput.val();
	    if (qty >= max_cart_qty) {
		    return false;
	    }
	    qtyinput.val(++qty);
		var row = t.parents('tr');
		var rowid = row.data('rowid');
		
		var subtotal = row.find('.subtotal');
		subtotal.text(parseFloat((subtotal.data('price')*qty).toFixed(2)));
		
	    upcart(rowid, qty);
	});
	$('.cart-qty').blur(function() {
		var t = $(this);
		var qty = t.val();
		if (qty == t.data('qty') || qty < 1 || qty > max_cart_qty) {
		    return false;
	    }
		t.data('qty', qty);
		var row = t.parents('tr');
		var rowid = row.data('rowid');

		var subtotal = row.find('.subtotal');
		subtotal.text(parseFloat((subtotal.data('price')*qty).toFixed(2)));
		
		upcart(rowid, qty);
	});
	$('.cart-del').click(function () {
		var t = $(this);
		var row = t.parents('tr');
		var rowid = row.data('rowid');
		upcart(rowid, 0);
		row.remove();
		return false;
	});
});

</script>