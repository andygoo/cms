<style>
body {font-family:"Comic Sans MS","幼圆","黑体",sans-serif;font-size:12px;background:#f5f2f2;color:#212121;}
a{text-decoration: none;color:#212121;}
a:hover{text-decoration:none;}
.header{width:100%;height:44px;line-height:44px;background:#fff;border-bottom:1px solid #dedede;}
.logo{width:94px;height:44px;position:absolute;left:50%;margin-left:-47px;}
.sisebox2{width:100%;height:100%;position:fixed;left:0;top:0;z-index:99999;background: rgba(0,0,0,.60);}  
</style>

<div class="header">
	<div class="city-selection">
    	<a id="list_change_city_btn" style="float:left;margin-left: 10px;">
        	<i class="icono-pin" style="width: 14px; height: 14px;color: #888"></i><?php echo $city_info['city_name']?>
        </a>
	</div>
    <div class="logo" style="background: url(http://m.haocheweb.com/img/logo_new.png) no-repeat center 7px; background-size:auto 28px; height: 43px;"></div>
    <a id="search_button" style="float: right; height: 43px;line-height: 44px; margin-right: 10px;">
        <i class="glyphicon glyphicon-search" style="color: red; font-size: 16px;"></i>
    </a>
</div>

<div id="city_pannel" class="sisebox2" style="display:none;">
    <div class="sisecont" style="padding: 30px;">
        <ul>
            <?php foreach ($city_list as $item):?>
        	<li><a <?php if ($item['selected']):?>class="highlight-nav"<?php endif;?> href="<?php echo $item['url']?>"><?php echo $item['city_name']?></a></li>
        	<?php endforeach;?>
        </ul>
    </div>
</div>

<script>
$(function() {
	$("#city-selection,#list_change_city_btn").click(function(){
		$('#city_pannel').show();
		$('body').css({'overflow': 'hidden'});
	});
	$("#close_city_pannel, #city_pannel").click(function(){
		$('#city_pannel').hide();
		$('body').css({'overflow': 'auto'});
	});
	$(".sisecont").click(function(e){
		e.stopPropagation();
	});
});
</script>