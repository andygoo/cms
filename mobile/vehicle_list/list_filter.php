
<div class="ln-nav">
    <div id="vehicle_filter" class="ln-nav">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="25%" class="yb-t"><a data-id="2" id="a2" class="class1"><span>品牌</span><i></i></a></td>
            <td width="25%" class="yb-t"><a data-id="3" id="a3" class="class1"><span>价格</span><i></i></a></td>
            <td width="25%" class="yb-t"><a data-id="1" id="a1" class="class1 order1"><span>默认排序</span><i></i></a></td>
            <td width="25%"><a data-id="4" id="a4" class="class1"><span>更多</span><i></i></a></td>
        </tr>
        </table>
    </div>
</div>


<div id="a1_content" class="filter_option">
    <div id="wrapper1" data-id="1" class="close_box">
    	<div id="scroller1">
    	    <div class="px-box">
        		<ul>
                    <?php foreach ($sort_list as $sort): ?>
                    <li <?php if($sort['selected']):?>class="active"<?php endif;?>><a href="<?php echo $sort['url']?>"><?php echo $sort['desc'];?></a></li>
                    <?php endforeach; ?>
        		</ul>
    		</div>
    	</div>
    </div>
</div>

<div id="a3_content" class="filter_option">
    <div id="wrapper3" data-id="3" class="close_box">
    	<div id="scroller3">
    	    <div class="px-box">
        		<ul>
                    <?php foreach ($price_list as $sort): ?>
                    <li <?php if($sort['selected']):?>class="active"<?php endif;?>><a href="<?php echo $sort['url']?>"><?php echo $sort['desc'];?></a></li>
                    <?php endforeach; ?>
        		</ul>
    		</div>
    	</div>
    </div>
</div>

<div id="a2_content" class="filter_option">
    <div id="wrapper2">
    	<div id="scroller2">
        	<div class="brand_sx">
        	    <a href="<?php echo URL::site(Request::instance()->uri(array('brand_id'=>'', 'series_id'=>'', 'page'=>'')));?>">不限品牌</a>
        		<ul>
        		    <?php $idx = 0?>
                    <?php foreach ($brand_list as $k => $v): ?>
                        <span><b><?php echo strtoupper($k);?></b></span>
                        <?php foreach ($v as $item): ?>
                            <li data-idx="<?php echo $idx++?>" <?php if($item['selected']):?>class="active"<?php endif;?>><a data-url="<?php echo $item['url'];?>"><b><img class="c-i" src="http://image3.hc51img.com/fev2/carb8/<?php echo $item['id'];?>.png"><?php echo $item['desc'];?></b></a></li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
        		</ul>
        	</div>
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

    <div class="fixed-ck" style="z-index:9999; position: fixed; bottom: 0; left: 0">
    	<div>
    		<div>为您找到 <span id="vehicle_count"></span> 辆车</div>
    		<div><a id="comform_filter_btn" href="">查看</a></div>
        	<div></div>
        </div>
    </div>
</div>

<div class="clear"></div>