<?php
/**
 * The template used for displaying a gallery
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

<?php get_header(); ?>

	<section class="content gallery">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="entry">

			<h1><?php the_title(); ?></h1>
			
			<?php the_content(); ?>
		
		</div>
		
		<?php comments_template(); ?>

		<?php endwhile; endif; ?>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/vendor/magnificpopup.js"></script>
		<script>
		(function($) {
			$('.entry').magnificPopup({
				delegate: 'a', // child items selector, by clicking on it popup will open
				type: 'image',
				removalDelay: 500, //delay removal by X to allow out-animation
				callbacks: {
			    beforeOpen: function() {
			      // just a hack that adds mfp-anim class to markup 
			      this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
			      this.st.mainClass = this.st.el.attr('data-effect');
			    }
				},
				gallery: {
				  enabled: true, // set to true to enable gallery

				  preload: [0,2], // read about this option in next Lazy-loading section

				  navigateByImgClick: true,

				  arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

				  tPrev: 'Previous (Left arrow key)', // title for left button
				  tNext: 'Next (Right arrow key)', // title for right button
				  tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
				},
				closeOnContentClick: true,
				midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
			});
		})(jQuery);
		</script>
	</section> <!-- /content -->

</section> <!-- /container -->

<?php get_footer(); ?>
