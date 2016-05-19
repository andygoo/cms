
<?= HTML::style('media/css/header.css')?>
<?= HTML::style('media/css/ershouche.css')?>
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.css')?>
<?= HTML::script('media/js/iscroll.js')?>

<?php include __DIR__ . '/vehicle_list/list_header.php';?>
<?php include __DIR__ . '/vehicle_list/list_filter.php';?>

<?php if (!empty($filter_list)):?>
<div id="selected_options" class="sx-box-o">
    <div class="sx-box-l sx-ls">
        <?php foreach ($filter_list as $item):?>
        <div class="sx-l"><?php echo $item['desc']?><a href="<?php echo $item['url']?>"></a></div>
        <?php endforeach;?>
    </div>
</div>
<?php endif;?>

<div class="ck-sorting" style="background: #fff;">
    <div class="find-car">有<?php echo $total_items?>辆二手车
    <?php if (!empty($filter_list)):?>
    <a href="<?php echo URL::site('list')?>">[清除筛选]</a> 
    <?php endif;?>
    </div>
</div>

<style>
.media {margin-top: 1px; background:#fff; padding: 10px}
.media:first-child {margin-top: 1px;}
/*
.media {float: left; width: 50%; margin-top: 1px; background:#fff;}
.media:first-child {margin-top: 1px;}
.media:nth-child(odd){padding: 10px 5px 10px 10px;}
.media:nth-child(even){padding: 10px 10px 10px 5px;}
.media-left, .media-right {display: inline;}
.media-left {padding-right: 0px;}
.media-object {width: 100%;margin: 10px 0;}
*/
</style>
<div id="vehicle_list_container" class="list_car">
    <?php include __DIR__ . '/vehicle_list/list_vehicle.php';?>
</div>


<script>
var myScroll_b = myScroll_s = myScroll_more = myScroll_price = myScroll_sort = null;
$(function() {

	function filter_tab_click(id) {
		var t = $('#a'+id);
		if ($('#a'+id+'_content').is(":hidden")) {
			$('body').css({'overflow': 'hidden'});
			$('#vehicle_filter').addClass('fixed');
			$('#a'+id+'_content').show().siblings('.filter_option').hide();
            $('.class1').removeClass('slided');
            t.addClass('slided').removeClass('no-hover');
		} else {
			$('body').css({'overflow': 'auto'});
			$('#vehicle_filter').removeClass('fixed');
			$('#a'+id+'_content').hide();
            t.removeClass('slided').addClass('no-hover');
		}
		if (id == 2) {
			if (!myScroll_b) {
    		    myScroll_b = new IScroll('#wrapper'+id, {mouseWheel: true, click: true, tap: true});
    	        var act_inx = $('#scroller'+id+' li.active').data('idx');
    	        myScroll_b.scrollToElement($('#scroller'+id+' li')[act_inx>0 ? act_inx : 0], null, null, true);
			}
			if ($('#scroller22 li.active').length) {
				$('#wrapper22').show();
				if (!myScroll_s) {
		    		myScroll_s = new IScroll('#wrapper22', { mouseWheel: true, click: true, tap: true });
		            var act_inx = $('#scroller22 li.active').index();
		            myScroll_s.scrollToElement($('#scroller22 li')[act_inx>0 ? act_inx : 0], null, null, true);
				}
			}
		} else {
			if(!myScroll_sort && id==1) {
				myScroll_sort = new IScroll('#wrapper1', {mouseWheel: true, click: true, tap: true});
			}
			if(!myScroll_price && id==3) {
				myScroll_price = new IScroll('#wrapper3', {mouseWheel: true, click: true, tap: true});
			}
			if(!myScroll_more && id==4) {
				myScroll_more = new IScroll('#wrapper4', {mouseWheel: true, click: true, tap: true});
			}
		}
	}
    $('.class1').click(function() {
    	var t = $(this);
    	filter_tab_click(t.data("id"));
    });
	
	$('#wrapper1, #wrapper3, #a4_content').click(function (event) {
		if (event.target.className.indexOf('close_box') != -1) {
		    var id = $(this).data("id");
		    filter_tab_click(id);
			return false;
		}
	});

	$('#scroller2 li').click(function () {
		if ($(this).hasClass('active')) {
			if (!myScroll_s) {
			    $('#wrapper22').show();
	    		myScroll_s = new IScroll('#wrapper22', { mouseWheel: true, click: true, tap: true });
	            var act_inx = $('#scroller22 li.active').index();
	            myScroll_s.scrollToElement($('#scroller22 li')[act_inx>0 ? act_inx : 0], null, null, true);
			}
		} else {
    		$(this).addClass('active').siblings().removeClass('active');
    		var url = $(this).find('a').data('url');
		    var params = {};
		    params.get_vehicle_series = 1;
    		$.get(url, params, function(res) {
    		    $('#wrapper22 ul').html(res);
    		    $('#wrapper22').show();
        		myScroll_s = new IScroll('#wrapper22', { mouseWheel: true, click: true, tap: true });
                var act_inx = $('#scroller22 li.active').index();
                myScroll_s.scrollToElement($('#scroller22 li')[act_inx>0 ? act_inx : 0], null, null, true);
    		});
		}
	});

	$(document).on('click', '#a4_content ul li', function() {
    	var url = $(this).find('a').data('url');
    	$('#comform_filter_btn').attr('href', url);
	    var params = {};
	    params.get_vehicle_count = 1;
    	$.get(url, params, function(res) {
	    	$('#scroller4').html(res);
	    });
	    return false;
	});

	$(window).scroll(function() {
		if ($(this).scrollTop()>45) {
			$('#vehicle_filter').addClass('fixed');
		} else {
			$('#vehicle_filter').removeClass('fixed');
		}
	});
	$(window).scroll();
});

$(function() {
	var loading = false;
    var curr_page = <?php echo intval($curr_page)?>;
    var total_pages = <?php echo intval($total_pages)?>;
    var page_url = '<?php echo $page_url?>';

	if (window.sessionStorage) {
		if (sessionStorage.getItem("listurl") == location.href) {
    	    if (sessionStorage.getItem("carlist")) {
    	        $("#vehicle_list_container").html(sessionStorage.getItem("carlist")); 
    	    }
    	    if (sessionStorage.getItem("page_index")) {
    	        curr_page = sessionStorage.getItem("page_index");
    	    }
		}
	}
	$(window).scroll(function() {
		var pa = $(document).height()-$(this).height()-$(this).scrollTop() < 50;
		if(pa && !loading) {
			curr_page += 1;
			if(curr_page <= total_pages) {
			    loading = true;
	    		var url = page_url + '/p' + curr_page;
	    		$.post(url, function(data) {
	    		    $("#vehicle_list_container").append(data);
	    			loading = false;

	    			if (window.sessionStorage) {
	    				if (curr_page < 16) {
	    					sessionStorage.setItem("listurl", location.href); 
	    					sessionStorage.setItem("carlist", $("#vehicle_list_container").html());
	    					sessionStorage.setItem("page_index", curr_page); 
	    				}
	    			}
	    		});
			}
		}
	});
	
});
</script>