
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
            <i class="mdicon arrow-back"></i>
        </button>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">我的收藏</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item about-button">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
</header>

<style>
.mdl-list__item {background: #fff;margin-top:1px;padding:10px 10px 10px 15px}
</style>
<main class="mdl-layout__content">

<ul class="mdl-list">
    <?php foreach (range(1, 10) as $key=>$item):?>
      <li class="mdl-list__item mdl-list__item--two-line" style="height:auto">
        <span class="mdl-list__item-primary-content" style="height:auto">
          <span style="float:left;margin-right: 16px;width: auto;height:auto">
              <img width="100" src="http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/1/w/480/h/360">
          </span>
          <span>北京现代2013款智能型</span>
          <span class="mdl-list__item-sub-title" style="font-size: 12px;">2014.04上牌 · 3.0万公里 · 手动</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <a class="mdl-list__item-secondary-action mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="mdicon favorite"></i>
            </a>
        </span>
      </li>
    <?php endforeach;?>
</ul>

</main>
</div>
