
<footer class="page-footer teal">
  <div class="container-fluid">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Links</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
        </ul>
      </div>
      <div class="col l3 s12">
        <h5 class="white-text">Links</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2014 Copyright Text
    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
</footer>


<?= HTML::script('media/bootstrap-3.3.5/js/bootstrap.min.js')?>
<?= HTML::script('media/materialize/js/materialize.min.js')?>

<?= HTML::style('media/autocomplete/jquery.autocomplete.css')?>
<?= HTML::script('media/autocomplete/jquery.autocomplete.js')?>

<script>
$(function(){
	$("#search-input").autocomplete({
		source:[{
			url:"/suggest?query=%QUERY%",
			type:'remote'
		}],
		render: function(item) {
			return '<div>'+item+'</div>';
		},
		valid: function () {
			return true;
		},
		limit: 10,
		visibleLimit: 10,
		openOnFocus: true
	}); 
});
</script>