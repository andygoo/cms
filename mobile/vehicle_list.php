
<?= HTML::style('media/css/icono.min.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>
<?= HTML::style('media/bootstrap-3.3.5/css/bootstrap.css')?>
<?= HTML::style('media/css/vehicle/ershouche.css')?>
<style>
#a1_content, #a2_content, #a3_content, #a4_content {z-index: 9999;background: rgba(0,0,0,.60);}
#wrapper1, #wrapper2, #wrapper3, #wrapper4 {top: 0;bottom:0;right: 0;left: 20%;width: 80%;background: #fff;}
#wrapper22 {width: 40%;top: 0;bottom:0;right: 0;}
</style>

<?php include __DIR__ . '/vehicle/list_header.php';?>
<?php include __DIR__ . '/vehicle/list_filter.php';?>
<?php include __DIR__ . '/vehicle/list_selected.php';?>

<div class="panel panel-default" style="background: #fff; margin:10px 0 0;border-radius:0;border:none">
    <div class="panel-heading" style="background: #fff;">
        &nbsp;有<?php echo $total_items?>辆二手车
        <?php if (!empty($filter_list)):?><a href="<?php echo URL::site($city_info['city_pinyin'] . '/ershouche')?>">[清除筛选]</a> <?php endif;?>
    </div>
    <ul class="list-group" id="vehicle_list_container" style="">
        <?php include __DIR__ . '/vehicle/list_vehicle.php';?>
    </ul>
</div>

<?= HTML::script('media/js/iscroll.js')?>
<script>
var myScroll_b = myScroll_s = myScroll_more = myScroll_price = myScroll_sort = null;
$(function() {

	function filter_tab_click(id) {
		var t = $('#a'+id);
		t.toggleClass('dropup').siblings().removeClass('dropup');
		$('#a'+id+'_content').toggle().siblings('.filter_option').hide();
		
		if ($('#vehicle_filter').find('.dropup').length) {
			$('body').css({'overflow': 'hidden'});
			//$('#vehicle_filter').addClass('fixed');
		} else {
			$('body').css({'overflow': 'auto'});
			//if ($(this).scrollTop() <= 44) {
				//$('#vehicle_filter').removeClass('fixed');
			//}
		}
		
		if (id == 2) {
			if (!myScroll_b) {
    		    myScroll_b = new IScroll('#wrapper'+id, {mouseWheel: true, click: true, tap: true});
    	        var act_inx = $('#scroller'+id+' li.active').index();
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
	
	$('.close_box').click(function (event) {
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

	$(document).on('click', '#filter_more a', function() {
    	var url = $(this).data('url');
    	$('#comform_filter_btn').attr('href', url);
	    var params = {};
	    params.get_vehicle_count = 1;
    	$.get(url, params, function(res) {
	    	$('#scroller4').html(res);
	    });
	    return false;
	});

	$(window).scroll(function() {
		if ($(this).scrollTop()>44) {
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