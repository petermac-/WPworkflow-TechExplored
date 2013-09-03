<?php get_header(); ?>

	<section class="content">

		<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'templates/partials/content', 'page' ); ?>
		
		<?php endwhile; ?>

	</section> <!-- /content -->

	<?php //if ( is_active_sidebar(1) ) { get_sidebar(); } ?>

</section> <!-- /container -->

<?php get_footer(); ?>
