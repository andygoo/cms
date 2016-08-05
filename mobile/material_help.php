
<style>
.mdl-layout__tab-bar {height:48px;}
.mdl-layout__tab {color:rgba(255,255,255,.8);}
.mdl-layout.is-upgraded .mdl-layout__tab.is-active {color: #fff}
.mdl-layout.is-upgraded .mdl-layout__tab.is-active::after {background: #fff}
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <i class="mdicon arrow-back"></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">帮助</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
        <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
        <a href="#fixed-tab-2" class="mdl-layout__tab">Tab 2</a>
        <a href="#fixed-tab-3" class="mdl-layout__tab">Tab 3</a>
    </div>
</header>

<main class="mdl-layout__content">

      <div class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
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
      <div class="mdl-layout__tab-panel" id="fixed-tab-2">
        <ul>
          <li>Tywin</li>
          <li>Cersei</li>
          <li>Jamie</li>
          <li>Tyrion</li>
        </ul>
      </div>
      <div class="mdl-layout__tab-panel" id="fixed-tab-3">
        <ul>
          <li>Viserys</li>
          <li>Daenerys</li>
        </ul>
      </div>
</main>
</div>
