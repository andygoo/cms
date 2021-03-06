<style>
footer.page-footer {
background-color: #009688;
color: #fff;
}
footer.page-footer .footer-copyright {
overflow: hidden;
height: 50px;
line-height: 50px;
color: rgba(255, 255, 255, 0.8);
background-color: rgba(51, 51, 51, 0.08);
}
footer ul {
  padding: 0; 
}
footer ul li {
    list-style-type: none; 
	color: #eee;
}
footer a {
	color: #eee;
    background-color: transparent;	
}
footer a:focus,
footer a:active,
footer a:hover {
	color: #eee;
    outline: 0; 
}
</style>
<!-- Start Footer -->

<footer class="page-footer">
  <?php if ($controller == 'product' && $action == 'index'):?>
  <div class="container">
    <div class="row" style="margin-bottom: 20px;margin-top: 20px;">
      <div class="col-md-6">
        <h3>Footer Content</h3>
        <p style="color:#eee">You can use rows and columns here to organize your footer content.</p>
      </div>
      <div class="col-md-3">
        <h3>Links</h3>
        <ul>
          <li><a href="#!">Link 1</a></li>
          <li><a href="#!">Link 2</a></li>
          <li><a href="#!">Link 3</a></li>
          <li><a href="#!">Link 4</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h3>Links</h3>
        <ul>
          <li><a href="#!">Link 1</a></li>
          <li><a href="#!">Link 2</a></li>
          <li><a href="#!">Link 3</a></li>
          <li><a href="#!">Link 4</a></li>
        </ul>
      </div>
    </div>
  </div>
  <?php endif;?>
  <div class="footer-copyright">
    <div class="container">
    © 2014 Copyright Text
    <a class="pull-right" href="#!">More Links</a>
    </div>
  </div>
</footer>
<!-- End Footer -->

<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
<?= HTML::script('media/bootsnav/js/bootsnav.js')?>

<?php include __DIR__ . '/../common/modal.php';?>
