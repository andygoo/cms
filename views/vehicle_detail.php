
<?php include __DIR__ . '/vehicle/header.php';?>

<link href="/media/swiper/css/swiper.min.css" rel="stylesheet" />
<script src="/media/swiper/js/swiper.min.js"></script>

<div class="container">
<div class="page-header"><h3><?= $vehicle_info['vehicle_name'];?> <small>2012.10上牌 | 行驶2.4万公里 | 手自一体</small></h3></div>
<div class="row">
    <div class="col-md-7">
        <img src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/250" width="100%" class="swiper-lazy">     
    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">详情</h3>
            </div>
            <div class="panel-body">
                <h3 style="color: #d00">27.38 万</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item">新车含税价：14.06万</li>
                <li class="list-group-item">看车地点：惠忠北里</li>
                <li class="list-group-item">服务费：2000</li>
                <li class="list-group-item">贷款：首付0.00万，月供5,768元起</li>
                <li class="list-group-item">购车咨询：400-606-7905</li>
            </ul>
        </div>
        <a class="btn btn-warning btn-lg" style="margin-right: 15px;">预约看车</a> 
        <a class="btn btn-danger btn-lg">我要砍价</a>
    </div>
</div>
</div>

<div class="container">
<div class="page-header"><h3>车辆外观</h3></div>
<div class="row">
    <?php foreach (range(1, 6) as $item):?>
    <div class="col-md-4" style="margin-bottom: 20px;">
        <img src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/300" width="100%" class="swiper-lazy">
    </div>
    <?php endforeach;?>
</div>
</div>

<div class="container">
<div class="page-header"><h3>车辆内饰</h3></div>
<div class="row">
    <?php foreach (range(1, 6) as $item):?>
    <div class="col-md-4" style="margin-bottom: 20px;">
        <img src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/300" width="100%" class="swiper-lazy">
    </div>
    <?php endforeach;?>
</div>
</div>

<div class="clearfix"></div>

<?php include __DIR__ . '/vehicle/footer.php';?>

