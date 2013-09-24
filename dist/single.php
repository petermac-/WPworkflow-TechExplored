<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'templates/partials/content', 'single' ); ?>
		
		<?php comments_template(); ?>

	<?php endwhile; ?>

</section> <!-- /container -->

<?php get_footer(); ?>
