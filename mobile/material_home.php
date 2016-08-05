
<style>
.mdl-tabs__tab {font-size: 12px;color: #888;width: 100%;line-height:15px;padding-top:7px;}
.mdl-tabs__tab .mdicon {font-size: 24px;color: #888;}
.mdl-tabs__tab.is-active .mdicon {color: <?php echo $theme_list[$curr_theme]?>;}
.mdl-tabs.is-upgraded .mdl-tabs__tab.is-active {color: <?php echo $theme_list[$curr_theme]?>;}
.mdl-tabs__tab-bar {
position: fixed;left:0;bottom:0;background:#fff;width:100%;
box-shadow: 0 -2px 5px 0 rgba(0, 0, 0, 0.1), 0 -2px 10px 0 rgba(0, 0, 0, 0.05);
}
</style>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" sidebarjs-toggle>
            <i class="mdicon menu"></i>
        </button>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">首页</span>
        <div class="mdl-layout-spacer"></div>
        <!-- 
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                <i class="mdicon search" style="line-height: 36px;"></i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" id="search">
            </div>
        </div>
         -->
        <nav class="mdl-navigation">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="mdicon more-vert"></i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item">About</li>
                <li class="mdl-menu__item">Contact</li>
            </ul>
        </nav>
    </div>
</header>

<main class="mdl-layout__content">
    
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
      <div class="mdl-tabs__tab-bar">
          <a href="#fixed-tab-1" class="mdl-tabs__tab is-active"><i class="mdicon chat"></i><br>微信</a>
          <a href="#fixed-tab-2" class="mdl-tabs__tab"><i class="mdicon people"></i><br>通讯录</a>
          <a href="#fixed-tab-3" class="mdl-tabs__tab"><i class="mdicon visibility"></i><br>发现</a>
      </div>
    
      <div class="mdl-tabs__panel is-active" id="fixed-tab-1">
        <ul>
          <li>Eddard</li>
          <li>Catelyn</li>
          <li>Robb</li>
          <li>Sansa</li>
          <li>Brandon</li>
          <li>Arya</li>
          <li>Rickon</li>
        </ul>
      </div>
      <div class="mdl-tabs__panel" id="fixed-tab-2">
        <ul>
          <li>Tywin</li>
          <li>Cersei</li>
          <li>Jamie</li>
          <li>Tyrion</li>
        </ul>
      </div>
      <div class="mdl-tabs__panel" id="fixed-tab-3">
        <ul>
          <li>Viserys</li>
          <li>Daenerys</li>
        </ul>
      </div>
    </div>
    
</main>
</div>

<script>
//Check if a new cache is available on page load.
window.addEventListener('load', function(e) {
	var appCache = window.applicationCache;
	appCache.addEventListener('updateready', function(e) {
    if (appCache.status == appCache.UPDATEREADY) {
      // Browser downloaded a new app cache.
      // Swap it in and reload the page to get the new hotness.
      appCache.swapCache();
      //if (confirm('A new version of this site is available. Load it?')) {
        window.location.reload();
      //}
    }
  }, false);
}, false);
</script>
