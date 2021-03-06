
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
function ajax_load_modal(url) {
	$.get(url, function(res) {
	    var m = $('.modal').eq(0);
		m.find('.modal-body').html(res);
		m.modal('show');
	});
}
$(function() {
	$(document).on('click', '.ajax-modal, .ajax-modal-sm, .ajax-modal-lg', function(){
		var t = $(this);
		var url = this.href;
		ajax_load_modal(url);
		return false;
	});
	$('.modal').on('show.bs.modal', function (e) {
		var t = $(this);
		var page_title = t.find('.page-header');
        t.find('.modal-title').html(page_title.html());
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
        				    align: "center"
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
