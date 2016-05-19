<div class="header">
	<div class="city-selection"><a id="list_change_city_btn"><?php echo $city_info['city_name']?></a></div>
    <div id="city_pannel" class="sisebox" style="display:none;">
        <div class="sisecont">
            <div class="sisetext">
            	<div class="segeli">
                    <ul>
                        <?php foreach ($city_list as $item):?>
                    	<li><a <?php if ($item['selected']):?>class="highlight-nav"<?php endif;?> href="<?php echo $item['url']?>"><?php echo $item['city_name']?></a></li>
                    	<?php endforeach;?>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="opening">其他城市陆续开通中...</div>           
            </div>
        </div>
    </div>
    <a class="lgico4new" style="height: 43px;" id="search_button"></a>
    <div id="search_pannel" class="searchbox" style="display:none;">
        <?php include __DIR__ . '/search.php';?>
    </div>
    <div class="logo" style="background-image: url(http://m.haocheweb.com/img/logo_new.png);height: 43px;"></div>
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
	$('#search_button').click(function(){
		$('#search_pannel').show();
		$('body').css({'overflow': 'hidden'});
	});
	$('#cancel_search_btn').click(function(){
		$('#search_pannel').hide();
		$('body').css({'overflow': 'auto'});
	});
});
</script>