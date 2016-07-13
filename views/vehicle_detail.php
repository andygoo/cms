
<?php
 echo HTML::style('media/bootstrap-3.3.5/css/bootstrap.css')
 ?>
<?php include __DIR__ . '/vehicle/header.php';?>


<link href="/media/swiper/css/swiper.min.css" rel="stylesheet" />
<script src="/media/swiper/js/swiper.min.js"></script>

<div class="container-fluid" style="margin-top:20px">
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-image">
                <img src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/300" width="100%" class="swiper-lazy">
            </div>
            <div class="card-content">
                <span class="card-title"><?= $vehicle_info['vehicle_name'];?></span>
                <p>2012.10上牌 | 行驶2.4万公里 | 手自一体</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
        
    <div class="col-md-6">
        <ul class="collection with-header">
          <li class="collection-header"><h4>12.00万</h4></li>
          <li class="collection-item">新车含税价<a href="#!" class="secondary-content">14.06万</a></li>
          <li class="collection-item">看车地点<a href="#!" class="secondary-content">惠忠北里</a></li>
          <li class="collection-item">服务费<a href="#!" class="secondary-content">2000</a></li>
          <li class="collection-item">贷款<a href="#!" class="secondary-content">首付0.00万，月供5,768元起</a></li>
          <li class="collection-item">购车咨询：<a href="#!" class="secondary-content">400-606-7905</a></li>
        </ul>

        <a class="btn btn-info">预约看车</a>
        <a class="btn btn-info">我要砍价</a>
    </div>
</div>
</div>

<div class="container-fluid">
<div class="page-header">
  <h4>车辆外观</h4>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-image">
                <img src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/300" width="100%" class="swiper-lazy">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-image">
                <img src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/300" width="100%" class="swiper-lazy">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-image">
                <img src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/300" width="100%" class="swiper-lazy">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-image">
                <img src="http://image1.hc51img.com/17855901962e8ba9076942410b41b962c9aba21a.jpg?imageView2/1/w/400/h/300" width="100%" class="swiper-lazy">
            </div>
        </div>
    </div>
</div>
</div>
<?php include __DIR__ . '/vehicle/footer.php';?>

