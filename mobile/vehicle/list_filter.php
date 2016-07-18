
<style>
#vehicle_filter {background:#fff;text-align: center;height: 44px;line-height: 44px;margin:0;border-bottom:1px solid #dedede;}
#vehicle_filter.fixed {position:fixed; top: 0; left:0; width: 100%; z-index: 9999}
#vehicle_filter .col-xs{border-right: 1px solid #dedede;}
#vehicle_filter .col-xs:last-child{border-right: none;}
#vehicle_filter .col-xs.dropup{color: #d00;}
#vehicle_filter .caret {opacity: 0.6;}
</style>
<div class="row" id="vehicle_filter">
    <div class="col-xs class1" id="a2" data-id="2">
        <span>品牌</span> <span class="caret"></span>
    </div>
    <div class="col-xs class1" id="a3" data-id="3">
        <span>价格</span> <span class="caret"></span>
    </div>
    <div class="col-xs class1" id="a1" data-id="1">
        <span>排序</span> <span class="caret"></span>
    </div>
    <div class="col-xs class1" id="a4" data-id="4">
        <span>更多</span> <span class="caret"></span>
    </div>
</div>

<style>
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
.list-group-item.active {
    background-color: #fff;
	border-color: #f3f3f3;
}
.list-group-item.active a {
    color: #d00;
}
.filter_option .list-group-item img {
    width: 25px;
    height: 25px;
    margin-right: 6px;
}
.filter_option {
	display: none;
}

#scroller2 .list-group-item {padding: 6px 15px;}
#scroller2 .list-group-item.active a:before {content:"";position:absolute;right:50%;top:10px;width:0;height:0;border-top:9px solid transparent;border-bottom:9px solid transparent;border-right:10px solid #f5f5f5; }
#scroller22 .list-group-item {background: #f5f5f5;border-color:#fafafa}
</style>
<div id="a1_content" class="filter_option">
    <div id="wrapper1" data-id="1" class="close_box">
    	<div id="scroller1">
    		<ul class="list-group">
                <?php foreach ($sort_list as $item): ?>
                <li class="list-group-item <?php if($item['selected']):?> active<?php endif;?>"><a href="<?= $item['url']?>"><?= $item['desc'];?></a></li>
                <?php endforeach; ?>
    		</ul>
    	</div>
    </div>
</div>

<div id="a3_content" class="filter_option">
    <div id="wrapper3" data-id="3" class="close_box">
    	<div id="scroller3">
    	    <ul class="list-group">
                <?php foreach ($price_list as $item): ?>
                <li class="list-group-item <?php if($item['selected']):?> active<?php endif;?>"><a href="<?= $item['url']?>"><?= $item['desc'];?></a></li>
                <?php endforeach; ?>
    		</ul>
    	</div>
    </div>
</div>

<div id="a2_content" class="filter_option">
    <div id="wrapper2">
    	<div id="scroller2">
    		<ul class="list-group">
    	        <li class="list-group-item" style="padding:10px 15px;"><a href="<?= URL::site(Request::instance()->uri(array('brand_id'=>'', 'series_id'=>'', 'page'=>'')));?>">不限品牌</a></li>
    		    <?php foreach ($brand_list as $k => $v): ?>
                    <li class="list-group-item" style="background:#f5f5f5;padding:3px 15px;"><?= strtoupper($k);?></li>
                    <?php foreach ($v as $item): ?>
                        <li class="list-group-item <?php if($item['selected']):?> active<?php endif;?>">
                            <a data-url="<?= $item['url'];?>">
                                <img src="http://image3.hc51img.com/fev2/carb8/<?= $item['id'];?>.png">
                                <?= $item['desc'];?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
    		</ul>
    	</div>
    </div>
    <div id="wrapper22">
    	<div id="scroller22">
            <?php include __DIR__ . '/list_series.php';?>
    	</div>
    </div>
</div>

<div id="a4_content" class="filter_option close_box" data-id="4">
    <div id="wrapper4">
    	<div id="scroller4">
            <?php include __DIR__ . '/list_more.php';?>
        </div>
    </div>
    <div class="row" style="z-index:9999; position: fixed; bottom: 60px; left: 0; width: 100%; height: 44px; line-height: 44px;font-size:14px; text-align: center; margin: 0;">
        <div class="col-xs-8" style="background: #fff;color: #222;font-size: 13px;border-top:1px solid #eee">为您找到 <span id="vehicle_count"><?= $total_items?></span> 辆车</div>
        <div class="col-xs-4" style="background: #dd0000;color: #fff"><a id="comform_filter_btn" href="" style="color: #fff">查看</a></div>
    </div>
</div>

<div class="clear"></div>