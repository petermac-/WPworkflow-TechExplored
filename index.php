<?php get_header(); ?>

	<section class="content">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/partials/content', get_post_format() ); ?>

		<?php endwhile; ?>
	
		<?php else : ?>

			<?php get_template_part( 'templates/partials/content-404' ); ?>

		<?php endif; ?>

	</section> <!-- /content -->

	<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

	<?php //if ( is_active_sidebar(1) ) { get_sidebar(); } ?>

</section> <!-- /container -->

<?php get_footer(); ?>
