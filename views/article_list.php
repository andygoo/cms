
<?php include __DIR__ . '/article/header.php';?>
<?= HTML::style('media/css/pager.css')?>
<style>
.media-body .summary {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
	text-overflow: ellipsis;
    overflow: hidden;
}
.media-list img {width: 200px;}
@media (max-width: 425px)  {
    .media-list img {width: 100px;}	
    .media-body .summary {display: none;}
}
</style>

<!-- Start Home -->
<style>
.pageheader{
    padding: 70px 0;
    background-image: url(/media/img/brick-wall-dark.png);
    background-color: #f43438;
}
.pageheader .title{
    text-shadow: 6px 6px 0px rgba(0,0,0,0.2);
    color: #fff !important;
}
.pageheader p{
    margin-bottom: 0;
    color: #f5f5f5;
    font-size: 16px;
}
</style>
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
        <main class="col-md-9">
            <h3 class="page-header">好车故事</h3>
            <ul class="media-list" style="margin-bottom: 20px">
            <?php foreach($list as $item): ?>
                <li class="media">
                    <div class="media-left">
                        <?php if (strpos($item['pic'], '://') !== false):?>
                        <?= HTML::image($item['pic'].'?imageView2/2/w/400/h/300') ?>
                        <?php else:?>
                        <?= HTML::image('/imagefly/w400-h300-c/' . $item['pic']) ?>
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
        <aside class="col-md-3">
            <?php include __DIR__ . '/article/sidebar.php';?>
        </aside>
    </div>
</div>
</div>

<?php include __DIR__ . '/article/footer.php';?>

