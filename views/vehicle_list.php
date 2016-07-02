
<?php include __DIR__ . '/vehicle/header.php';?>
<?php include __DIR__ . '/vehicle/filter.php';?>

<div class="container">
    <div class="row" style="">
        <?php foreach ($vehicle_list as $item): ?>
        <a class="col-xs-6 col-md-3" style="margin-top: 10px" href="#">
            <img style="width: 100%" src="http://image1.hc51img.com/966dc951cc5-0f3e-4b5f-8fa3-0279f0915284.jpg?imageView2/1/w/280/h/210">
            <?= $item['vehicle_name'];?>
        </a>
        <?php endforeach;?>
    </div>
    
    <?php echo $pager?>
</div>

<?php include __DIR__ . '/vehicle/footer.php';?>