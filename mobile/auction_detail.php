
<?= HTML::style('media/bootstrap/css/bootstrap.min.css')?>
<?= HTML::style('media/css/weui.min.css')?>
<?= HTML::style('media/css/flexboxgrid.min.css')?>
<?= HTML::script('media/js/readmore.min.js')?>
<?= HTML::script('media/js/jquery.countdown.min.js')?>

<style>
body {background: #f5f2f2;}
.container{padding:0;background: #fff}
.weui_grid {padding: 10px;font-size: 20px;}
.weui_icon_safe:before {font-size: 10px;color:#fff;margin-top: -2px;}
</style>

<div class="container">
    <div class="panel" style="margin-bottom: 0px;border:none;border-radius:0">
        <div class="panel-heading" style="background: #3c8dbc;padding-top:14px;color:#fff;font-size: 16px; border:none; border-radius:0; height: 50px" sidebarjs-toggle>
            <i class="glyphicon glyphicon-menu-hamburger"></i>
        </div>
        <div class="panel-body" style="margin-top:-50px;">
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading" style="margin-top: 5px; width:100%; color: #fff; text-align: right"><?= $siteinfo['name']?></h4>
                    <p style="font-sizt: 12px;margin-top: 20px; margin-bottom: 0; width:100%; text-align: right"><?= $siteinfo['desc']?></p>
                </div>
                <div class="media-right">
                    <img class="media-object" width="70" src="<?= $siteinfo['logo']?>">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="container" style="padding: 15px 15px 0;">
    <div class="media">
        <div class="media-left">
            <img class="media-object" width="45" src="<?= $siteinfo['logo']?>">
        </div>
        <div class="media-body">
            <h5 class="media-heading" style="color:#ff6000;font-weight:600"><?= $siteinfo['name']?></h5>
            <div class="media-desc" style="font-size:13px"><?= str_replace("\n", '<br>', $info['desc'])?></div>
            <div class="row top-xs swiper-container" style="padding: 12px 0;">
                <?php $pics = $info['pics']?>
                <?php $pic_count = count($pics)?>
                <?php foreach ($pics as $pic):?>
                <div class="swipe col-xs-4 col-sm-3 col-md-2" style="padding: 3px;">
                    <a class="swipe" href="<?= $pic['src']?>" data-size="<?= $pic['size']?>">
                        <img style="width: 100%" src="<?= $pic['src_sml']?>">
                    </a>
                </div>
                <?php endforeach;?>
            </div>
            <div style="margin-bottom:10px;margin-top:-9px;">
            <!-- <span class="label label-primary" style="background:#0288d1;border-radius:0;font-weight:normal;font-size:10px;padding: 1px 4px;">包退</span>
             -->
             <span class="label label-success" style="background:#ff3d00;border-radius:1px;font-weight:normal;font-size:10px;padding: 1px 4px;">包邮</span>
            <span class="label label-success" style="border-radius:1px;font-weight:normal;font-size:10px;padding: 1px 2px;"><i class="weui_icon_safe weui_icon_safe_success"></i></span>
            <span class="text-muted" style="font-size:10px;"><?= date('n月j日',$info['start_time'])?></span>
            <!-- <i class="glyphicon glyphicon-eye-open" style="color: #ff4081;vertical-align:middle"></i>
            <span class="text-muted" style="font-size:10px;">222</span> -->
            </div>
        
            <?php if ($status == 1 || $status == 0):?>
            <?php if ($status == 0):?>
            <div id="countdown2" style="margin-bottom:10px;">
                <span class="label label-info" style="border-radius:0;font-weight:normal;">未开拍</span>
                <span class="pull-right">
                    <span style="font-size: 12px;">距离开拍：</span>
                    <span class="countdown2" data-starttime="<?= 1000*$info['start_time']?>"></span>
                </span>
            </div>
            <?php endif;?>
            <div id="countdown" style="margin-bottom:10px;<?php if ($status == 0):?>display: none<?php endif;?>">
                <span class="label label-danger" style="border-radius:0;font-weight:normal;">正在拍卖</span>
                <span class="pull-right">
                    <span style="font-size: 12px;">距离结束：</span>
                    <span class="countdown" data-endtime="<?= 1000*$info['end_time']?>"></span>
                </span>
            </div>
            <?php endif;?>
        
            <div class="bd spacing">
                <?php if ($status == 2):?>
                <div class="weui_btn weui_btn_default weui_btn_disabled"><?= date('n月j日 H:i')?> 拍卖结束</div>
                <?php elseif ($status == 0):?>
                <div id="showActionSheet2" class="weui_btn weui_btn_primary weui_btn_disabled">等待开拍</div>
                <?php elseif ($status == 1):?>
                <div id="showActionSheet" class="weui_btn weui_btn_primary">出价</div>
                <?php endif;?>
            </div>
            
            <div class="row text-muted" style="margin: 2px 0 8px;font-size: 12px;">
                <div class="col-xs-4 col-sm-3 col-md-2" style="border-right:1px solid #f2f2f2;">起 ￥<?= $info['start_price']?>元</div>
                <div class="col-xs-4 col-sm-3 col-md-2" style="border-right:1px solid #f2f2f2;">加 ￥<span id="step_price"><?= $info['step_price']?></span>元</div>
                <div class="col-xs-4 col-sm-3 col-md-2">保 ￥<?= $info['reserve_price']?>元</div>
            </div>
            
            <ul class="media-list list-group" id="bidlog">
                <?php include __DIR__ . '/auction/bidlog.php';?>
                
                <?php if ($total_bidlog > 5):?>
                <li class="list-group-item" id="nexturl" data-url="<?= URL::site('auction/recentbid?page=2&id=' . $info['id'])?>" style="border: 1px solid #ececec;border-radius:0;background-color: #f5f5f5;padding: 5px 6px;">
                    <div class="media-body">
                        <div class="text-muted" style="text-align:center;font-size: 13px;">查看更多</div>
                    </div>
                </li>
                <?php endif;?>
            </ul>
            
        </div>
    </div>
</div>

<?php if (!empty($list_more)):?>
<div class="container" style="margin-top: 10px;">
    <div class="panel panel-default" style="margin-bottom: 0px;background: #fff;border-color: #fff;border-radius:0">
        <div class="panel-heading" style="background: #fff;border-color: #eee;">其他拍品</div>
        <div class="panel-body" style="padding: 12px;">
            <?php foreach ($list_more as $key=>$item):?>
            <?php $pics = json_decode($item['pic'], true)?>
            <a href="<?= URL::site('auction?id='.$item['id'])?>">
                <img class="col-xs-4 col-sm-3" style="padding: 3px;" src="<?= URL::site('/imagefly/w200-h200-c/' . $pics[0])?>">
            </a>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php endif;?>

<script>
var get_latest_auction_info_timer = null;
var diff_ms = +(new Date) - <?= strtotime('now')*1000?>;
function set_bid_log() {
	$('#bidlog li').first().find('h3 span').attr('class', 'pull-right label label-danger').text('领先');
	$('#bidlog li').first().siblings().find('h3 span').attr('class', 'pull-right label label-default').text('出局');
}

function update_countdown(t) {
	$('#countdown').show();
    $('.countdown').data('endtime', t);
    $('.countdown').removeClass('ended').data('countdown').update(t).start();
}

function end_kaipai_countdown() {
    clearInterval(get_latest_auction_info_timer);
    $('#countdown').hide();
    $('#showActionSheet').addClass('weui_btn_disabled').attr('id', '');
}

function start_kaipai_countdown() {
	countdown_kaipai();

	$('#countdown2').remove();
	$('#countdown').show();
    $('#showActionSheet2').removeClass('weui_btn_disabled').text('出价').attr('id', 'showActionSheet');
    
    get_latest_auction_info_timer = setInterval(function() {
    	get_latest_auction_info();
    }, 3500);
}

function countdown_kaipai() {
    $('.countdown').countdown({
        date: $('.countdown').data('endtime'),
        offset: diff_ms,
        render: function(data) {
            if (data.hours==0 && data.min==0 && data.sec==0) {
            	get_latest_auction_info();
            }
            $(this.el).html('<span class="text-danger">'+data.hours+'</span>时<span class="text-danger">'+data.min+'</span>分<span class="text-danger">'+data.sec+'</span>');
        },
        onEnd: function() {
        	end_kaipai_countdown();
        }
    });
}

function countdown_weikaipai() {
    $('.countdown2').countdown({
        date: $('.countdown2').data('starttime'),
        offset: diff_ms,
        render: function(data) {
            $(this.el).html('<span class="text-danger">'+data.hours+'</span>时<span class="text-danger">'+data.min+'</span>分<span class="text-danger">'+data.sec+'</span>');
        },
        onEnd: function() {
        	start_kaipai_countdown();
        }
    });
}

function get_recent_bidlog() {
    var url = $('#nexturl').data('url');
    if (url == '') {
        return false;
    }
    var params = {};
    params.logid = $('#nexturl').prev().data('logid');
    $.get(url, params, function(res) {
        $('#nexturl').before(res.content);
        if (res.next_page != '') {
        	$('#nexturl').data('url', res.next_page).show();
        } else {
        	$('#nexturl').data('url', '').hide();
        }
    });
}

function get_latest_bidlog() {
    var url = '<?= URL::site('auction/latestbid?id=' . $info['id'])?>';
    var params = {};
    params.logid = $('#bidlog li').eq(0).data('logid');
    $.get(url, params, function(res) {
        $('#bidlog').prepend(res.content);
        set_bid_log();
    });
}

function get_latest_auction_info() {
    var url = '<?= URL::site('auction/info?id=' . $info['id'])?>';
    $.get(url, function(res) {
        var latest_price = res.data.curr_price;
        var latest_endtime = res.data.end_time*1000;
        var curr_price = $('#bidlog li').find('.bid_price').eq(0).text();
        var curr_endtime = $('.countdown').data('endtime');
        $('#curr_price').text(curr_price + '元');

        if (latest_price > curr_price) {
        	get_latest_bidlog();
        }
        if (latest_endtime > curr_endtime) {
        	update_countdown(latest_endtime);
        }
    });
}

$(function() {
	$('.media-desc').readmore({
        speed: 75,
        collapsedHeight: 100,
        moreLink: '<a href="#">全文</a>',
        lessLink: '<a href="#">收起</a>'
	});

	<?php if ($status == 0):?>
	countdown_weikaipai();
	<?php elseif ($status == 1):?>
	start_kaipai_countdown();
    <?php endif;?>
    
    $('#nexturl').click(function() {
        get_recent_bidlog();
    });

    var str = '<?= $status == 2 ? '成交' : '领先'?>';
	$('#bidlog li').first().find('h3 span').attr('class', 'pull-right label label-danger').text(str);
});
</script>

<?php include __DIR__ . '/common/photoswipe.php';?>
<?php include __DIR__ . '/auction/keybord.php';?>

<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
<?php include __DIR__ . '/common/modal.php';?>
<?php include __DIR__ . '/auction/sidebar.php';?>

<?php if ($is_weixin):?>
<?php include __DIR__ . '/auction/wxshare.php';?>
<?php endif;?>
