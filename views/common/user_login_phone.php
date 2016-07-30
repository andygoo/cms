
<div class="container">

<h3 class="page-header">登录</h3>

<form action="<?php echo URL::site('user/phonelogin')?>" method="post" class="col-sm-6 col-md-4 ajax-submit">
	<div class="form-group">
		<input type="text" class="form-control" name="phone" placeholder="手机号" required>
	</div>
	<div class="form-group">
	    <div class="input-group">
    		<input type="text" class="form-control" name="vcode" placeholder="验证码" required>
    		<span class="input-group-btn">
                <button class="btn btn-info" id="send_vcode_btn">获取验证码</button>
            </span>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-info btn-block">登录</button>
	</div>
</form>

</div>


<script>
$(function() {
    var timer = null;
    $('#send_vcode_btn').click(function() {
        var t = $(this);
        t.attr('disabled', true);
        var url = '<?php echo URL::site('user/phoneverify')?>';
        var params = {};
        params.phone = $('input[name=phone]').val();
        $.get(url, params, function(res) {
            if (res.errno != '0') {
                t.attr('disabled', false);
				$.notify(res.errmsg, {
    				type: 'danger', 
    				z_index: 1051,
    				placement: {
    				    from: "top",
    				    align: "center"
					}
				});
            } else {
            	var countdown = res.data || 60;
                t.text(countdown+"秒后重发");
                clearTimeout(timer);
                timer = setInterval(function() {
                    if (countdown == 1) {
                        clearTimeout(timer);
                        t.attr('disabled', false);
                        t.text("获取验证码");
                        countdown = 60;
                    } else {
                        countdown--;
                        t.text(countdown+"秒后重发");
                    }
                },1000);
            }
        });
    });
});
</script>