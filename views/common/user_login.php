
<div class="container">

<h3 class="page-header">登录</h3>

<form action="<?php echo URL::site('user/login')?>" method="post" class="col-sm-6 col-md-4 ajax-submit">
	<div class="form-group">
		<input type="text" class="form-control" name="username" placeholder="用户名" required>
	</div>
	<div class="form-group">
		<input type="password" class="form-control" name="password" placeholder="密码" required>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-info btn-block">登录</button>
	</div>
	<?php $ua = strtolower($_SERVER['HTTP_USER_AGENT']); ?>
	<?php if (strpos($ua, 'micromessenger') !== false):?>
	<div class="form-group">
		<a href="<?php echo URL::site('user/wxlogin');?>" class="btn btn-success btn-block">微信登录</a>
	</div>
	<?php endif;?>
	<div class="form-group">
		<a href="<?php echo URL::site('user/qqlogin');?>" class="btn btn-warning btn-block">QQ 登录</a>
	</div>
	<div class="form-group">
		<a href="<?php echo URL::site('user/register')?>" class="ajax-modal-sm">现在注册</a>
	</div>
</form>

</div>