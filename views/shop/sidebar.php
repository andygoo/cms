
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
  display: flex;
  align-items: flex-end;
  min-height: 180px;
  padding: 16px;
  background: #2196F3;
  color: #FFF;
  font-size: 40px;
  margin: 0;
}
[sidebarjs] h3 a{
	text-decoration: none;
}

[sidebarjs] nav {
  overflow-x: hidden;
  overflow-y: auto;
}

[sidebarjs] nav > div {
  display: flex;
  flex-direction: column;
  border-top: 1px solid rgba(0,0,0, .1);
}
[sidebarjs] nav > div:first-child {
  border-top: none;
}

[sidebarjs] nav a {
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -moz-align-items: center;
  -ms-align-items: center;
  -webkit-align-items: center;
  align-items: center;
  color: rgba(0,0,0, .64);
  padding: 16px;
  -moz-transition: background 0.3s ease;
  -o-transition: background 0.3s ease;
  -webkit-transition: background 0.3s ease;
  transition: background 0.3s ease;
  text-decoration: none;
}
[sidebarjs] nav a:active {
  color: inherit;
  background: rgba(0,0,0, .1);
}
</style>

<div id="sidebarjs" sidebarjs>
    <?php if (empty($user)):?>
    <h3><i class="glyphicon glyphicon-user"></i></h3>
    <?php else:?>
    <h3><?php echo $user['username']?></h3>
    <?php endif;?>
    <nav>
        <div>
            <a href="<?php echo URL::site('product')?>">首页</a>
            <a href="<?php echo URL::site('product')?>">我要买车</a>
        </div>
        <div>
            <?php if (empty($user)):?>
            <a href="<?php echo URL::site('user/login')?>" class="ajax-modal-sm">登录</a>
            <?php else:?>
            <a href="<?php echo URL::site('order/list')?>">我的订单</a>
            <a href="<?php echo URL::site('member/logout')?>">退出</a>
            <?php endif;?>
        </div>
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