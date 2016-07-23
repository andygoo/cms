
<div class="container">
<h3 class="page-header">注册</h3>

<form action="<?php echo URL::site('user/register')?>" method="post" class="col-sm-6 col-md-4">
	<div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="用户名" required>
	</div>
	<div class="form-group">
		<input type="password" class="form-control" name="password" placeholder="密码" required>
	</div>
	<div class="form-group">
		<input type="password" class="form-control" name="password2" placeholder="确认密码" required>
	</div>
	<div class="form-group">
	    <div class="input-group">
    		<input type="password" class="form-control" name="vcode" placeholder="验证码" required>
    		<div class="input-group-addon" style="padding: 0 0 0 10px;border: none;background: #fff;cursor:pointer">
    		    <img id="captcha" src="<?php echo URL::site('captcha')?>" onclick="this.src='<?php echo URL::site('captcha')?>'">
    		</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-info btn-block">提交</button>
	</div>
	<div class="form-group">
		<a href="<?php echo URL::site('user/login')?>" class="ajax-modal-sm">已有账号？现在登录</a>
	</div>
</form>
</div>
