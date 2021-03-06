
<style>
.mdl-list__item {background: #fff;margin-top:1px;}
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <i class="mdicon arrow-back mdicon-xs"></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">设置</span>
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

<main class="mdl-layout__content">
    <!-- 
    <div class="mdl-grid mdl-grid--no-spacing" style="padding: 10px;">
      <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-shadow--2dp">
        <ul class="mdl-list" style="padding: 0;margin:0;">
          <?php foreach (range(1, 6) as $item):?>
          <li class="mdl-list__item"><span class="mdl-list__item-primary-content"><i class="mdl-list__item-icon mdicon user"></i> Bryan Cranston</span></li>
          <?php endforeach;?>
        </ul>
      </div>
    </div> -->
    
    <ul class="mdl-list">
      <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">消息提醒</span>
        <span class="mdl-list__item-secondary-action">
            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
              <input type="checkbox" id="switch-1" class="mdl-switch__input" checked>
              <span class="mdl-switch__label"></span>
            </label>
        </span>
      </li>
    </ul>
    
    <ul class="mdl-list">
    <?php foreach ($theme_list as $theme_name => $theme_color):?>
      <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="theme-option-<?= $theme_name?>">
              <input type="radio" id="theme-option-<?= $theme_name?>" class="mdl-radio__button" name="theme-options" value="<?= $theme_name?>" <?php if($theme_name==$curr_theme):?>checked<?php endif;?>>
              <span class="mdl-radio__label" style="color: <?= $theme_color?>"><?= $theme_name?></span>
            </label>
        </span>
      </li>
    <?php endforeach;?>
    </ul>
    
</main>
</div>

<?= HTML::script('media/js/jquery.cookie.js')?>
<script>
$(function() {
	$('input[name=theme-options]').change(function() {
	    var t = $(this);
	    var v = t.val();
	    $.cookie('apptheme', v, {'path': '/'});
	});
});
</script>
