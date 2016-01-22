<?php if (!empty($article_list)):?>
<ul class="media-list">
<?php foreach($article_list as $item): ?>
<li class="media ajax-click" data-url="<?= URL::site('article?id='.$item['id'], true)?>">
    <div class="media-left">
        <?= HTML::image($item['pic'].'?imageView2/2/w/160/h/120', array('width'=>'100px')) ?>
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?= $item['title'] ?></h4>
        <div class="text-muted"><?= date('Y-m-d', $item['add_time'])?></div>
    </div>
</li>
<?php endforeach; ?>
</ul>
<?php endif;?>