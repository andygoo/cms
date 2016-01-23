var PageTransitions = (function() {

	var $main = $('#pt-main'),
		$pages = $main.children('div.pt-page'),
		current = 0,
		isAnimating = false,
		endCurrPage = false,
		endNextPage = false,
		animEndEventNames = {
			'WebkitAnimation' : 'webkitAnimationEnd',
			'OAnimation' : 'oAnimationEnd',
			'msAnimation' : 'MSAnimationEnd',
			'animation' : 'animationend'
		},
		animEndEventName = animEndEventNames[Modernizr.prefixed('animation')],
		support = Modernizr.cssanimations;
	
	function init(current) {
		$pages.each(function() {
			var $page = $(this);
			$page.data('originalClassList', $page.attr('class'));
		});

		this.current = current;
		$pages.eq(this.current).addClass('pt-page-current');
	}

	function nextPage(animation, current) {
		if(isAnimating) {
			return false;
		}
		isAnimating = true;
		
		var $currPage = $pages.eq(this.current);

		if (current == 0) {
			this.current = 0;
		} else {
			if (this.current == 1) {
				this.current = 2;
			} else {
				this.current = 1;
			}
		}
		var $nextPage = $pages.eq(this.current).addClass('pt-page-current'),
			outClass = '', inClass = '';

		switch(animation) {
			case 'left':
				outClass = 'pt-page-moveToLeft';
				inClass = 'pt-page-moveFromRight';
				break;
			case 'right':
				outClass = 'pt-page-moveToRight';
				inClass = 'pt-page-moveFromLeft';
				break;
		}

		$currPage.addClass(outClass).on(animEndEventName, function() {
			$currPage.off(animEndEventName);
			endCurrPage = true;
			if(endNextPage) {
				onEndAnimation($currPage, $nextPage);
			}
		});

		$nextPage.addClass(inClass).on(animEndEventName, function() {
			$nextPage.off(animEndEventName);
			endNextPage = true;
			if(endCurrPage) {
				onEndAnimation($currPage, $nextPage);
			}
		});

		if(!support) {
			onEndAnimation($currPage, $nextPage);
		}
	}

	function onEndAnimation($outpage, $inpage) {
		endCurrPage = false;
		endNextPage = false;
		resetPage($outpage, $inpage);
		isAnimating = false;
	}

	function resetPage($outpage, $inpage) {
		$outpage.attr('class', $outpage.data('originalClassList'));
		$inpage.attr('class', $inpage.data('originalClassList') + ' pt-page-current');
	}

	return {init: init, next: nextPage};

})();