
var loading = false;
var timer = null;
var wh = $(window).height();
var curr_page = 0;
var home_url = 'http://'+location.host+'/';
var curr_url = location.href;
var home_content = curr_url==home_url ? true : false;
var currentState = {
    url: home_url,
    title: document.title,
}
var loading_html = '<div class="page-loading"><div class="page-loading-logo"><div class="page-loading-anim"></div></div><div class="page-loading-text">加载中，请稍候...</div></div>';
$(function() {

	function set_home_content(res) {
        $('#home_page').html(res);
    	$('#swiper').find('.swiper-slide').attr('style', 'height:'+(wh-50-42)+'px;overflow:auto');
    	$('#other_page1').html(loading_html);
    	$('#other_page2').html(loading_html);
    }

	function set_detail_content(res) {
		if (curr_page == 1) {
		    $('#other_page1').html(res).attr('style', 'height:'+(wh-50)+'px;overflow:auto');
		    $('#other_page2').html(loading_html);
		} else {
		    $('#other_page2').html(res).attr('style', 'height:'+(wh-50)+'px;overflow:auto');
		    $('#other_page1').html(loading_html);
		}
	}
	
	function init(url) {
		loading = true;
    	if (url == home_url) {
    	    PageTransitions.init(0);
    	    curr_page = 0;
    	    $.get(url, function(res) {
    	    	setTimeout(function() {
        	    	set_home_content(res);
                	loading = false;
    	    	}, 300);
    	    });
    	} else {
    	    PageTransitions.init(1);
    	    curr_page = 1;
    	    $.get(url, function(res) {
    	    	setTimeout(function() {
        	    	set_detail_content(res);
                	loading = false;
    	    	}, 300);
    	    });
    	}
	}
	function push(url) {
		loading = true;
	    history.pushState({url: url, title: document.title}, null, url);
    	if (url == home_url) {
    	    PageTransitions.next('left', 0);
    	    curr_page = 0;
    	    $.get(url, function(res) {
    	    	setTimeout(function() {
        	    	set_home_content(res);
                	loading = false;
    	    	}, 500);
    	    });
    	} else {
    	    PageTransitions.next('left');
    	    curr_page = curr_page==1 ? 2 : 1;
    	    $.get(url, function(res) {
    	    	setTimeout(function() {
        	    	set_detail_content(res);
                	loading = false;
    	    	}, 500);
    	    });
    	}
	}

	function prev(url) {
		timer = setInterval(function() {
			if (loading == false) {
				clearInterval(timer);
				if (url == home_url) {
				    PageTransitions.next('right', 0);
            	    curr_page = 0;
                	if (home_content == false) {
                	    $.get(url, function(res) {
                			setTimeout(function() {
                    	    	set_home_content(res);
                    	    	home_content = true;
                	    	}, 500);
                	    });
                	}
    			    setTimeout(function() {
    			    	$('#other_page2').html(loading_html);
    			    	$('#other_page1').html(loading_html);
    				}, 500);
				} else {
				    PageTransitions.next('right');
		    	    curr_page = curr_page==1 ? 2 : 1;
	        	    $.get(url, function(res) {
	        			setTimeout(function() {
	            	    	set_detail_content(res);
	        	    	}, 500);
	        	    });
				}
			}
		}, 20);
	}
    init(location.href);

    window.addEventListener("popstate",function(event) {
        if(event && event.state) {
            console.log('next');
            console.log(event.state);
            document.title = event.state.title;
            var url = event.state.url;
            prev(url);
        } else{
            console.log('prev');
            console.log(currentState);
            document.title = currentState.title;
            var url = currentState.url;
            prev(url);
        }
    });
	$(document).on('click', '.ajax-click', function() {
		var t = $(this);
		var url = this.href || t.data('url');
		if (url != location.href) {
			push(url);
		}
	    return false;
	});
	$(document).on('click', '.ajax-link', function() {
		var t = $(this);
		var url = this.href || t.data('url');
	    $.get(url, function(res) {
		    if (res.next_page != '') {
		        t.before(res.content);
		        t.data('url', res.next_page);
		    } else {
		        t.hide();
		    }
	    });
	    return false;
	});
});
