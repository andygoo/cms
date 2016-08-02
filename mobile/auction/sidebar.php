
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
	box-sizing: border-box;
	display: flex;
	flex-direction: column;
	justify-content: flex-end;
  height: 151px;
  padding: 16px;	
  color: #FFF;
  font-size: 22px;
  margin: 0;
  background: url(http://7xkkhh.com1.z0.glb.clouddn.com/2016/08/01/14700177870141.jpg?imageView2/1/w/600/h/302) #2196F3;
  background-size: cover;
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
	padding: 0;
	margin: 6px 0;
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
        <div class="img-circle" style="background: #ccc; width: 48px; height: 48px; line-height: 48px;padding-top: 2px;text-align: center">
            <i class="glyphicon glyphicon-user"></i>
        </div>
        <div style="height: 32px;display: flex;position: relative;flex-direction: row;align-items: center;width: 100%;">
            <a href="<?php echo URL::site('user/login')?>" class="ajax-modal-sm" style="font-size: 16px;">登录</a>
        </div>
    </h3>
    <?php else:?>
    <h3>
        <div class="img-circle" style="background: #fff; color: #ee6e73; width: 48px; height: 48px; line-height: 48px;padding-top: 2px;text-align: center">
            <i class="glyphicon glyphicon-user"></i>
        </div>
        <div style="height: 32px;display: flex;position: relative;flex-direction: row;align-items: center;width: 100%;">
            <span style="font-size: 16px;"><?php echo $user['username']?></span>
        </div>
    </h3>
    <?php endif;?>
    <nav>
        <ul>
            <li><a href="<?php echo URL::site('auction')?>">首页</a></li>
            <li><a href="<?php echo URL::site('product')?>">拍卖专场</a></li>
        </ul>
        <hr style="margin: 0">
        <ul>
            <li <?php if ($uri == 'auction/mypai1'):?>class="active"<?php endif;?>><a href="<?php echo URL::site('auction/mypai1')?>">我参拍的</a></li>
            <li><a href="<?php echo URL::site('auction/mypai2')?>">我中拍的</a></li>
            <?php if (!empty($user)):?>
            <li><a href="<?php echo URL::site('user/logout')?>">退出</a></li>
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