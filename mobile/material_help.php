
<style>
.mdl-layout__tab-bar {height:48px;}
.mdl-layout__tab {color:rgba(255,255,255,.8);}
.mdl-layout.is-upgraded .mdl-layout__tab.is-active {color: #fff}
.mdl-layout.is-upgraded .mdl-layout__tab.is-active::after {background: #fff}
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <i class="mdicon arrow-back"></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">帮助</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item about-button">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
        <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
        <a href="#fixed-tab-2" class="mdl-layout__tab">Tab 2</a>
        <a href="#fixed-tab-3" class="mdl-layout__tab">Tab 3</a>
    </div>
</header>

<?= HTML::style('media/swiper/css/swiper.min.css')?>
<style>
.swiper-container {
    width: 100%;
    height: 100%;
	margin-top: 30px;
	margin-bottom: 30px;	
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
.swiper-slide {
	width: 150px;padding-bottom:10px;padding-left: 10px;
}
.swiper-slide:last-child {
	padding-right: 10px;
}
</style>
<main class="mdl-layout__content">

      <div class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
          <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach (range(1, 6) as $item):?>
                <div class="swiper-slide">
                    <div class="mdl-card mdl-shadow--2dp">
                      <div class="mdl-card__title mdl-card--expand" style="background:#46B6AC">
                      </div>
                      <div class="mdl-card__supporting-text">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
          </div>
          <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach (range(1, 6) as $item):?>
                <div class="swiper-slide">
                    <div class="mdl-card mdl-shadow--2dp">
                      <div class="mdl-card__title mdl-card--expand" style="background:#46B6AC">
                      </div>
                      <div class="mdl-card__supporting-text">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
          </div>
      </div>
      
      <div class="mdl-layout__tab-panel" id="fixed-tab-2">
        <ul>
          <li>Tywin</li>
          <li>Cersei</li>
          <li>Jamie</li>
          <li>Tyrion</li>
        </ul>
      </div>
      <div class="mdl-layout__tab-panel" id="fixed-tab-3">
        <ul>
          <li>Viserys</li>
          <li>Daenerys</li>
        </ul>
      </div>
</main>
</div>

<?= HTML::script('media/swiper/js/swiper.jquery.min.js');?>
<script>
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    slidesPerView: 'auto',
    paginationClickable: true
});
</script>
