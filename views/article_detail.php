
<?php include __DIR__ . '/article/header.php';?>
<?php include __DIR__ . '/article/nav.php';?>

<section class="content-wrap">
    <div class="container">
        <div class="row">
            <main class="col-md-8 main-content" id="content">
            
                <article class="post">
                    <header class="post-head">
                        <h1 class="post-title"><?= $article['title']?></h1>
                        <section class="post-meta">
                            <time class="post-date"><?= date('Y-m-d', $article['add_time'])?></time>
                        </section>
                    </header>
                    <section class="post-content">
                        <?= $article['content']?>
                    </section>
                    
                    <footer class="post-footer clearfix">
                    <div class="ds-share" data-thread-key="<?= $article['id']?>" data-title="<?= $article['title']?>" data-images="<?= $article['pic']?>?imageView2/2/w/400/h/300" data-content="<?= $article['brief']?>" data-url="<?= URL::site('article?id='.$article['id'], true)?>">
                        <div class="ds-share-inline">
                          <ul  class="ds-share-icons-16">
                          	<li><span class="ds-more">分享到：</span></li>
                            <li><a class="ds-weibo" href="javascript:void(0);" data-service="weibo">微博</a></li>
                            <li><a class="ds-qzone" href="javascript:void(0);" data-service="qzone">QQ空间</a></li>
                            <li><a class="ds-qqt" href="javascript:void(0);" data-service="qqt">腾讯微博</a></li>
                            <li><a class="ds-wechat" href="javascript:void(0);" data-service="wechat">微信</a></li>
                          </ul>
                        </div>
                     </div>
                     </footer>
                    
                </article>
                
                <div class="about-author clearfix">
                    <div class="ds-thread" data-thread-key="<?= $article['id']?>" data-title="<?= $article['title']?>" data-url="<?= URL::site('article?id='.$article['id'], true)?>"></div>
                </div>
                
            </main>
            <?php include __DIR__ . '/article/sidebar.php';?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/article/footer.php';?>

<script type="text/javascript">
var duoshuoQuery = {short_name:"jiesc"};
(function() {
	var ds = document.createElement('script'); ds.type = 'text/javascript'; ds.async = true;
	ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js'; ds.charset = 'UTF-8';
	(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
