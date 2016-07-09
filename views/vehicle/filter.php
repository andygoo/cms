

<div class="container-fluid" style="margin-top: 30px">
    <ul class="collection z-depth-0">
        <li class="collection-item">
            <ul class="pagination">
            <li style="font-size:14px;margin-right:5px;">品牌</li>
            <?php foreach ($brand_top_list as $item): ?>
            <li class="<?php if($item['selected']):?>active<?php endif;?>" style="font-size:12px">
                <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            </li>
            <?php endforeach; ?>
            </ul>
        </li>
        <?php if (!empty($series_list)):?>
        <li class="collection-item">
            <ul class="pagination">
            <li style="font-size:14px;margin-right:5px;">车系</li>
            <?php foreach ($series_list as $item): ?>
            <li class="<?php if($item['selected']):?>active<?php endif;?>" style="font-size:12px">
                <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            </li>
            <?php endforeach; ?>
            </ul>
        </li>
        <?php endif;?>
        <li class="collection-item">
            <ul class="pagination">
            <li style="font-size:14px;margin-right:5px;">价格</li>
            <?php foreach ($price_list as $item): ?>
            <li class="<?php if($item['selected']):?>active<?php endif;?>" style="font-size:12px">
                <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            </li>
            <?php endforeach; ?>
            <li class="" style="font-size:12px">
                <input id="c_price_f" type="text" value="<?= $custom_price['price_f']?>" style="height:30px;margin-bottom:-11px; float:left;width: 60px">&nbsp;&nbsp;
                <input id="c_price_t" type="text" value="<?= $custom_price['price_t']?>" style="height:30px;margin-bottom:-11px; float:left;margin-left: 5px;width: 60px">
                <a class="btn" data-href="<?= $custom_price['url']?>" id="c_price_btn" style="height:30px;color:#fff; padding-top:4px;">提交</a>
            </li>
            </ul>
        </li>
        <li class="collection-item">
            <ul class="pagination">
            <li style="font-size:14px;margin-right:5px;">车龄</li>
            <?php foreach ($year_list as $item): ?>
            <li class="<?php if($item['selected']):?>active<?php endif;?>" style="font-size:12px">
                <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            </li>
            <?php endforeach; ?>
            </ul>
        </li>
        <li class="collection-item">
            <ul class="pagination">
            <li style="font-size:14px;margin-right:5px;">里程</li>
            <?php foreach ($miles_list as $item): ?>
            <li class="<?php if($item['selected']):?>active<?php endif;?>" style="font-size:12px">
                <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            </li>
            <?php endforeach; ?>
            </ul>
        </li>
        <li class="collection-item">
            <ul class="pagination">
            <li style="font-size:14px;margin-right:5px;">排序</li>
            <?php foreach ($sort_list as $item): ?>
            <li class="<?php if($item['selected']):?>active<?php endif;?>" style="font-size:12px">
                <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            </li>
            <?php endforeach; ?>
            </ul>
        </li>
    </ul>
</div>
