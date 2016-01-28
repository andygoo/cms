<style>
#wrapper {
	position: absolute;
	z-index: 1;
	top: 52px;
	bottom: 0;
	left:0;
	width: 100%;
	overflow: hidden;
}
#scroller {
	position: absolute;
	z-index: 1;
	-webkit-tap-highlight-color: rgba(0,0,0,0);
	width: 100%;
	-webkit-transform: translateZ(0);
	-moz-transform: translateZ(0);
	-ms-transform: translateZ(0);
	-o-transform: translateZ(0);
	transform: translateZ(0);
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	-webkit-text-size-adjust: none;
	-moz-text-size-adjust: none;
	-ms-text-size-adjust: none;
	-o-text-size-adjust: none;
	text-size-adjust: none;
}
</style>

<div id="wrapper">
    <div id="scroller">
        <?php include __DIR__ . '/list_incr.php';?>
    </div>
</div>

<script>
setTimeout(function() {
	var myScroll = new IScroll('#wrapper', {
		click:true, 
		mouseWheel:true
	});
}, 200);
</script>