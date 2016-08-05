
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
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Contact</li>
        </ul>
    </div>
</header>

<?php echo HTML::style('media/css/chat.css')?>
<main class="mdl-layout__content" style="background: #f2f7f7;padding-bottom:55px">

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

</main>
</div>
