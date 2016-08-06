
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header class="mdl-layout__header">
    <div class="mdl-layout__drawer-button" onclick="history.back()">
        <i class="mdicon arrow-back"></i>
    </div>
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">发送反馈</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdicon more-vert"></i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item about-button">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
</header>

<?= HTML::style('media/css/chat.css')?>
<main class="mdl-layout__content" style="padding-bottom:65px">

<style>
.chat-thread li:nth-child(even) .user {
    position: absolute;
    left: -68px;
}
.chat-thread li:nth-child(odd) .user {
    position: absolute;
    right: -68px;
}
/*
.chat-thread li:nth-child(even) {
	background-color: #fff;
}
.chat-thread li:nth-child(even):after {
	border-top: 15px solid #fff;
}*/
.send-msg-form {
position: fixed;left:0;bottom:0;background:#fff;width:100%;z-index:9;padding: 0 6px;
box-shadow: 0 -2px 5px 0 rgba(0, 0, 0, 0.1), 0 -2px 10px 0 rgba(0, 0, 0, 0.05);
}
</style>
<ul class="chat-thread">
	<li><i class="mdicon user"></i>Are we meeting today?</li>
	<li><i class="mdicon user"></i>yes, what time suits you?</li>
	<li><i class="mdicon user"></i>I was thinking after lunch, I have a meeting in the morning</li>
  	<li><i class="mdicon user"></i>Are we meeting today?</li>
	<li><i class="mdicon user"></i>yes, what time suits you?</li>
	<li><i class="mdicon user"></i>I was thinking after lunch, I have a meeting in the morning</li>
  	<li><i class="mdicon user"></i>Are we meeting today?</li>
	<li><i class="mdicon user"></i>yes, what time suits you?</li>
	<li><i class="mdicon user"></i>I was thinking after lunch, I have a meeting in the morning</li>
  	<li><i class="mdicon user"></i>Are we meeting today?</li>
	<li><i class="mdicon user"></i>yes, what time suits you?</li>
	<li><i class="mdicon user"></i>I was thinking after lunch, I have a meeting in the morning</li>
</ul>

<form action="#" class="send-msg-form">

    <ul class="mdl-list" style="margin: 0;padding: 0">
      <li class="mdl-list__item" style="padding: 0 20px 0 5px;">
          <span class="mdl-list__item-primary-content">
              <div class="mdl-textfield mdl-js-textfield" style="width: 95%;">
                <textarea class="mdl-textfield__input" rows="1" id="sample5" style="padding: 2px 0;"></textarea>
                <label class="mdl-textfield__label" for="sample5">请输入...</label>
              </div>
          </span>
          <a class="mdl-list__item-secondary-action" href="#">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="mdicon send"></i>
            </button>
          </a>
      </li>
    </ul>
</form>

</main>
</div>
