
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
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
</header>

<main class="mdl-layout__content" style="padding-bottom: 55px;">

<ul class="demo-list-three mdl-list" style="width: 100%;">
    <?php foreach (range(1, 10) as $key=>$item):?>
      <li class="mdl-list__item mdl-list__item--three-line" style="background: #fff;height:auto;padding: 10px; margin: 4px 0;align-items: flex-start;">
        <span class="mdl-list__item-primary-content" style="height:auto">
          <span class="mdl-list__item-avatar" style="width: auto;height:auto">
              <img width="100" src="http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/1/w/480/h/360">
          </span>
          <span style="font-size: 14px;">飞度 2014款 1.5L EX CVT精英型</span>
          <span class="mdl-list__item-text-body" style="font-size: 12px;height:auto">2014.04上牌 · 3.0万公里 · 手动</span>
        </span>
        <span class="mdl-list__item-secondary-content" style="height:auto">
            <button class="mdl-list__item-secondary-action mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn<?php echo $key?>">
                <i class="mdicon more-vert"></i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn<?php echo $key?>">
                <li class="mdl-menu__item">取消收藏</li>
                <li class="mdl-menu__item">Contact</li>
            </ul>
        </span>
      </li>
    <?php endforeach;?>
</ul>

</main>
</div>
