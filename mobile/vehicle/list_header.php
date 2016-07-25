<style>
body {font-family:"Comic Sans MS","幼圆","黑体",sans-serif;font-size:12px;background:#f5f2f2;color:#212121;}
a{text-decoration: none;color:#212121;}
a:hover{text-decoration:none;}
.header{width:100%;height:44px;line-height:44px;background:#fff;border-bottom:1px solid #dedede;}
.logo{width:94px;height:44px;position:absolute;left:50%;margin-left:-47px;}

.sisebox{width:100%;height:100%;position:fixed;left:0;top:0;z-index:99999;background: rgba(0,0,0,.60);}  
.sisecont{width:100%;background:#fff;z-index:999;position:fixed;left:0;bottom:0;-webkit-animation-duration:0.5s;animation-duration:0.5s;-webkit-animation-name:fadeInUp;animation-name:fadeInUp;}  
@-webkit-keyframes fadeInUp{0%{opacity:1;-webkit-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0)}100%{opacity:1;-webkit-transform:none;transform:none}}
@keyframes fadeInUp{0%{opacity:1;-webkit-transform:translate3d(0, 100%, 0);-ms-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0)}100%{opacity:1;-webkit-transform:none;-ms-transform:none;transform:none}}

.searchbox{width:100%;height:100%;position:fixed;left:0;top:0;z-index:99999;background: rgba(0,0,0,.60);}  
.searchcont{width:100%;background:#fff;z-index:999;position:fixed;left:0;top:0;}  

</style>

<div class="header">
	<div class="city-selection">
    	<a id="list_change_city_btn" style="float:left;margin-left: 10px;">
        	<i class="icono-pin" style="width: 14px; height: 14px;color: #888"></i><?php echo $city_info['city_name']?>
        </a>
	</div>
    <div class="logo" style="background: url(http://m.haocheweb.com/img/logo_new.png) no-repeat center 7px; background-size:auto 28px; height: 43px;"></div>
    <a id="search_btn" style="float: right; height: 43px;line-height: 44px; margin-right: 10px;">
        <i class="glyphicon glyphicon-search" style="color: red; font-size: 16px;"></i>
    </a>
</div>

<div id="city_pannel" class="sisebox" style="display:none;">
    <div class="sisecont">
        <ul class="list-group" style="margin-bottom: 0;">
            <?php foreach ($city_list as $item):?>
        	<li class="list-group-item"><a <?php if ($item['selected']):?>class="highlight-nav"<?php endif;?> href="<?php echo $item['url']?>"><?php echo $item['city_name']?></a></li>
        	<?php endforeach;?>
        </ul>
    </div>
</div>

<div id="search_pannel" class="searchbox" style="display:none;">
    <div class="searchcont">
        <form class="form-inline" method="get" action="<?php echo URL::site($city_info['city_pinyin'] . '/ershouche')?>">
            <div class="form-group" style="margin: 10px;">
                <input id="search-input" name="kw" type="text" class="form-control" placeholder="请输入关键字" required>
            </div>
        </form>
    </div>
</div>

<script>
$(function() {
	$("#list_change_city_btn").click(function(){
		$('#city_pannel').show();
		$('body').css({'overflow': 'hidden'});
	});
	$("#city_pannel").click(function(){
		$('#city_pannel').hide();
		$('body').css({'overflow': 'auto'});
	});
	$(".sisecont").click(function(e){
		e.stopPropagation();
	});

	$("#search_btn").click(function(){
		$('#search_pannel').show();
		$('#search-input').focus();
		$('body').css({'overflow': 'hidden'});
	});
	$("#search_pannel, #cancel_search_btn").click(function(){
		$('#search_pannel').hide();
		$('body').css({'overflow': 'auto'});
	});
	$(".searchcont").click(function(e){
		e.stopPropagation();
	});
});
</script>

<?= HTML::style('media/autocomplete/jquery.autocomplete.css')?>
<?= HTML::script('media/autocomplete/jquery.autocomplete.js')?>

<script>
$(function(){
	var base_url = '<?php echo URL::site($city_info['city_pinyin'] . '/ershouche')?>';
	$("#search-input").autocomplete({
		source:[{
			url:"/suggest?query=%QUERY%",
			type:'remote'
		}],
		render: function(item) {
			return '<li class="list-group-item"><a href="' + base_url + '?kw=' + item + '">'+item+'</a></li>';
		},
		valid: function () {
			return true;
		},
		dropdownStyle: {position:'relative', border: 'none', boxShadow: 'none', top: '1px'},
		limit: 10,
		visibleLimit: 10,
		openOnFocus: true
	}); 
});
</script>