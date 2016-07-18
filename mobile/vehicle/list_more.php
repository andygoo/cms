<style>
#filter_more .col-xs-4 {padding: 0;}
#filter_more a {display: block; text-align:center;margin: 5px; padding: 5px 0; background: #fff;color: #222;border: 1px solid #e7e7e7;}
#filter_more a.active {background: #fff0f0;border: 1px solid #ff2626;color: #ff2626;}
#filter_more .tit {background: #fafafa;color: #929292;padding: 5px 0 5px 10px;font-size: 10px;}
</style>
<div id="filter_more" style="padding-bottom: 40px;">
    <div class="tit">车龄</div>
    <div class="row" style="padding: 5px;margin:0">
        <?php array_shift($year_list)?>
        <?php foreach ($year_list as $key=>$item): ?>
        <div class="col-xs-4">
            <a data-url="<?php echo $item['url']?>" <?php if($item['selected']):?>class="active"<?php endif;?>><?php echo $item['desc']?></a>
        </div>
        <?php endforeach;?>
    </div>
    <div class="tit">里程</div>
    <div class="row" style="padding: 5px;margin:0">
        <?php array_shift($miles_list)?>
        <?php foreach ($miles_list as $key=>$item): ?>
        <div class="col-xs-4">
            <a data-url="<?php echo $item['url']?>" <?php if($item['selected']):?>class="active"<?php endif;?>><?php echo $item['desc']?></a>
        </div>
        <?php endforeach;?>
    </div>
</div>
