

<div class="container-fluid" style="margin-top: 30px">
    <ul class="collection z-depth-0">
        <li class="collection-item">
            <ul class="ma-pagination">
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
            <ul class="ma-pagination">
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
            <ul class="ma-pagination">
            <li style="font-size:14px;margin-right:5px;">价格</li>
            <?php foreach ($price_list as $item): ?>
            <li class="<?php if($item['selected']):?>active<?php endif;?>" style="font-size:12px">
                <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            </li>
            <?php endforeach; ?>
            <li class="" style="font-size:12px">
                <input id="c_price_f" type="text" class="form-control" style="width: 50px;float:left;margin-right:5px;" value="<?= $custom_price['price_f']?>">
                <input id="c_price_t" type="text" class="form-control" style="width: 50px;float:left;margin-right:5px;" value="<?= $custom_price['price_t']?>">
                <a class="btn btn-info" data-href="<?= $custom_price['url']?>" style="color: #fff" id="c_price_btn">提交</a>
            </li>
            </ul>
        </li>
        <li class="collection-item">
            <ul class="ma-pagination">
            <li style="font-size:14px;margin-right:5px;">车龄</li>
            <?php foreach ($year_list as $item): ?>
            <li class="<?php if($item['selected']):?>active<?php endif;?>" style="font-size:12px">
                <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            </li>
            <?php endforeach; ?>
            </ul>
        </li>
        <li class="collection-item">
            <ul class="ma-pagination">
            <li style="font-size:14px;margin-right:5px;">里程</li>
            <?php foreach ($miles_list as $item): ?>
            <li class="<?php if($item['selected']):?>active<?php endif;?>" style="font-size:12px">
                <a href="<?php echo $item['url']?>"><?php echo $item['desc'];?></a>
            </li>
            <?php endforeach; ?>
            </ul>
        </li>
        <li class="collection-item">
            <ul class="ma-pagination">
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
