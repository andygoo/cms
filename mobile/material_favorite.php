
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
            <i class="mdicon arrow-back mdicon-xs"></i>
        </button>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">我的收藏</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert mdicon-xs"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item about-button">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
</header>

<style>
.mdl-icon-toggle.is-checked .mdl-icon-toggle__label {color: <?= $theme_list[$curr_theme]?>}
</style>
<main class="mdl-layout__content">

    <div class="mdl-grid">
        <?php foreach (range(1, 6) as $item):?>
        <div class="mdl-cell mdl-cell--6-col-phone mdl-cell--4-col">
            <div class="mdl-card mdl-shadow--2dp" style="width: 100%">
                <div class="mdl-card__media">
                    <img width="100%" src="http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/2/w/500/h/375">
                </div>
                <div class="mdl-card__supporting-text" style="line-height:24px;font-size: 16px;color: rgba(0,0,0,.80);">北京现代ix35 2013款 2.0L 自动两驱智能型GLS 国IV</div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?= URL::site('material/detail')?>">
                      <span style="font-size:24px">4.68</span> 万
                    </a>
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" style="float: right;">
                        <i class="mdicon favorite-outline mdicon-xs"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</main>
</div>
