
<?php include __DIR__ . '/vehicle/header.php';?>
<?php include __DIR__ . '/vehicle/filter.php';?>

<div class="container-fluid">
<div class="row" style="">
    <?php foreach ($vehicle_list as $item): ?>
    <div class="col-md-3">
      <div class="card small">
        <div class="card-image">
            <img src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
        </div>
        <div class="card-content">
            <span class="card-title" style="font-size: 16px;"><?= $item['vehicle_name'];?></span>
        </div>
        <div class="card-action">
            <a href="<?php echo URL::site('detail/'.$item['id'])?>"><?= $item['seller_price'];?>万</a>
        </div>
      </div>
    </div>
    <?php endforeach;?>
</div>
<?php echo $pager?>
</div>

<?php include __DIR__ . '/vehicle/footer.php';?>