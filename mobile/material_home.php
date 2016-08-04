
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button">
        <i class="mdicon menu" sidebarjs-toggle></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">首页</span>
        <div class="mdl-layout-spacer"></div>
        <!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                <i class="mdicon search" style="line-height: 36px;"></i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" id="search">
            </div>
        </div>
         -->
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
    <!-- <div class="mdl-layout__tab-bar mdl-js-ripple-effect" style="color: #fff">
        <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
        <a href="#fixed-tab-2" class="mdl-layout__tab">Tab 2</a>
        <a href="#fixed-tab-3" class="mdl-layout__tab">Tab 3</a>
    </div> -->
</header>

<main class="mdl-layout__content" style="background: #f7f7f7">

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
        //window.location.reload();
      //}
    }
  }, false);
}, false);
</script>

