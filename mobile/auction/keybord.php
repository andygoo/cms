
<!--BEGIN actionSheet-->
<div id="actionSheet_wrap">
    <div class="weui_mask_transition" id="mask"></div>
    <div class="weui_actionsheet" id="weui_actionsheet">
        <div class="weui_actionsheet_menu">
            <div class="weui_cells_title" style="font-size: 16px;padding: 10px 15px;margin:0;background:#f5f5f5">
                <span style="color:#555; width:56px; display: inline-block;">当前价</span>
                <span class="text-primary" id="curr_price"></span>
            </div>
            <div class="weui_cells weui_cells_form">
                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label" style="font-size: 16px;width: 60px;margin-bottom:0;font-weight:normal">出价</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <span class="text-primary" id="bid_price"></span><span style="color: red;font-size: 20px;font-weight: 800;">|</span>
                        <i class="weui_icon_clear weui_icon_clear pull-right" id="clear_bid_price"></i>
                    </div>
                </div>
            </div>
            <div style="padding: 15px;background:#f5f5f5"><div class="weui_btn weui_btn_primary" id="bid_btn">出价</div></div>
            <div class="weui_grids">
                <div class="weui_grid weui_grid_label">1</div>
                <div class="weui_grid weui_grid_label">2</div>
                <div class="weui_grid weui_grid_label">3</div>
                <div class="weui_grid weui_grid_label">4</div>
                <div class="weui_grid weui_grid_label">5</div>
                <div class="weui_grid weui_grid_label">6</div>
                <div class="weui_grid weui_grid_label">7</div>
                <div class="weui_grid weui_grid_label">8</div>
                <div class="weui_grid weui_grid_label">9</div>
                <div class="weui_grid weui_grid_label">0</div>
                <div class="weui_grid weui_grid_label">00</div>
                <div class="weui_grid weui_grid_label">DEL</div>
            </div>
        </div>
    </div>
</div>
<!--END actionSheet-->
<!--BEGIN dialog2-->
<div class="weui_dialog_alert" id="dialog2" style="display: none;">
    <div class="weui_mask"></div>
    <div class="weui_dialog">
        <div class="weui_dialog_hd"><strong class="weui_dialog_title"></strong></div>
        <div class="weui_dialog_bd"></div>
        <div class="weui_dialog_ft">
            <a href="javascript:;" onclick="document.getElementById('dialog2').style.display='none'" class="weui_btn_dialog primary">确定</a>
        </div>
    </div>
</div>
<!--END dialog2-->
<!--BEGIN toast-->
<div id="toast" style="display: none;">
    <div class="weui_mask_transparent"></div>
    <div class="weui_toast">
        <i class="weui_icon_toast"></i>
        <p class="weui_toast_content">已出价</p>
    </div>
</div>
<!--end toast-->
<script>
$(function() {
    function hideActionSheet(weuiActionsheet, mask) {
        weuiActionsheet.removeClass('weui_actionsheet_toggle');
        mask.removeClass('weui_fade_toggle');
        mask.on('transitionend', function () {
            mask.hide();
        }).on('webkitTransitionEnd', function () {
            mask.hide();
        })
    }
    
    $('#container').on('click', '#showActionSheet', function () {
        var mask = $('#mask');
        var weuiActionsheet = $('#weui_actionsheet');
        weuiActionsheet.addClass('weui_actionsheet_toggle');
        mask.show()
            .focus()//加focus是为了触发一次页面的重排(reflow or layout thrashing),使mask的transition动画得以正常触发
            .addClass('weui_fade_toggle').one('click', function () {
            hideActionSheet(weuiActionsheet, mask);
        });
        $('#actionsheet_cancel').one('click', function () {
            hideActionSheet(weuiActionsheet, mask);
        });
        mask.unbind('transitionend').unbind('webkitTransitionEnd');

        var curr_price = $('#bidlog li').find('.bid_price').eq(0).text();
        var step_price = $('#step_price').text();
        $('#curr_price').text(curr_price + '元');
        $('#bid_price').text(~~curr_price+~~step_price);
        $('#clear_bid_price').show();
    });

    $('#actionSheet_wrap').on('click', '.weui_grid', function () {
        var val = $(this).text();
        var bid_price = $('#bid_price').text();
        if (val == 'DEL') {
        	bid_price = bid_price.substr(0, bid_price.length-1);
        } else {
            bid_price = $('#bid_price').text() + val;
        }
        if (bid_price.length > 10) {
            return false;
        }
    	$('#bid_price').text(bid_price);

        if (bid_price.length > 0) {
            $('#clear_bid_price').show();
        } else {
        	$('#clear_bid_price').hide();
        }
    });
    $('#actionSheet_wrap').on('click', '#clear_bid_price', function () {
    	$('#bid_price').empty();
    	$(this).hide();
    });
    $('#actionSheet_wrap').on('click', '#bid_btn', function () {
        var url = '<?php echo URL::site('auction/bid')?>';
        var params = {};
        params.id = '<?php echo $info['id']?>';
        params.price = $('#bid_price').text();
        $.get(url, params, function(res) {
            hideActionSheet($('#weui_actionsheet'), $('#mask'));
            if(res.errno == 0) {
            	$('#bidlog').prepend(res.data);
                set_bid_log();
            	
            	$('#toast').show();
            	setTimeout(function () {
                    $('#toast').hide();
                }, 2000);
                
                if ($('.countdown').data('endtime') - (new Date) < 300000) {
                    var t = $('.countdown').data('endtime') + 300000;
                    update_countdown(t);
                }
            } else {
                $('#dialog2 .weui_dialog_bd').text(res.errmsg);
                $('#dialog2').show();
            }
        });
    });
});
</script>