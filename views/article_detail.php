
<?php include __DIR__ . '/article/header.php';?>

<style>
article img {
    max-width: 100%;
}
</style>

<div class=" _gray">
<div class="container">
    <div class="row">
        <main class="col-md-9">
            <article class="post">
                <h3 class="page-header"><?= $article['title']?></h3>
                <section class="post-content">
                    <?= $article['content']?>
                </section>
            </article>
            <div class="about-author clearfix">
                <div class="ds-thread" data-thread-key="<?= $article['id']?>" data-title="<?= $article['title']?>" data-url="<?= URL::site('article?id='.$article['id'], true)?>"></div>
            </div>
        </main>
        <aside class="col-md-3">
            <?php include __DIR__ . '/article/sidebar.php';?>
        </aside>
    </div>
</div>
</div>

<?php include __DIR__ . '/article/footer.php';?>

<?= HTML::script('media/js/jquery.fitvids.min.js')?>
<script>
$(function () {
	$('.post').fitVids();
});
</script>

<script type="text/javascript">
var duoshuoQuery = {short_name:"jiesc"};
(function() {
	var ds = document.createElement('script'); ds.type = 'text/javascript'; ds.async = true;
	ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js'; ds.charset = 'UTF-8';
	(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
