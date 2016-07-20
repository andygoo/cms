
<div class="container">

<h3 class="page-header">登录</h3>

<form action="<?php echo URL::site('user/login')?>" method="post" class="col-sm-6 col-md-4 ajax-submit">
	<div class="form-group">
		<input type="text" class="form-control" name="name" placeholder="用户名">
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name="name" placeholder="密码">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-info btn-block">登录</button>
	</div>
	<div class="form-group">
		<a href="<?php echo URL::site('user/register')?>" class=ajax-modal-sm>现在注册</a>
		<a href="#<?php echo URL::site('user/register')?>" class="pull-right">忘记密码？</a>
	</div>
</form>

</div>