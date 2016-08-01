
<?= HTML::script('media/js/bootstrap-notify.min.js')?>
<?= HTML::script('media/js/resizeable.js')?>
<?= HTML::script('media/js/draggabilly.pkgd.min.js')?>

<style>
.modal.in {top: 70px;}
.draggable .handle {cursor: move}
.resizable-east { width:10px; height:100%; position:absolute; top:0; right:0; cursor:e-resize; }
.resizable-north { width:100%; height:10px; position:absolute; left:0; bottom:0; cursor:n-resize; }
.resizable-north-west { width:20px; height:20px; position:absolute; right:0; bottom:0; cursor:nw-resize; }
.modal-body {overflow: auto}
</style>
<div class="modal">
    <div class="modal-dialog">
        <div class="modal-content draggable" id="resizemodal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title handle"></h4>
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
	$('.draggable').draggabilly({
		containment: '.modal',
		handle: '.handle'
	});
    Resizeable(document.getElementById("resizemodal"));
});
</script>
