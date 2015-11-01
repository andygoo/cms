<article class="post">
    <?php if ($article['featured']):?>
    <div class="featured">
        <i class="fa fa-star"></i>
    </div>
    <?php endif;?>
    <header class="post-head">
        <h1 class="post-title"><?= $article['title']?></h1>
        <section class="post-meta">
            <time class="post-date"><?= date('Y-m-d', $article['add_time'])?></time> &bull;
            <a href="<?= URL::site('home?cid='.$article['cid'])?>"><?= $article['cat_name']?></a>
            <div class="pull-right pv">阅读：<?= $article['pv']?></div>
        </section>
    </header>
    <section class="post-content">
        <?= $article['content']?>
    </section>
</article>

<div class="prev-next-wrap clearfix">
    <?php if (!empty($prev_article)):?>
    <a class="btn btn-default" href="<?= URL::site('article?id='.$prev_article['id'])?>"><i class="fa fa-angle-left fa-fw"></i> <?= $prev_article['title']?></a>
    <?php endif;?>
    &nbsp;
    <?php if (!empty($next_article)):?>
    <a class="btn btn-default" href="<?= URL::site('article?id='.$next_article['id'])?>"><?= $next_article['title']?> <i class="fa fa-angle-right fa-fw"></i></a>
    <?php endif;?>
</div>

