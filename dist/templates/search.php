<?php  
/** 
 * Template Name: Google CSE 
*/
?>
<?php get_header(); ?>

	<section class="content-search">

			<script>
				var myCallback = function() {
				  if (document.readyState == 'complete') {
				    // Document is ready when CSE element is initialized.
				    // Render an element with both search box and search results in div with id 'test'.
				    google.search.cse.element.render(
				        {
				          div: "gcse",
				          tag: 'search'
				         });
				  } else {
				    // Document is not ready yet, when CSE element is initialized.
				    google.setOnLoadCallback(function() {
				       // Render an element with both search box and search results in div with id 'test'.
				       document.getElementsByClassName('progress')[0].style.display="none";
				        google.search.cse.element.render(
				            {
				              div: "gcse",
				              tag: 'search'
				            });
				    }, true);
				  }
				};

				// Insert it before the CSE code snippet so that cse.js can take the script
				// parameters, like parsetags, callbacks.
				window.__gcse = {
				  parsetags: 'explicit',
				  callback: myCallback
				};
				
			  (function() {
			    var cx = '005824875359952426157:46t6hdldou0';
			    var gcse = document.createElement('script');
			    gcse.type = 'text/javascript';
			    gcse.async = true;
			    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
			        '//www.google.com/cse/cse.js?cx=' + cx;
			    var s = document.getElementsByTagName('script')[0];
			    s.parentNode.insertBefore(gcse, s);
			  })();
			</script>

			<div class="progress">
				<div class="circle"></div>
				<div class="circle1"></div>
			</div>
			<div id="gcse" class="gcse-search" data-imageSearchResultSetSize="large" data-enableAutoComplete="true"></div>

	</section> <!-- /content -->

</section> <!-- /container -->

<?php get_footer(); ?>
