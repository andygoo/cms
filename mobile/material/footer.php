

<?php include __DIR__ . '/sidebar.php';?>

<dialog id="about-dialog" class="mdl-dialog">
  <h3 class="mdl-dialog__title">MDL Dialog</h3>
  <div class="mdl-dialog__content">
    <p>
      This is an example of the Material Design Lite dialog component.
      Please use responsibly.
    </p>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button">Close</button>
  </div>
</dialog>

<div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
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

	    var snackbarContainer = document.querySelector('#demo-toast-example');
	    snackbarContainer.MaterialSnackbar.showSnackbar({message: '网络连接出错，请稍候重试'});
	    
	    return false;
	}
});
(function () {
    'use strict';
    var dialogButton = document.querySelector('.about-button');
    var dialog = document.querySelector('#about-dialog');
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    if (dialogButton) {
        dialogButton.addEventListener('click', function () {
            dialog.showModal();
        });
        dialog.querySelector('button:not([disabled])').addEventListener('click', function () {
            dialog.close();
        });
    }
}());
</script>