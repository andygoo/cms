
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <i class="mdicon arrow-back mdicon-xs"></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">发送反馈</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert mdicon-xs"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item about-button">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
</header>

<?= HTML::style('media/css/chat.css')?>
<style>
.chat-thread li.left .user {
    position: absolute;left: -74px;top:4px;color:#fff;
}
.chat-thread li.right .user {
    position: absolute;right: -74px;top:4px;color:#fff;
}
.chat-thread li.right:before, 
.chat-thread li.left:before {
    background: <?= $theme_color?>;
}
/*
.chat-thread li.left {
	background-color: #fff;
}
.chat-thread li.left:after {
	border-top: 15px solid #fff;
}*/
.send-msg-form {
    position: fixed; left:0; bottom:0; width:100%; padding: 0; margin:0; z-index:9;
    background:#fff; box-shadow: 0 -2px 5px 0 rgba(0, 0, 0, 0.1), 0 -2px 10px 0 rgba(0, 0, 0, 0.05);
}
</style>

<main class="mdl-layout__content" id="content" style="padding-bottom:65px">
<ul class="chat-thread" id="chat-thread">
	<li class="right"><i class="mdicon user mdicon-sm"></i>Are we meeting today?</li>
	<li class="left"><i class="mdicon user mdicon-sm"></i>yes, what time suits you?</li>
	<li class="right"><i class="mdicon user mdicon-sm"></i>I was thinking after lunch, I have a meeting in the morning</li>
  	<li class="left"><i class="mdicon user mdicon-sm"></i>Are we meeting today?</li>
	<li class="right"><i class="mdicon user mdicon-sm"></i>yes, what time suits you?</li>
	<li class="left"><i class="mdicon user mdicon-sm"></i>I was thinking after lunch, I have a meeting in the morning</li>
  	<li class="right"><i class="mdicon user mdicon-sm"></i>Are we meeting today?</li>
	<li class="left"><i class="mdicon user mdicon-sm"></i>yes, what time suits you?</li>
	<li class="right"><i class="mdicon user mdicon-sm"></i>I was thinking after lunch, I have a meeting in the morning</li>
  	<li class="left"><i class="mdicon user mdicon-sm"></i>Are we meeting today?</li>
	<li class="right"><i class="mdicon user mdicon-sm"></i>yes, what time suits you?</li>
	<li class="left"><i class="mdicon user mdicon-sm"></i>I was thinking after lunch, I have a meeting in the morning</li>
</ul>
<ul class="mdl-list send-msg-form">
  <li class="mdl-list__item" style="padding: 0 15px;">
      <div class="mdl-list__item-primary-content">
          <div class="mdl-textfield mdl-js-textfield" style="width: 100%;">
            <textarea class="mdl-textfield__input" rows="1" id="msg_input"></textarea>
            <label class="mdl-textfield__label" for="msg_input">请输入...</label>
          </div>
      </div>
      <a class="mdl-list__item-secondary-action" id="send_msg_btn" href="#" style="margin-left:15px;">
          <i class="mdicon send mdicon-xs"></i>
      </a>
  </li>
</ul>
</main>
</div>

<script>
//var ws = new WebSocket("ws://127.0.0.1:10089/");
var ws = new WebSocket("ws://192.168.50.178:10089/");
ws.onopen = function() {
};
ws.onclose = function() {
};
ws.onmessage = function(evt) {
	var data = JSON.parse(event.data);
	console.log(data);
	addmsg(data.msg, 'left');
};
function sendmsg(msg) {
	var data = {};
	data.type = 'msg';
	data.msg = msg;
	
	//ws.send(JSON.stringify(data));
	addmsg(data.msg, 'right');
}
function addmsg(msg, direct) {
	$('#chat-thread').append('<li class="'+direct+'"><i class="mdicon user mdicon-sm"></i>'+msg+'</li>');
	$('#content')[0].scrollTop = $('#content')[0].scrollHeight;
}
$(function() {
	$('#send_msg_btn').click(function() {
		var msg = $('#msg_input').val();
		if ($.trim(msg) != '') {
			sendmsg(msg);
		}
		$('#msg_input').val('').focus();
		return false;
	});
});
</script>