<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'templates/partials/content', 'single' ); ?>
		
		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php //if ( is_active_sidebar(1) ) { get_sidebar(); } ?>

</section> <!-- /container -->

<?php get_footer(); ?>
