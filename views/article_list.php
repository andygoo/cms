
<?php include __DIR__ . '/article/header.php';?>
<?php include __DIR__ . '/article/nav.php';?>

<!-- Start Home -->
<div class="pageheader">
    <div class="container">
        <h2 class="title">Navbar Right Menu</h2>
        <p>Navigation menu on right</p>
    </div>
</div>
<!-- End Home -->

<div class="clearfix"></div>

<div class=" ">
<div class="container">
    <div class="row">
        <main class="col-md-8">
            <h3 class="page-header">好车故事</h3>
            <ul class="media-list">
            <?php foreach($list as $item): ?>
                <li class="media">
                    <div class="media-left">
                        <?php if (strpos($item['pic'], '://') !== false):?>
                        <?= HTML::image($item['pic'].'?imageView2/2/w/400/h/300', array('width'=>200)) ?>
                        <?php else:?>
                        <?= HTML::image('/imagefly/w400-h300-c/' . $item['pic'], array('width'=>200)) ?>
                        <?php endif;?>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="<?= URL::site('article/detail?id='.$item['id'])?>"><?= $item['title'] ?></a>
                        </h4>
                        <p class="text-muted"><?= date('Y-m-d', $item['add_time'])?></p>
                        <p class="text-muted summary"><?= $item['brief'] ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
            <?= $pager?>
        </main>
        <aside class="col-md-4">
            <?php include __DIR__ . '/article/sidebar.php';?>
        </aside>
    </div>
</div>
</div>

<?php include __DIR__ . '/article/footer.php';?>

