
<style>
.mdl-tabs__tab {font-size: 12px;color: #888;width: 100%;line-height:20px;padding-top:10px;}
.mdl-tabs__tab .mdicon {color: #888;}
.mdl-tabs__tab.is-active .mdicon {color: <?= $theme_color?>;}
.mdl-tabs.is-upgraded .mdl-tabs__tab.is-active {color: <?= $theme_color?>;}
.mdl-tabs__tab-bar {
position: fixed;left:0;bottom:0;background:#fff;width:100%;z-index:9;height: 57px;
box-shadow: 0 -2px 5px 0 rgba(0, 0, 0, 0.1), 0 -2px 10px 0 rgba(0, 0, 0, 0.05);
}
.mdl-list__item {background: #fff;margin-top:1px;}
.mdl-list__item-avatar {text-align: center;line-height: 40px;background-color:#efefef}
</style>

<?= HTML::style('media/swiper/css/swiper.min.css')?>
<style>
.swiper-container {
    width: 100%;
    height: 100%;
}
.swiper-slide {
    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
}
.swiper .swiper-slide {
	width: 140px;padding-bottom:10px;padding-left: 8px;
}
.swiper .swiper-slide:last-child {
	padding-right: 8px;
}
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button">
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" sidebarjs-toggle>
            <i class="mdicon menu mdicon-xs"></i>
        </button>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">首页</span>
        <div class="mdl-layout-spacer"></div>
        <!-- 
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                <i class="mdicon search mdicon-xs" style="line-height: 36px;"></i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" id="search">
            </div>
        </div>
         -->
        <nav class="mdl-navigation">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="mdicon more-vert mdicon-xs"></i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item about-button">About</li>
                <li class="mdl-menu__item">Contact</li>
            </ul>
        </nav>
    </div>
</header>

<style>
.mdl-card__supporting-text {
  overflow : hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
	padding: 10px;
}
.mdl-layout__content h3 {margin:10px 0;}
.mdl-layout__content h3 a {display:block; padding: 5px 15px;font-size:20px;color:#444;text-decoration: none;}
.mdl-layout__content h3 a:active {background: rgba(0,0,0, .1);}
.mdl-layout__content h3 a small{float: right;line-height: 40px;;font-size:14px;color:<?= $theme_color?>;font-weight:500}
</style>
<main class="mdl-layout__content" style="padding-bottom: 60px;">
    
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
      <div class="mdl-tabs__tab-bar">
          <a href="#fixed-tab-1" class="mdl-tabs__tab is-active"><i class="mdicon chat"></i><br>微信</a>
          <a href="#fixed-tab-2" class="mdl-tabs__tab"><i class="mdicon people"></i><br>通讯录</a>
          <a href="#fixed-tab-3" class="mdl-tabs__tab"><i class="mdicon visibility"></i><br>发现</a>
      </div>
    
      <div class="mdl-tabs__panel is-active" id="fixed-tab-1">
        <div class="swiper-container" id="swiper">
            <div class="swiper-wrapper">
                <?php foreach (range(1, 4) as $item):?>
                <div class="swiper-slide" style="min-height:160px">
                    <img data-src="http://image3.haoche51.com/o_1ak31dluk1pbl16m1brts3p1iks7.jpg?imageView2/1/w/600/h/300" width="100%" class="swiper-lazy">
                    <div class="swiper-lazy-preloader"></div>
                </div>
                <?php endforeach;?>
            </div>
            <div class="swiper-pagination" style="color:#fff"></div>
        </div>
        
        <style>
        .btns .mdl-button--primary.mdl-button--primary.mdl-button--raised {
            height:28px;line-height:28px;margin: 0 3px;
            border-radius: 14px;box-shadow:none;
        }
        </style>
        <div class="btns" style="padding: 25px 0; text-align: center">
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">3万以下</button>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">3-5万</button>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">5-8万</button>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">8-10万</button>
        </div>
                
        <h3><a href="#">为您推荐<small>更多</small></a></h3>
        <div class="swiper-container swiper">
            <div class="swiper-wrapper">
                <?php foreach (range(1, 6) as $item):?>
                <div class="swiper-slide">
                    <div class="mdl-card mdl-shadow--2dp">
                      <div class="mdl-card__media">
                          <img width="140" height="140" src="http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/1/w/300/h/300">
                      </div>
                      <div class="mdl-card__supporting-text">北京现代2013款 2.0L运动型
                          <div class="mdl-button--primary">4.68 万</div>
                      </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <h3><a href="#">超值低价<small>更多</small></a></h3>
        <div class="swiper-container swiper" style="margin-bottom: 15px;">
            <div class="swiper-wrapper">
                <?php foreach (range(1, 6) as $item):?>
                <div class="swiper-slide">
                    <div class="mdl-card mdl-shadow--2dp">
                      <div class="mdl-card__media">
                          <img width="140" height="140" src="http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/1/w/300/h/300">
                      </div>
                      <div class="mdl-card__supporting-text">北京现代2013款 2.0L运动型
                          <div class="mdl-button--primary">4.68 万</div>
                      </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
          
      </div>
      
      <div class="mdl-tabs__panel" id="fixed-tab-2">
        <ul class="mdl-list">
          <?php foreach (range(1, 4) as $item):?>
          <li class="mdl-list__item">
              <span class="mdl-list__item-primary-content"><i class="mdl-list__item-avatar mdicon user mdicon-xs"></i><span>Bryan Cranston</span></span>
              <a class="mdl-list__item-secondary-action" href="#"><i class="mdicon notifications-off mdicon-xs"></i></a>
          </li>
          <?php endforeach;?>
        </ul>
        <ul class="mdl-list">
          <?php foreach (range(1, 4) as $item):?>
          <li class="mdl-list__item"><span class="mdl-list__item-primary-content"><i class="mdl-list__item-icon mdicon user mdicon-xs"></i> Bryan Cranston</span></li>
          <?php endforeach;?>
        </ul>
      </div>
      
      <div class="mdl-tabs__panel" id="fixed-tab-3">

          <h3 style="font-size:20px;margin:15px 15px 0;color:#444">编辑精选</h3>
          <div class="mdl-grid">
            <?php foreach (range(1, 6) as $item):?>
              <div class="mdl-cell mdl-cell--6-col-phone mdl-cell--4-col">
                <div class="mdl-card mdl-shadow--2dp" style="width: 100%">
                    <div class="mdl-card__media">
                        <img width="100%" src="http://image1.hc51img.com/397b9262047-0698-4840-9fad-ea3dfa30d4a3.jpg?imageView2/2/w/500/h/375">
                    </div>
                    <div class="mdl-card__supporting-text" style="line-height:24px;font-size: 16px;color: rgba(0,0,0,.80);">北京现代ix35 2013款 2.0L 自动两驱智能型GLS 国IV</div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?= URL::site('material/detail')?>">
                          <span style="font-size:24px">4.68</span> 万
                        </a>
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" style="float: right;">
                            <i class="mdicon favorite-outline mdicon-xs"></i>
                        </button>
                    </div>
                    <div class="mdl-card__menu">
                        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                          <i class="mdicon share mdicon-xs" style="color:#fff"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
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
var swiper = new Swiper('.swiper', {
    pagination: '.swiper-pagination',
    slidesPerView: 'auto',
    paginationClickable: true
});
var swiper1 = new Swiper('#swiper', {
	lazyLoading : true,
	lazyLoadingInPrevNext : true,
	pagination: '.swiper-pagination',
    paginationType: 'fraction',
	loop: true
});
</script>
