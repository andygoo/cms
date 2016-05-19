<div class="brand_cx">
	<ul>
        <?php foreach ($series_list as $item): ?>
        <li <?php if($item['selected']):?>class="active"<?php endif;?>><a href="<?php echo $item['url'];?>"><b><?php echo $item['desc'];?></b></a></li>
        <?php endforeach; ?>
	</ul>
</div>