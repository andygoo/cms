
<?= HTML::style('media/bootstrap/css/bootstrap.min.css')?>
<?= HTML::style('media/css/weui.min.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>
<?= HTML::script('media/js/readmore.min.js')?>
<?= HTML::script('media/js/jquery.countdown.min.js')?>

<style>
body {background: #f5f2f2;padding-bottom:55px;}
.container{padding:0;background: #fff}
.weui_grid {padding: 10px;font-size: 20px;}
.weui_icon_safe:before {font-size: 10px;color:#fff;margin-top: -2px;}
</style>

<div class="container" style="padding: 0;">
    <div class="panel" style="margin-bottom: 0px;border:none;border-radius:0">
        <div class="panel-heading" style="background: #3c8dbc;padding-top:14px;color:#fff;font-size: 16px; border:none; border-radius:0; height: 50px" sidebarjs-toggle>
            <i class="glyphicon glyphicon-menu-hamburger"></i>
        </div>
        <div class="panel-body" style="margin-top:-50px;">
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading" style="margin-top: 5px; width:100%; color: #fff; text-align: right"><?= $siteinfo['name']?></h4>
                    <p style="font-sizt: 12px;margin-top: 20px; margin-bottom: 0; width:100%; text-align: right"><?= $siteinfo['desc']?></p>
                </div>
                <div class="media-right">
                    <img class="media-object" width="70" src="<?= $siteinfo['logo']?>">
                </div>
            </div>
        </div>
    </div>
</div>
