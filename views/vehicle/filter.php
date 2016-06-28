
<div class="container">

<ul class="list-group" id="vehicle_filter">
    <li class="list-group-item">品牌&nbsp;&nbsp;
        <?php foreach ($brand_list['B'] as $item): ?>
        <a <?php if($item['selected']):?>class="active"<?php endif;?> href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
        <?php endforeach; ?>
    </li>
    <?php if (!empty($series_list)):?>
        <li class="list-group-item">车系&nbsp;&nbsp;
            <?php foreach ($series_list as $item): ?>
            <a <?php if($item['selected']):?>class="active"<?php endif;?> href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
            <?php endforeach; ?>
        </li>
    <?php endif;?>
    <li class="list-group-item">价格&nbsp;&nbsp;
        <?php foreach ($price_list as $item): ?>
        <a <?php if($item['selected']):?>class="active"<?php endif;?> href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
        <?php endforeach; ?>
    </li>
    <li class="list-group-item">车龄&nbsp;&nbsp;
        <?php foreach ($year_list as $item): ?>
        <a <?php if($item['selected']):?>class="active"<?php endif;?> href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
        <?php endforeach; ?>
    </li>
    <li class="list-group-item">排序&nbsp;&nbsp;
        <?php foreach ($sort_list as $item): ?>
        <a <?php if($item['selected']):?>class="active"<?php endif;?> href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
        <?php endforeach; ?>
    </li>
</ul>
<?php foreach ($filter_list as $item): ?>
<span class="label label-info"><?php echo $item['desc']?> 
<a href="<?php echo $item['url']?>">X</a></span>
<?php endforeach; ?>

</div>