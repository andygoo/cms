
<style>
dl {margin-bottom: 0px;}
.dl-horizontal dt {width: auto;line-height: 28px;}
.dl-horizontal dd {margin-left: 50px;line-height: 28px;}
.dl-horizontal dd a {font-size: 12px;color: #222;margin-right:15px;}
.dl-horizontal dd a.active {color: #fff;background-color: #ff2626;border-radius: 2px;padding:3px 6px;}

.list-group-item {
	border-left: 0px;
	border-right: 0px;
	border-top: 0px;
	margin-bottom: 0px;
	border-color: #f3f3f3;
}
.list-group-item:first-child {
    border-top-right-radius: 0px;
    border-top-left-radius: 0px;
}
.list-group-item:last-child {
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;
}

#brand_more_block {display: none;position: absolute; top: 49px; background: #fff;z-index: 1;margin: 0 15px; padding: 15px; border: 1px solid #d00}
#brand_more_block a {font-size: 14px;color: #222;margin-right:15px;line-height: 24px;}
#brand_more_block a.active {color: #fff;background-color: #ff2626;border-radius: 2px;padding:3px 6px;}
</style>

<div class="container" style="margin-top: 30px; position:relative">
    <div class="row">
        <div id="brand_more_block">
        <?php foreach ($brand_list as $k => $v): ?>
            <span style="color: #d00;font-weight:bold"><?= strtoupper($k);?></span> 
            <?php foreach ($v as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?= $item['url'];?>"><?= $item['desc'];?></a>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>品牌</dt>
            <dd>
            <?php foreach ($brand_top_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            <?php endforeach; ?>
            <div id="brand_more_btn" class="pull-right">更多 <span class="caret"></span></div>
            </dd>
            </dl>
        </li>
        <?php if (!empty($series_list)):?>
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>车系</dt>
            <dd>
            <?php foreach ($series_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            <?php endforeach; ?>
            </dd>
            </dl>
        </li>
        <?php endif;?>
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>价格</dt>
            <dd>
            <?php foreach ($price_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            <?php endforeach; ?>
            <input id="c_price_f" type="text" class="form-control" style="display:inline;width: 50px;height: 30px;" value="<?= $custom_price['price_f']?>">
            <input id="c_price_t" type="text" class="form-control" style="display:inline;width: 50px;height: 30px;" value="<?= $custom_price['price_t']?>">
            <a class="btn btn-danger" data-href="<?= $custom_price['url']?>" style="height: 30px;line-height: 30px;padding-top: 0;color:#fff" id="c_price_btn">提交</a>
            </dd>
            </dl>
        </li>
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>车龄</dt>
            <dd>
            <?php foreach ($year_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            <?php endforeach; ?>
            </dd>
            </dl>
        </li>
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>里程</dt>
            <dd>
            <?php foreach ($miles_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            <?php endforeach; ?>
            </dd>
            </dl>
        </li>
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>排序</dt>
            <dd>
            <?php foreach ($sort_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            <?php endforeach; ?>
            </dd>
            </dl>
        </li>
    </ul>
</div>

<div class="clearfix"></div>