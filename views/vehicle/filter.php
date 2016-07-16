
<style>
dl {margin-bottom: 0px;}
.dl-horizontal dt {width: auto;line-height: 28px;}
.dl-horizontal dd {margin-left: 50px;line-height: 28px;}
.dl-horizontal dd a.active {color: #fff;background-color: #ee6e73;border-radius: 2px;padding:3px 6px;}
</style>

<div class="container" style="margin-top: 40px">
    <ul class="list-group">
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>品牌</dt>
            <dd>
            <?php foreach ($brand_top_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
            <?php endforeach; ?>
            </dd>
            </dl>
        </li>
        <?php if (!empty($series_list)):?>
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>车系</dt>
            <dd>
            <?php foreach ($series_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
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
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
            <?php endforeach; ?>
                <input id="c_price_f" type="text" class="form-control" style="display:inline;width: 50px;height: 30px;" value="<?= $custom_price['price_f']?>">
                <input id="c_price_t" type="text" class="form-control" style="display:inline;width: 50px;height: 30px;" value="<?= $custom_price['price_t']?>">
                <a class="btn btn-danger" data-href="<?= $custom_price['url']?>" style="height: 30px;line-height: 30px;padding-top: 0;" id="c_price_btn">提交</a>
            </dd>
            </dl>
        </li>
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>车龄</dt>
            <dd>
            <?php foreach ($year_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
            <?php endforeach; ?>
            </dd>
            </dl>
        </li>
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>里程</dt>
            <dd>
            <?php foreach ($miles_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
            <?php endforeach; ?>
            </dd>
            </dl>
        </li>
        <li class="list-group-item">
            <dl class="dl-horizontal">
            <dt>排序</dt>
            <dd>
            <?php foreach ($sort_list as $item): ?>
                <a class="<?php if($item['selected']):?>active<?php endif;?>" href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>&nbsp;&nbsp;
            <?php endforeach; ?>
            </dd>
            </dl>
        </li>
    </ul>
</div>

<div class="clearfix"></div>