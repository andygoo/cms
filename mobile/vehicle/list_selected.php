
<?php if (!empty($filter_list)):?>
<style>
.label {background: #fff;color:#212121;font-weight:normal;margin-right: 10px;}
.label-pill {
    padding-right: .6em;
    padding-left: .6em;
    border-radius: 10rem
}
.label a{display:inline-block;position:relative;width:17px;height:17px;border-radius: 100%}
.label a:before, 
.label a:after {content:"";width:10px;height:1px;background:#bdbdbd;position:absolute;left:2px;}
.label a:before {top:9px;-webkit-transform: rotate(225deg) translate(-50%, 0);}
.label a:after {top:16px;-webkit-transform: rotate(-225deg) translate(-50%, 0);}
</style>
<div id="selected_options" style="background: #f2f2f2;padding: 10px 10px 0 10px;line-height: 30px;">
    <?php foreach ($filter_list as $item):?>
    <span class="label label-pill label-default">
        <?php echo $item['desc']?><a href="<?php echo $item['url']?>"></a>
    </span>
    <?php endforeach;?>
</div>
<?php endif;?>
