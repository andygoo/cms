
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>
<?= HTML::style('media/css/weui.min.css')?>
<?= HTML::style('media/css/icono.min.css')?>


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
        <div class="panel-heading" style="background: #3c8dbc;color:#fff;font-size: 16px; border:none; border-radius:0;" sidebarjs-toggle>
            <i class="icono-hamburger"></i>
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


<div class="container" id="container" style="padding: 15px 15px 0;">
    <h3 class="page-header">我参拍的</h3>
    <?php if (!empty($list)):?>
    <ul class="media-list">
    <?php foreach($list as $item): ?>
    <li class="media">
        <div class="media-left">
            <a href="<?php echo URL::site('auction/detail/'. $item['id'])?>">
                <img src="<?= $item['pics'][0]['src_sml']; ?>" width="100">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?= $item['title'] ?></h4>
            <p><?php echo $item['desc']?></p>
        </div>
    </li>
    <?php endforeach; ?>
    </ul>
    <?php endif;?>
</div>