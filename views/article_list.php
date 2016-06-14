
<?php include __DIR__ . '/article/header.php';?>
<?php include __DIR__ . '/article/nav.php';?>

<section class="content-wrap">
    <div class="container">
        <div class="row">
            <main class="col-md-8 main-content" id="content">
            
                <ul class="media-list">
                <?php foreach($list as $item): ?>
                    <li class="media post">
                        <div class="media-left" style="padding-right: 15px">
                            <?php if (strpos($item['pic'], '://') !== false):?>
                            <?= HTML::image($item['pic'].'?imageView2/2/w/400/h/300', array('width'=>200)) ?>
                            <?php else:?>
                            <?= HTML::image('/imagefly/w400-h300-c/' . $item['pic'], array('width'=>200)) ?>
                            <?php endif;?>
                        </div>
                        <div class="media-body post-head">
                            <h1 class="media-heading post-title" style="font-size: 26px;">
                                <a href="<?= URL::site('article/detail?id='.$item['id'])?>"><?= $item['title'] ?></a>
                            </h1>
                            <div class="post-content" style="margin: 10px 0;"><?= Text::limit_chars($item['brief'],80) ?></div>
                        </div>
                        <footer class="post-footer clearfix">
                            <div class="pull-left tag-list">
                                <i class="fa fa-folder-open-o"></i>
                                <a href="<?= URL::site('article/lists?cid='.$item['cid'])?>"><?= $item['cat_name']?></a>
                            </div>
                            <div class="pull-right tag-list">
                                <time class="post-date"><?= date('Y-m-d', $item['add_time'])?></time>
                            </div>
                        </footer>
                    </li>
                <?php endforeach; ?>
                </ul>
            
                <?= $pager?>
                
            </main>
            <?php include __DIR__ . '/article/sidebar.php';?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/article/footer.php';?>

