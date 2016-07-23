<style>
footer.page-footer {
background-color: #009688;
color: #fff;
}
footer.page-footer .footer-copyright {
overflow: hidden;
height: 50px;
line-height: 50px;
color: rgba(255, 255, 255, 0.8);
background-color: rgba(51, 51, 51, 0.08);
}
footer ul {
  padding: 0; 
}
footer ul li {
    list-style-type: none; 
	color: #eee;
}
footer a {
	color: #eee;
    background-color: transparent;	
}
footer a:focus,
footer a:active,
footer a:hover {
	color: #eee;
    outline: 0; 
}
</style>
<!-- Start Footer -->

<footer class="page-footer">
  <?php if ($controller == 'product' && $action == 'index'):?>
  <div class="container">
    <div class="row" style="margin-bottom: 20px;margin-top: 20px;">
      <div class="col-md-6">
        <h3>Footer Content</h3>
        <p style="color:#eee">You can use rows and columns here to organize your footer content.</p>
      </div>
      <div class="col-md-3">
        <h3>Links</h3>
        <ul>
          <li><a href="#!">Link 1</a></li>
          <li><a href="#!">Link 2</a></li>
          <li><a href="#!">Link 3</a></li>
          <li><a href="#!">Link 4</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h3>Links</h3>
        <ul>
          <li><a href="#!">Link 1</a></li>
          <li><a href="#!">Link 2</a></li>
          <li><a href="#!">Link 3</a></li>
          <li><a href="#!">Link 4</a></li>
        </ul>
      </div>
    </div>
  </div>
  <?php endif;?>
  <div class="footer-copyright">
    <div class="container">
    © 2014 Copyright Text
    <a class="pull-right" href="#!">More Links</a>
    </div>
  </div>
</footer>
<!-- End Footer -->
    
<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
<?= HTML::script('media/bootsnav/js/bootsnav.js')?>
<?= HTML::script('media/js/bootstrap-notify.min.js')?>


<div class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<script>
$(function() {
	$(document).on('click', '.ajax-modal, .ajax-modal-sm, .ajax-modal-lg', function(){
		var t = $(this);
	    var m = $('.modal').eq(0);
	    var d = m.find('.modal-dialog');
	    d.removeClass('modal-sm').removeClass('modal-lg');
		if (t.hasClass('ajax-modal-sm')) {
			d.addClass('modal-sm');
    	} else if (t.hasClass('ajax-modal-lg')) {
			d.addClass('modal-lg');
    	}
		var url = this.href;
		//if (url != location.href) {
    		$.get(url, function(res) {
    			m.find('.modal-body').html(res);
    			m.modal('show');
    		});
		//}
		return false;
	});
	$('.modal').on('show.bs.modal', function (e) {
		var t = $(this);
		var page_title = t.find('.page-header');
        t.find('.modal-title').html(page_title.text());
        t.find('.container').attr('class', '');
        t.find('form').attr('class', 'ajax-submit');
        page_title.hide();
	});

	$(document).on('submit', '.ajax-submit', function() {
		var t = $(this);
		var url = t.attr('action') || location.href;
		var type = t.attr('method');
		$.ajax({
            type: type,
            url: url,
            data: t.serialize(),
            success: function(res) {
    			//var res = eval('('+res+')');
    			if (res.code == '302') {
    				location.href = res.url;
    			} else {
    				$.notify(res, {
        				type: 'danger', 
        				z_index: 1051,
        				placement: {
        				    from: "top",
        				    align: "right"
    					}
    				});
    				$('#captcha').click();
    			}
            }
		});
		return false;
	});
	
});
</script>
