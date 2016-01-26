
<ul class="media-list">
<?php foreach($list as $item): ?>
    <li class="media post">
        <div class="media-left" style="padding-right: 15px">
            <?php if (strpos($item['pic'], '://') !== false):?>
            <?= HTML::image($item['pic'].'?imageView2/2/w/160/h/120', array('width'=>160)) ?>
            <?php else:?>
            <?= HTML::image('/imagefly/w200-h150-c/' . $item['pic'], array('width'=>160)) ?>
            <?php endif;?>
        </div>
        <div class="media-body post-head">
            <h4 class="media-heading post-title" style="font-size: 26px;"><a href="<?= URL::site('article?id='.$item['id'])?>"><?= $item['title'] ?></a></h4>
            <div class="post-content" style="margin: 10px 0;"><?= Text::limit_chars($item['brief'],80) ?></div>
        </div>
        <footer class="post-footer clearfix">
            <div class="pull-left tag-list">
                <i class="fa fa-folder-open-o"></i>
                <a href="<?= URL::site('?cid='.$item['cid'])?>"><?= $item['cat_name']?></a>
            </div>
            <div class="pull-right tag-list">
                <time class="post-date"><?= date('Y-m-d', $item['add_time'])?></time>
            </div>
        </footer>
    </li>
<?php endforeach; ?>
</ul>

<?= $pager?>
