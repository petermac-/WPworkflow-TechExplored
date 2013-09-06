<?php  
/** 
 * Template Name: Google CSE 
*/
?>
<?php get_header(); ?>

	<section class="content-search">

			<script>
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
			<div class="gcse-search" data-imageSearchResultSetSize="large" data-enableAutoComplete="true"></div>

	</section> <!-- /content -->

	<?php //get_template_part( 'templates/partials/inc', 'nav' ); ?>

</section> <!-- /container -->

<?php get_footer(); ?>
