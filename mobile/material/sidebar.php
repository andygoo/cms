
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
[sidebarjs] header {
  color: #FFF;
  font-size: 14px;
  margin: 0;
  background: url(http://7xkkhh.com1.z0.glb.clouddn.com/2016/08/01/14700177870141.jpg?imageView2/1/w/600/h/302) #2196F3;
  background-size: cover;
}
[sidebarjs] header a{
	color:#fff;
	text-decoration: none;
}
[sidebarjs-container] {
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
	color: rgba(0,0,0, .80);text-decoration: none;
  padding: 16px;margin-right: 16px;display:block;width:100%;
}
[sidebarjs] nav a i {
	vertical-align: middle;font-size: 22px;color:rgba(0,0,0, .55);margin-right:32px;
}
[sidebarjs] nav li:active, [sidebarjs] nav li.active {
  color: inherit;
  background: rgba(0,0,0, .1);
}
[sidebarjs] .demo-drawer-header {
  box-sizing: border-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-justify-content: space-between;
      -ms-flex-pack: between;
          justify-content: space-between;
  padding: 16px;
  min-height: 151px;
}
[sidebarjs] .demo-avatar-dropdown {
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  -webkit-flex-direction: row;
      -ms-flex-direction: row;
          flex-direction: row;
  -webkit-align-items: flex-end;
      -ms-flex-align: flex-end;
          align-items: flex-end;
  width: 100%;
}
</style>

<div id="sidebarjs" sidebarjs>
    <header class="demo-drawer-header">
        <div class="img-circle" style="background: #fff; width: 60px; height: 60px; line-height: 60px; border-radius: 30px;text-align: center">
            <i class="mdicon user" style="color: #ee6e73; font-size: 40px; line-height: 40px;margin-top:8px;"></i>
        </div>
        <div class="demo-avatar-dropdown">
            <span style="line-height: 20px; font-weight: 400;">小小明<br>hello@example.com</span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="mdicon arrow-drop-down"></i>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                <li class="mdl-menu__item">退出</li>
            </ul>
        </div>
    </header>
    <nav>
        <ul>
            <li <?php if ($uri == 'material/index'):?>class="active"<?php endif;?>>
                <a href="<?php echo URL::site('material/index')?>">
                    <i class="mdicon home"></i>首页
                </a>
            </li>
            <li <?php if ($uri == 'material/favorite'):?>class="active"<?php endif;?>>
                <a href="<?php echo URL::site('material/favorite')?>">
                    <i class="mdicon favorite"></i>我的收藏
                </a>
            </li>
            <li <?php if ($uri == 'material/history'):?>class="active"<?php endif;?>>
                <a href="<?php echo URL::site('material/history')?>">
                    <i class="mdicon history"></i>我的浏览
                </a>
            </li>
        </ul>
        <hr style="margin: 0;border-top: 1px solid #eee;">
        <ul>
            <li <?php if ($uri == 'material/setting'):?>class="active"<?php endif;?>>
                <a href="<?php echo URL::site('material/setting')?>">
                    <i class="mdicon settings-cogwheel"></i>设置
                </a>
            </li>
            <li <?php if ($uri == 'material/feedback'):?>class="active"<?php endif;?>>
                <a href="<?php echo URL::site('material/feedback')?>">
                    <i class="mdicon message"></i>发送反馈
                </a>
            </li>
            <li <?php if ($uri == 'material/help'):?>class="active"<?php endif;?>>
                <a class="mdl-navigation__link" href="<?php echo URL::site('material/help')?>">
                    <i class="mdicon help"></i>帮助
                </a>
            </li>
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