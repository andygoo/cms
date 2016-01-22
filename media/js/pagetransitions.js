var PageTransitions = (function() {

	var $main = $('#pt-main'),
		$pages = $main.children('div.pt-page'),

		pagesCount = $pages.length,
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
		// animation end event name
		animEndEventName = animEndEventNames[ Modernizr.prefixed('animation') ],
		// support css animations
		support = Modernizr.cssanimations;
	
	function init(current) {
		this.current = current;
		console.log(this.current);
		$pages.each( function() {
			var $page = $( this );
			$page.data('originalClassList', $page.attr('class'));
		});

		$pages.eq( this.current ).addClass('pt-page-current');
	}

	function nextPage( animation ) {
		if( isAnimating ) {
			return false;
		}
		isAnimating = true;
		
		var $currPage = $pages.eq( this.current );

		console.log(this.current);
		console.log(pagesCount);
		if( this.current < pagesCount - 1 ) {
			++this.current;
		} else {
			this.current = 0;
		}
		
		console.log(this.current);

		var $nextPage = $pages.eq( this.current ).addClass('pt-page-current'),
			outClass = '', inClass = '';

		switch( animation ) {
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
			if( endNextPage ) {
				onEndAnimation( $currPage, $nextPage );
			}
		} );

		$nextPage.addClass( inClass ).on( animEndEventName, function() {
			$nextPage.off( animEndEventName );
			endNextPage = true;
			if( endCurrPage ) {
				onEndAnimation( $currPage, $nextPage );
			}
		} );

		if( !support ) {
			onEndAnimation( $currPage, $nextPage );
		}

	}

	function onEndAnimation( $outpage, $inpage ) {
		endCurrPage = false;
		endNextPage = false;
		resetPage( $outpage, $inpage );
		isAnimating = false;
	}

	function resetPage( $outpage, $inpage ) {
		$outpage.attr('class', $outpage.data('originalClassList'));
		$inpage.attr('class', $inpage.data('originalClassList') + ' pt-page-current');
	}

	return { init : init, next: nextPage};

})();