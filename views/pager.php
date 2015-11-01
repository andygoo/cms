
<nav class="pagination">
<?php if ($previous_page): ?>
    <a class="newer-posts" href="<?= $page->url($previous_page) ?>"><i class="fa fa-angle-left"></i></a>
<?php endif ?>

<span class="page-number">第 <?= $current_page?> 页 ⁄ 共 <?= $total_pages?> 页</span>

<?php if ($next_page): ?>
    <a class="older-posts" href="<?= $page->url($next_page) ?>"><i class="fa fa-angle-right"></i></a>
<?php endif ?>
</nav>