
<?= HTML::style('media/sidebarjs/sidebarjs.css')?>
<style>
[sidebarjs] {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -webkit-overflow-scrolling: touch;
  -webkit-tap-highlight-color: rgba(0,0,0, 0);
  -moz-tap-highlight-color: rgba(0,0,0, 0);
  tap-highlight-color: rgba(0,0,0, 0);	
  font: 300 16px/100% 'Arial', sans-serif;
}
[sidebarjs] h3 {
  min-height: 150px;
  padding: 30px 16px 16px;
  color: #FFF;
  font-size: 40px;
  margin: 0;
  background: url(http://7xkkhh.com1.z0.glb.clouddn.com/2016/07/27/14695893438233.jpg) #2196F3;
}
[sidebarjs] h3 a{
	color:#fff;
	text-decoration: none;
}

[sidebarjs] nav {
  overflow-x: hidden;
  overflow-y: auto;
}

[sidebarjs] nav > ul {
  display: flex;
  flex-direction: column;
  border-top: 1px solid rgba(0,0,0, .1);
	padding: 0; margin: 0;
}
[sidebarjs] nav > ul:first-child {
  border-top: none;
}

[sidebarjs] nav ul li {
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -moz-align-items: center;
  -ms-align-items: center;
  -webkit-align-items: center;
  align-items: center;
  -moz-transition: background 0.3s ease;
  -o-transition: background 0.3s ease;
  -webkit-transition: background 0.3s ease;
  transition: background 0.3s ease;
}
[sidebarjs] nav a {
	color: rgba(0,0,0, .64);text-decoration: none;
  padding: 16px;margin-right: 16px;display:block;width:100%;
}
[sidebarjs] nav li:active, [sidebarjs] nav li.active {
  color: inherit;
  background: rgba(0,0,0, .1);
}
</style>

<div id="sidebarjs" sidebarjs>
    <?php if (empty($user)):?>
    <h3>
        <div class="img-circle" style="background: #ccc; width: 65px; height: 65px; line-height: 65px;text-align: center">
            <i class="glyphicon glyphicon-user"></i>
        </div>
        <a href="<?php echo URL::site('user/login')?>" class="ajax-modal-sm" style="font-size: 16px;margin-left: 15px;">登录</a>
    </h3>
    <?php else:?>
    <h3>
        <div class="img-circle" style="background: #ccc; width: 65px; height: 65px; line-height: 65px;text-align: center">
            <i class="glyphicon glyphicon-user"></i>
        </div>
        <span style="font-size: 16px;"><?php echo $user['username']?></span>
    </h3>
    <?php endif;?>
    <nav>
        <ul>
            <li><a href="<?php echo URL::site('product')?>">首页</a></li>
            <li><a href="<?php echo URL::site('product')?>">我要买车</a></li>
            <li><a href="<?php echo URL::site('product')?>">我要卖车</a></li>
        </ul>
        <ul>
            <?php if (empty($user)):?>
            <li><a href="<?php echo URL::site('user/login')?>" class="ajax-modal-sm">登录</a></li>
            <?php else:?>
            <li><a href="<?php echo URL::site('order/list')?>">我的订单</a></li>
            <li><a href="<?php echo URL::site('member/logout')?>">退出</a></li>
            <?php endif;?>
        </ul>
    </nav>
</div>

<?= HTML::script('media/sidebarjs/sidebarjs.js')?>
<script>
var sidebarjs = new SidebarJS();
var links = document.querySelectorAll('#sidebarjs a');
for(var i = 0; i < links.length; i++) {
  links[i].addEventListener('click', elementSelected)
}
function elementSelected(e) {
    sidebarjs.close();
}
</script>