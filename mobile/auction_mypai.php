
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>

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