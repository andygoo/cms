
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.min.css')?>

<?php if (!empty($list)):?>
<ul class="media-list">
<?php foreach($list as $item): ?>
<li class="media">
    <div class="media-left">
        <img src="<?= $item['pics'][0]['src_sml']; ?>" width="100">
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?= $item['title'] ?></h4>
        <p><?php echo $item['desc']?></p>
    </div>
</li>
<?php endforeach; ?>
</ul>
<?php endif;?>