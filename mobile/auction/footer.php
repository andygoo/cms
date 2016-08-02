
<style>
.weui_tabbar:before {border-top: none;}
.weui_tabbar {
	background-color: #fff;
	box-shadow: 0 -2px 5px 0 rgba(0, 0, 0, 0.12), 0 -2px 10px 0 rgba(0, 0, 0, 0.08);
}
.weui_tabbar_icon {
	text-align:center;
	font-size: 20px;
	color: #888;
}
.weui_tabbar_icon+.weui_tabbar_label {
	margin-top:2px;
}
.weui_tabbar_item {
	padding: 5px 0
}
.weui_tabbar_item.weui_bar_item_on i {
	color: #09bb07;
}
</style>
<div class="container" style="padding: 0;z-index:99;">
    <div class="weui_tabbar" style="position: fixed;bottom:0;left:0">
        <div class="weui_tabbar_item weui_bar_item_on">
            <div class="weui_tabbar_icon"><i class="glyphicon glyphicon-home"></i></div>
            <div class="weui_tabbar_label">微信</div>
        </div>
        <div class="weui_tabbar_item">
            <div class="weui_tabbar_icon"><i class="glyphicon glyphicon-comment"></i></div>
            <div class="weui_tabbar_label">通讯录</div>
        </div>
        <div class="weui_tabbar_item">
            <div class="weui_tabbar_icon"><i class="glyphicon glyphicon-eye-open"></i></div>
            <div class="weui_tabbar_label">发现</div>
        </div>
        <div class="weui_tabbar_item">
            <div class="weui_tabbar_icon"><i class="glyphicon glyphicon-user"></i></div>
            <div class="weui_tabbar_label">我</div>
        </div>
    </div>
</div>

<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
<?php include __DIR__ . '/sidebar.php';?>
<?php include __DIR__ . '/../common/modal.php';?>

<script>
$(function() {
	$('.container').on('click', '.weui_tabbar_item', function () {
	    $(this).addClass('weui_bar_item_on').siblings('.weui_bar_item_on').removeClass('weui_bar_item_on');
	});
});
</script>