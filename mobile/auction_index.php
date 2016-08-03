<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<meta name="_theme-color" content="#00bcd4">
<title></title>
<?= HTML::style('media/MDicons/css/MDicon.min.css')?>
<?php HTML::style('media/mdl/material.min.css')?>
<?= HTML::style('media/mdl/material.cyan-red.min.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>

<?= HTML::script('media/mdl/material.min.js')?>
<?= HTML::script('media/js/jquery.min.js')?>
</head>
<body>

<style>
.mdl-layout-title {color: #fff}
header .mdicon{font-size: 24px;color: #fff}
.mdl-layout__tab {color:rgba(255,255,255,.8)}
.mdl-layout.is-upgraded .mdl-layout__tab.is-active{color: #fff; }
.mdl-layout.is-upgraded .mdl-layout__tab.is-active::after {background: #fff}
</style>

<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button">
        <i class="mdicon menu" sidebarjs-toggle></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Home</span>
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                <i class="mdicon search" style="line-height: 36px;"></i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" id="search">
            </div>
        </div>
        <!-- 
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Contact</li>
            <li class="mdl-menu__item">Legal information</li>
        </ul> -->
    </div>
    <!-- --> <div class="mdl-layout__tab-bar mdl-js-ripple-effect" style="color: #fff">
        <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
        <a href="#fixed-tab-2" class="mdl-layout__tab">Tab 2</a>
        <a href="#fixed-tab-3" class="mdl-layout__tab">Tab 3</a>
    </div>
</header>

<main class="mdl-layout__content">
    <div class="row" style="padding: 4px 8px;">
        <?php foreach (range(1, 6) as $key=>$item):?>
        <div class="col-xs-12" style="padding: 4px;">
            <div class="mdl-card mdl-shadow--2dp" style="flex-direction: row;width: 100%;min-height: 100px">
              <div class="mdl-card__title" style="padding: 0">
                  <img height="100" src="http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/1/w/400/h/300">
              </div>
                <div class="mdl-card__supporting-text" style="font-size: 16px; color: #444; padding: 10px 16px 16px;">福克斯 2011款 三厢 1.8L 自动时尚型</div>
            </div>
            <!-- 
            <div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
                <div class="mdl-card__title" style="padding: 0">
                    <img width="100%" src="http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/1/w/400/h/300">
                </div>
                <div class="mdl-card__supporting-text" style="font-size: 16px; color: #444">福克斯 2011款 三厢 1.8L 自动时尚型</div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                      View Updates
                    </a>
                </div>
            </div> -->
        </div>
            
        <?php endforeach;?>
    </div>
</main>
</div>

<?php include __DIR__ . '/auction/sidebar2.php';?>
</body>
</html>

