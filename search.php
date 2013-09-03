<?php get_header(); ?>

	<section class="content">

		<?php if (have_posts()) : ?>

			<h1>Search Results for '<?php echo $s; ?>'</h1>

			<?php //get_template_part( 'templates/partials/inc', 'nav' ); ?>

			<?php while (have_posts()) : the_post(); ?>	

				<?php get_template_part( 'templates/partials/content' ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<h1>No posts found.</h1>
			
		<?php endif; ?>
	
	</section> <!-- /content -->

	<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

	<?php //if ( is_active_sidebar(1) ) { get_sidebar(); } ?>

</section> <!-- /container -->

<?php get_footer(); ?>
