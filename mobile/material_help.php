
<style>
.mdl-layout__tab-bar {height:48px;}
.mdl-layout__tab {color:rgba(255,255,255,.8);}
.mdl-layout.is-upgraded .mdl-layout__tab.is-active {color: #fff}
.mdl-layout.is-upgraded .mdl-layout__tab.is-active::after {background: #fff}
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <i class="mdicon arrow-back mdicon-xs"></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">帮助</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert mdicon-xs"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item about-button">About</li>
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

      <div class="mdl-layout__tab-panel is-active mdl-grid" id="fixed-tab-1">
        <table class="mdl-data-table mdl-js-data-table _mdl-data-table--selectable mdl-shadow--2dp" width="100%">
          <thead>
            <tr>
              <!-- class "mdl-data-table__cell--non-numeric", align values to left -->
              <th class="mdl-data-table__cell--non-numeric">Country</th>
              <th class="mdl-data-table__cell--non-numeric">Capital</th>
              <th class="mdl-data-table__cell--non-numeric">Currency</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="mdl-data-table__cell--non-numeric">USA</td>
              <td class="mdl-data-table__cell--non-numeric">Washington DC</td>
              <td class="mdl-data-table__cell--non-numeric">US Dollar</td>
            </tr>
            
            <!-- Row 2 -->
            <tr>
              <!-- class "mdl-data-table__cell--non-numeric", align values to left -->
              <td class="mdl-data-table__cell--non-numeric">CHINA</td>
              <td class="mdl-data-table__cell--non-numeric">Beijing</td>
              <td class="mdl-data-table__cell--non-numeric">Yuan</td>
            </tr>
            
            <!-- Row 3 -->
            <tr>
              <!-- class "mdl-data-table__cell--non-numeric", align values to left -->
              <td class="mdl-data-table__cell--non-numeric">INDIA</td>
              <td class="mdl-data-table__cell--non-numeric">New Delhi</td>
              <td class="mdl-data-table__cell--non-numeric">Rupees</td>
            </tr>
            
          </tbody>
        </table>
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
