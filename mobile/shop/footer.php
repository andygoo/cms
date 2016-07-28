
<?php if (!($controller == 'product' && $action == 'detail')):?>
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
  <div class="footer-copyright">
    <div class="container">
    © 2014 Copyright Text
    <a class="pull-right" href="#!">More Links</a>
    </div>
  </div>
</footer>
<?php endif;?>
<!-- End Footer -->

<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
<?= HTML::script('media/bootsnav/js/bootsnav.js')?>

<?php include __DIR__ . '/sidebar.php';?>
<?php include __DIR__ . '/../common/modal.php';?>
