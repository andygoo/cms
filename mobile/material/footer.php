
<?= HTML::style('media/css/weui.min.css')?>
<style>
.weui_tabbar:before {border-top: none;}
.weui_tabbar {
	background-color: #fff;
	box-shadow: 0 -2px 5px 0 rgba(0, 0, 0, 0.1), 0 -2px 10px 0 rgba(0, 0, 0, 0.05);
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
	padding: 7px 0
}
.weui_tabbar_item.weui_bar_item_on .weui_tabbar_label,
.weui_tabbar_item.weui_bar_item_on i {
	color: #00bcd4;
}
.weui_tabbar .mdicon {font-size: 24px;}
.weui_tabbar .mdl-button {height: initial;line-height:initial}
.weui_tabbar .mdl-ripple.is-visible {
    opacity: .1
}
</style>
<div class="weui_tabbar mdl-shadow--2dp" style="position: fixed;bottom:0;left:0;z-index:999">
    <div class="weui_tabbar_item weui_bar_item_on mdl-button mdl-js-button mdl-js-ripple-effect">
        <div class="weui_tabbar_icon"><i class="mdicon chat"></i></div>
        <div class="weui_tabbar_label">微信</div>
    </div>
    <div class="weui_tabbar_item mdl-button mdl-js-button mdl-js-ripple-effect">
        <div class="weui_tabbar_icon"><i class="mdicon people"></i></div>
        <div class="weui_tabbar_label">通讯录</div>
    </div>
    <div class="weui_tabbar_item mdl-button mdl-js-button mdl-js-ripple-effect">
        <div class="weui_tabbar_icon"><i class="mdicon visibility"></i></div>
        <div class="weui_tabbar_label">发现</div>
    </div>
    <div class="weui_tabbar_item mdl-button mdl-js-button mdl-js-ripple-effect" sidebarjs-toggle>
        <div class="weui_tabbar_icon"><i class="mdicon user"></i></div>
        <div class="weui_tabbar_label">我</div>
    </div>
</div>

<script>
$(function() {
	$(document).on('click', '.weui_tabbar_item', function () {
	    $(this).addClass('weui_bar_item_on').siblings().removeClass('weui_bar_item_on');
	});
});
</script>

<?php include __DIR__ . '/sidebar.php';?>

<script>
var networkStatus = (navigator.onLine) ? 'online' : 'offline';
var EventUtil = {
    addHandler: function (element, type, handler) {
        if (element.addEventListener) {
            element.addEventListener(type, handler, false);
        } else if (element.attachEvent) {
            element.attachEvent("on" + type, handler);
        } else {
            element["on" + type] = handler;
        }
    }
};
EventUtil.addHandler(window, "online", function () {
	networkStatus = 'online';
});
EventUtil.addHandler(window, "offline", function () {
	networkStatus = 'offline';
});
$(document).on('click', 'a', function() {
	if (networkStatus == 'offline') {
	    alert(networkStatus);
	    return false;
	}
});
</script>