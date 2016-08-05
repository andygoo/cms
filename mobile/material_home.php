
<?= HTML::style('media/swiper/css/swiper.min.css')?>
<style>
.swiper-pagination-bullet {
    width:initial;
    height:48px;
    display:initial;
    border-radius:initial;
    background:initial;
    opacity:initial;
}
.mdl-layout.is-upgraded .mdl-layout__tab.is-active::after {
    -webkit-animation: none;
    animation: none;
    transition: none;
}
.mdl-layout.is-upgraded .mdl-layout__tab-panel {display: block}
.mdl-layout__tab-bar {height:48px;;}
</style>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" sidebarjs-toggle>
            <i class="mdicon menu"></i>
        </button>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">首页</span>
        <div class="mdl-layout-spacer"></div>
        <!-- 
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                <i class="mdicon search" style="line-height: 36px;"></i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" id="search">
            </div>
        </div>
         -->
        <nav class="mdl-navigation">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="mdicon more-vert"></i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item">About</li>
                <li class="mdl-menu__item">Contact</li>
            </ul>
        </nav>
    </div>
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
        <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
        <a href="#fixed-tab-2" class="mdl-layout__tab">Tab 2</a>
    </div>
</header>

<main class="mdl-layout__content">
    
    <div id="swiper" class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" data-hash="slide1" style="height: 300px;overflow: auto;">
                <div class="mdl-layout__tab-panel" id="fixed-tab-1">
                    <div class="mdl-grid mdl-grid--no-spacing" style="padding: 5px;">
                        <?php foreach (range(1, 6) as $item):?>
                        <div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--12-col-phone" style="margin: 5px;">
                            <div class="demo-card-square mdl-card mdl-shadow--2dp" style="width: 100%;height: 320px;">
                                <div class="mdl-card__title mdl-card--expand" style="background:url(http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/1/w/480/h/300) center / cover;">
                                    <h2 class="mdl-card__title-text"></h2>
                                </div>
                                <div class="mdl-card__supporting-text" style="line-height:24px;font-size: 16px;color: rgba(0,0,0,.80);">北京现代ix35 2013款 2.0L 自动两驱智能型GLS 国IV</div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?php echo URL::site('material/detail')?>">
                                      Get Started
                                    </a>
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                        <i class="mdicon favorite-outline"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" data-hash="slide2">
                <div class="mdl-layout__tab-panel" id="fixed-tab-2">
                    <div class="mdl-grid mdl-grid--no-spacing" style="padding: 5px;">
                        <?php foreach (range(1, 6) as $item):?>
                        <div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--12-col-phone" style="margin: 5px;">
                            <div class="demo-card-square mdl-card mdl-shadow--2dp" style="width: 100%;height: 320px;">
                                <div class="mdl-card__title mdl-card--expand" style="background:url(http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/1/w/480/h/300) center / cover;">
                                    <h2 class="mdl-card__title-text"></h2>
                                </div>
                                <div class="mdl-card__supporting-text" style="line-height:24px;font-size: 16px;color: rgba(0,0,0,.80);">北京现代ix35 2013款 2.0L 自动两驱智能型GLS 国IV</div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?php echo URL::site('material/detail')?>">
                                      Get Started
                                    </a>
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                        <i class="mdicon favorite-outline"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>
</div>


<script>
//Check if a new cache is available on page load.
window.addEventListener('load', function(e) {
	var appCache = window.applicationCache;
	appCache.addEventListener('updateready', function(e) {
    if (appCache.status == appCache.UPDATEREADY) {
      // Browser downloaded a new app cache.
      // Swap it in and reload the page to get the new hotness.
      appCache.swapCache();
      //if (confirm('A new version of this site is available. Load it?')) {
        window.location.reload();
      //}
    }
  }, false);
}, false);
</script>

<?= HTML::script('media/swiper/js/swiper.jquery.min.js');?>
<script>
$(function() {
	var swiper = new Swiper('#swiper', {
	    pagination: '.mdl-layout__tab-bar',
	    hashnav:true,
	    paginationClickable: true,
	    paginationBulletRender: function (index, className) {
	        var cat = ['tab1','tab2'];
	        if (index==0) {
		        className = 'is-active ' + className;
	        }
	        return '<a href="#fixed-tab-'+(index+1)+'" class="mdl-layout__tab '+className+'">'+cat[index]+'</a>';
	    },
	    onSlideChangeEnd: function(swiper){
            var idx = swiper.activeIndex;
		    $('.mdl-layout__tab').eq(idx).addClass('is-active').siblings().removeClass('is-active');
	    }
	});
	$('.swiper-slide').css({'height': $(window).height()-158, 'overflow': 'auto'});
});
</script>
