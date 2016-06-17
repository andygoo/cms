<?php foreach ($vehicle_list as $item): ?>
<li class="list-group-item" onclick="window.open('<?= URL::site('detail/' . $item['id']);?>', '_self')">
    <div class="media">
        <div class="media-left">
            <img class="media-object" src="<?= $item['cover_pic']; ?>" width="115">
        </div>
        <div class="media-body">
            <h3 class="media-heading" style="font-size:14px;"><?= $item['vehicle_name'];?></h3>
            <p style="color:#999;"><?= date('Y.m', $item['register_time'])?>上牌 · <?= sprintf("%.1f", $item['miles'])?>万公里 · <?= $item['geerbox']?></p>
            <p style="color:#d00;"><span style="font-size:18px;"><?= sprintf("%.2f", $item['seller_price']);?></span>万</p>
        </div>
    </div>
</li>
<?php endforeach;?>





