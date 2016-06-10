<?php foreach ($list_bidlog as $item):?>
<li class="media list-group-item" data-logid="<?php echo $item['id']?>" style="border: 1px solid #ececec;border-radius:0;margin-top:0;background-color: #f5f5f5;padding: 5px 6px;">
    <div class="media-left media-middle" style="padding-right:6px;">
        <img class="media-object" width="45" src="<?php echo $item['bidder_avatar']?>">
    </div>
    <div class="media-body" style="padding-top: 4px; ">
        <h3 class="media-heading" style="font-size: 13px;color:#37474f;"><?php echo $item['bidder_name']?>
            <span class="pull-right label label-default" style="border-radius:0;font-weight:normal">出局</span>
        </h3>
        <p style="margin-top: 8px; margin-bottom: 0">
            <span class="text-danger" style="font-size: 13px;">￥<span class="bid_price"><?php echo $item['price']?></span></span>
            <span class="text-muted pull-right" style="font-size: 12px;margin-top: 4px;"><?= date('Y-m-d H:i:s', $item['time'])?></span>
        </p>
    </div>
</li>
<?php endforeach;?>
    