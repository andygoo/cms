
<?php include __DIR__ . '/vehicle/header.php';?>
<?php include __DIR__ . '/vehicle/filter.php';?>

<style>
img {max-width: 100%}
</style>

<div class="container">
    <div class="row" style="">
        <?php foreach ($vehicle_list as $item): ?>
        <div class="col-md-3" style="margin-bottom: 20px;">
            <img src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
            <a href="<?php echo URL::site('detail/'.$item['id'])?>"><?= $item['vehicle_name'];?></a>
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
});
</script>