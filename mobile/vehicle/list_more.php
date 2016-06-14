<div>
	<div class="sx-h">车龄</div>
	<div class="xh-l">
		<ul>
		    <?php foreach ($year_list as $key=>$item): ?>
			<li <?php if($item['selected']):?>class="active"<?php endif;?>><span><a data-url="<?php echo $item['url']?>"><?php echo $item['desc']?></a></span></li>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="sx-h">里程</div>
	<div class="xh-l">
		<ul>
		    <?php foreach ($miles_list as $key=>$item): ?>
			<li <?php if($item['selected']):?>class="active"<?php endif;?>><span><a data-url="<?php echo $item['url']?>"><?php echo $item['desc']?></a></span></li>
			<?php endforeach;?>
		</ul>
	</div>
</div>