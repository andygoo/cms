
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <i class="mdicon arrow-back"></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">我的浏览</span>
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

<div class="mdl-grid">
    <?php foreach (range(1, 6) as $item):?>
    <div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--12-col-phone">
    <div class="demo-card-square mdl-card mdl-shadow--2dp" style="width: 100%;height: 320px;">
      <div class="mdl-card__title mdl-card--expand" style="background:url(http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/1/w/480/h/300) center / cover;">
        <h2 class="mdl-card__title-text"></h2>
      </div>
      <div class="mdl-card__supporting-text" style="line-height:24px;font-size: 16px;color: rgba(0,0,0,.80);">北京现代ix35 2013款 2.0L 自动两驱智能型GLS 国IV</div>
      <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?php echo URL::site('material/detail')?>">
          View Updates
        </a>
      </div>
    </div>
    </div>
    <?php endforeach;?>
</div>

</main>
</div>