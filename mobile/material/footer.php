
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
    alert("Online");
	networkStatus = 'online';
});
EventUtil.addHandler(window, "offline", function () {
    alert("Offline");
	networkStatus = 'offline';
});
$(document).on('click', 'a', function() {
	if (networkStatus == 'offline') {
	    alert(networkStatus);
	    return false;
	}
});
</script>