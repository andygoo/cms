<?php if (!empty($list)):?>
<ul class="media-list">
<?php foreach($list as $item): ?>
<li class="media ajax-click" onclick="window.open('<?= URL::site('article/detail?id='.$item['id'], true)?>')">
    <div class="media-left">
        <img src="<?= $item['pic']; ?>?imageView2/2/w/160/h/120" width="100">
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?= $item['title'] ?></h4>
        <div class="text-muted"><?= date('Y-m-d', $item['add_time'])?></div>
    </div>
</li>
<?php endforeach; ?>
</ul>
<?php endif;?>