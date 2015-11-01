<style>
.list-group-item{border:none;}
</style>

<h4 class="title">浏览记录</h4>
<div class="content list-group">
    <?php foreach ($list as $key=>$item):?>
    <a href="<?= URL::site('article?id='.$item['id'])?>" class="list-group-item">
         <?= $item['title']?>
    </a>
    <?php endforeach;?>
</div>
    
