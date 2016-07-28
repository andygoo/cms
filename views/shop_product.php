
<?= HTML::style('media/css/card.css')?>
<?= HTML::style('media/css/weui.min.css')?>
<style>
.card-title {font-size: 16px;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
.card-title a{color: #222}
.card-title a:hover{color: #d00}
.card-text {font-size: 14px;#666}
</style>

<div class="container">
<div class="row">
    <div class="col-md-6" style="margin-top: 40px">
        <img class="card-img-top" src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/300" width="100%">
    </div>
    <div class="col-md-6">
        <div class="page-header"><h3><?= $vehicle_info['vehicle_name'];?></h3></div>
        <div class="panel panel-default" style="border: none">
            <div class="panel-body">
                <h2 style="color: #d00">27.38 <small>万</small></h2>
            </div>
            <ul class="list-group">
                <li class="list-group-item">2012.10上牌 | 行驶2.4万公里 | 手自一体</li>
                <li class="list-group-item">新车含税价：14.06万</li>
                <li class="list-group-item">服务费：2000</li>
                <li class="list-group-item">贷款：首付0.00万，月供5,768元起</li>
                <li class="list-group-item">购车咨询：400-606-7905</li>
                <li class="list-group-item">
                    <div class="col-xs-6">
                        <a class="btn btn-warning btn-block" id="add_cart_btn" data-productid="<?= $vehicle_info['id'];?>">预约看车</a> 
                    </div>
                    <div class="col-xs-6">
                        <a class="btn btn-danger btn-block" id="add_cart_btn2" data-productid="<?= $vehicle_info['id'];?>">我要砍价</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>

<div class="container">
<div class="page-header"><h3>猜你喜欢</h3></div>
    <div class="row" style="margin: -5px;margin-bottom: 10px;">
        <?php foreach (range(1, 4) as $item):?>
        <div class="col-md-3" style="padding: 5px;">
            <div class="card" style="background: #f8f8f8;border:none;">
                <a href="/detail/6573">
                    <img class="card-img-top" width="100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
                </a>
                <div class="card-block">
                    <h4 class="card-title"><a href="/detail/6573">帕萨特 2011款 1.8TSI DSG至尊版</a></h4>
                    <p class="card-text text-muted">2011.06 上牌 · 8.3万公里 · 手动</p>
                    <p class="card-text" style="color: #d00; font-size: 28px;">20.00                    <span style="color: #d00; font-size: 14px;">万</span></p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<div class="clearfix"></div>

<div id="toast" style="display: none;">
    <div class="weui_mask_transparent"></div>
    <div class="weui_toast">
        <i class="weui_icon_toast"></i>
        <p class="weui_toast_content">已添加</p>
    </div>
</div>

<script>
$(function() {
	$('#add_cart_btn').click(function () {
	    var url = "<?php echo URL::site('cart/add')?>";
	    var parmas = {};
	    parmas.id = $(this).data('productid');
		$.get(url, parmas, function (res) {
		    $('#mini-cart').html(res);
		    $('#cart-items').text($('#mini-cart-items').data('count'));
		    if (1) {
    		    $('#toast').show();
                setTimeout(function () {
                    $('#toast').hide();
                }, 2000);
		    } else {
			    location.href = '<?php echo URL::site('cart/checkout')?>';
		    }
		});
		return false;
	});
});
</script>
