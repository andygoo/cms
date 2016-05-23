
<style>
img {max-width: 100%}
</style>

<header id="header" class="header header--fixed hide-from-print" role="banner">
    <div class="container" >
    
        <a href="http://wicky.nillia.ms/headroom.js/" class="brand header__link">
            <b class="brand__forename">Headroom</b><b class="brand__surname">.js</b>
        </a>
    </div>
</header>

<article style="margin-top: 80px;">
    <h3 class="page-header" style="margin: 20px 10px;"><?= $article['title']?></h3>
    <div style="margin:10px" class="article_content">
        <?= $article['content']?>
    </div>
</article>

<?= HTML::style('http://wicky.nillia.ms/headroom.js/assets/styles/main.css?v=2')?>
<?= HTML::script('media/js/headroom.min.js')?>

<script>
(function() {
    var header = document.querySelector("#header");

    if(window.location.hash) {
      header.classList.add("headroom--unpinned");
    }

    var headroom = new Headroom(header, {
        offset : 205
    });
    headroom.init();
    
  	headroom.init();
}());
</script>