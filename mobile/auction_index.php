<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
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

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button">
        <i class="mdicon menu" sidebarjs-toggle></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Home</span>
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

<main class="mdl-layout__content">
    <br>1<br>1<br>1<br>1<br>1<br>1<br>1<br>1<br>1<br>1<br>1<br>1<br>1<br>1<br>1
</main>
</div>

<?php include __DIR__ . '/auction/sidebar.php';?>
</body>
</html>

