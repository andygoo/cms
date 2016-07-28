
<?= HTML::style('media/css/weui.min.css')?>
<?= HTML::style('media/css/card.css')?>
<style>
.card-title {font-size: 16px;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
.card-title a{color: #222}
.card-title a:hover{color: #d00}
.card-text {font-size: 14px;#666}
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

<div class="container" style="margin-bottom: 20px; ">
    <h3 class="page-header">超值低价</h3>
    <div class="row" style="margin: -5px;">
        <?php foreach ($vehicle_list as $item):?>
        <div class="col-md-3 col-sm-4" style="padding: 5px;">
            <div class="card" style="background: #f8f8f8;border:none;">
                <a href="#<?php echo URL::site('detail/'.$item['id'])?>">
                    <img data-productid="<?php echo $item['id']?>" class="card-img-top" width="100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
                </a>
                <div class="card-block">
                    <h4 class="card-title"><a href="<?php echo URL::site('detail/'.$item['id'])?>"><?= $item['vehicle_name'];?></a></h4>
                    <p class="card-text text-muted">2011.06 上牌 · 8.3万公里 · 手动</p>
                    <p class="card-text" style="color: #d00; font-size: 28px;"><?= sprintf("%.2f", $item['seller_price']);?>
                    <span style="color: #d00; font-size: 14px;">万</span></p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

<div id="toast" style="display: none;">
    <div class="weui_mask_transparent"></div>
    <div class="weui_toast">
        <i class="weui_icon_toast"></i>
        <p class="weui_toast_content">已添加</p>
    </div>
</div>

<script>
$(function () {
	$('.card-img-top').click(function () {
	    var url = "<?php echo URL::site('cart/add')?>";
	    var parmas = {};
	    parmas.id = $(this).data('productid');
		$.get(url, parmas, function (res) {
		    $('#mini-cart').html(res);
		    $('#cart-items').text($('#mini-cart-items').data('count'));
		    $('#toast').show();
            setTimeout(function () {
                $('#toast').hide();
            }, 2000);
		});
		return false;
	});
});

</script>