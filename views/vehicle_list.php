
<?php include __DIR__ . '/vehicle/header.php';?>
<?php include __DIR__ . '/vehicle/filter.php';?>
<?= HTML::style('media/css/pager.css')?>
<?= HTML::style('media/css/card.css')?>

<style>
body {background: #f7f7f7;}
img {max-width: 100%}
.card-title {font-size: 16px;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
.card-title a{color: #222}
.card-title a:hover{color: #d00}
.card-text {font-size: 14px;#666}

.form-control:focus {
    border-color: #ccc;
    outline: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}
</style>

<div class="container">
    <div class="row" style="margin: -5px;margin-bottom: 10px;">
        <?php foreach ($vehicle_list as $item): ?>
        <div class="col-md-3" style="padding: 5px;">
            <div class="card" style="background: #fff;border:none;">
                <a href="<?php echo URL::site('detail/'.$item['id'])?>">
                    <img class="card-img-top" width="100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
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
    <?php echo $pager?>
</div>

<?php include __DIR__ . '/vehicle/footer.php';?>

<script>
$(function(){
    $('#c_price_btn').click(function () {
        var c_price_f = ~~$('#c_price_f').val();
        var c_price_t = ~~$('#c_price_t').val();
        c_price_f = Math.abs(c_price_f);
        c_price_t = Math.abs(c_price_t);
        if (c_price_t > 0 && c_price_t >= c_price_f) {
            var _href = $(this).data('href');
    
        	var p_part = 'p'+c_price_f+'-'+c_price_t;
        	var re = /p\d+(\.\d+)?-\d+(\.\d+)?/;
        	if (re.test(_href)) {
        		_href = _href.replace(re, p_part);
        	}
            $(this).attr('href', _href);
        }
    });
    var timer = null;
    $('#brand_more_btn, #brand_more_block').hover(function(){
        clearTimeout(timer);
    	$('#brand_more_block').slideDown('fast');
	},function(){
		timer = setTimeout(function() {
	    	$('#brand_more_block').slideUp('fast');
		}, 400);
	});
});
</script>