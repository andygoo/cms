<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; <a href="http://www.ghostchina.com/">Ghost中文网</a></span> | 
                <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a></span> | 
                <span>京公网安备11010802014853</span>
            </div>
        </div>
    </div>
</div>

<a href="#" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
<?= HTML::script('media/js/jquery.fitvids.min.js')?>

<script>
$(function () {
	$('.post').fitVids();
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('#back-to-top').fadeIn();
		} else {
			$('#back-to-top').fadeOut();
		}
	});
	$('#back-to-top').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({scrollTop : 0},1000);
		return false;
	});
});
</script>

