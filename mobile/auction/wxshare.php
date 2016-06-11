<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
var jsapi_config = <?php echo $wx_jsapi_config;?>;
jsapi_config.jsApiList.push('onMenuShareTimeline','onMenuShareAppMessage');
wx.config(jsapi_config);

var title = '';
var link = '';
var desc = '<?php echo $info['desc'];?>';
var imgUrl = '<?php echo $pics[0]['src']?>?imageView2/1/w/300/h/300';

var share_appmsg_config = {
    title: title, // 分享标题
    desc: desc, // 分享描述
    link: link, // 分享链接
    imgUrl: imgUrl, // 分享图标
    type: 'link', // 分享类型,music、video或link，不填默认为link
    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
    success: function () {
    },
    cancel: function () {
    }
}
var share_timeline_config = {
    title: title, // 分享标题
    link: link, // 分享链接
    imgUrl: imgUrl, // 分享图标
    success: function () {
    },
    cancel: function () {
    }
}
wx.ready(function () {
    wx.onMenuShareAppMessage(share_appmsg_config);
    wx.onMenuShareTimeline(share_timeline_config);
});
</script>
