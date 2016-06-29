<style>
#vehicle_filter {font-size: 14px;}
#vehicle_filter.dl-horizontal dt {text-align: left;width: 50px;padding: 2px 5px; margin: 5px 0;}
#vehicle_filter.dl-horizontal dd {margin-left: 50px;}
#vehicle_filter.dl-horizontal .nav > li > a {padding: 2px 5px; margin: 5px 0;border-radius: 1px;}
</style>


<div class="container">
<dl class="dl-horizontal" id="vehicle_filter">
    <dt>品牌</dt>
    <dd>
        <ul class="nav nav-pills">
          <?php foreach ($brand_list['B'] as $item): ?>
          <li class="<?php if($item['selected']):?>active<?php endif;?>">
            <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
          </li>
          <?php endforeach; ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">更多 <span class="caret"></span></a>
          </li>
        </ul>
    </dd>
    <?php if (!empty($series_list)):?>
    <dt>车系</dt>
    <dd>
        <ul class="nav nav-pills">
          <?php foreach ($series_list as $item): ?>
          <li class="<?php if($item['selected']):?>active<?php endif;?>">
            <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
          </li>
          <?php endforeach; ?>
        </ul>
    </dd>
    <?php endif;?>
    <dt>价格</dt>
    <dd>
        <ul class="nav nav-pills">
          <?php foreach ($price_list as $item): ?>
          <li class="<?php if($item['selected']):?>active<?php endif;?>">
            <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
          </li>
          <?php endforeach; ?>
        </ul>
    </dd>
    <dt>车龄</dt>
    <dd>
        <ul class="nav nav-pills">
          <?php foreach ($year_list as $item): ?>
          <li class="<?php if($item['selected']):?>active<?php endif;?>">
            <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
          </li>
          <?php endforeach; ?>
        </ul>
    </dd>
    <dt>排序</dt>
    <dd>
        <ul class="nav nav-pills">
          <?php foreach ($sort_list as $item): ?>
          <li class="<?php if($item['selected']):?>active<?php endif;?>">
            <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
          </li>
          <?php endforeach; ?>
        </ul>
    </dd>
</dl>
</div>

