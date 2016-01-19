
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)" onclick="history.back()"><i class="glyphicon glyphicon-menu-left"></i></a>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;<?= $article['title']?></span>
    </div>
  </div>
</nav>

<div id="article_content">
    <h3 class="page-header" style="margin: 20px 10px;"><?= $article['title']?></h3>
    <div style="margin:10px" class="article_content">
        <?= $article['content']?>
    </div>
</div>

<script>
$(function() {
	var h = $(window).height();
	var h2 = $('.navbar').height();
	$('#article_content').attr('style', 'height:'+(h-h2-2)+'px;overflow:auto');
});
</script>