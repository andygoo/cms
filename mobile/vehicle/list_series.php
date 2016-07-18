
<ul class="list-group">
    <?php foreach ($series_list as $item): ?>
    <li class="list-group-item <?php if($item['selected']):?> active<?php endif;?>"><a href="<?php echo $item['url'];?>"><?php echo $item['desc'];?></a></li>
    <?php endforeach; ?>
</ul>
