<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="_theme-color" content="#00bcd4">
<title></title>
<?= HTML::style('media/materialicons/icon.css')?>
<?= HTML::style('media/mdl/material.min.css')?>
<?= HTML::style('media/mdl/material.cyan-red.min.css')?>
<?= HTML::script('media/js/jquery.min.js')?>
<?= HTML::script('media/mdl/material.min.js')?>
</head>
<body>
<style>
.mdl-layout-title, .material-icons {color: #fff}
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header" style="">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">Title</span>
      <div class="mdl-layout-spacer"></div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon"
               for="fixed-header-drawer-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="sample"
                 id="fixed-header-drawer-exp">
        </div>
      </div>
    </div>
  </header>
  <main class="mdl-layout__content">
    <div class="page-content">
        
        <style>
        .demo-card-square.mdl-card {
          width: 100%;
          height: 320px;
        }
        .demo-card-square > .mdl-card__title {
          color: #fff;
          background:
            url('/media/img/dog.png') bottom right 15% no-repeat #46B6AC;
        }
        </style>
        <?php foreach (range(1, 4) as $item):?>
        <div class="demo-card-square mdl-card mdl-shadow--2dp">
          <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">Update</h2>
          </div>
          <div class="mdl-card__supporting-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aenan convallis.
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
              View Updates
            </a>
          </div>
        </div>
        <?php endforeach;?>
      
    </div>
  </main>
</div>


</body>
</html>

