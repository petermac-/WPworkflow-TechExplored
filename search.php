<?php get_header(); ?>

	<section class="content">

		<?php if (have_posts()) : ?>

			<h1>Search Results for '<?php echo $s; ?>' &darr;</h1>

			<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

			<?php while (have_posts()) : the_post(); ?>	

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">	
				
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

					<?php get_template_part( 'templates/partials/inc', 'meta' ); ?>

					<div class="entry">

						<?php the_excerpt(); ?>

					</div>

				</article>

			<?php endwhile; ?>
	
			<?php get_template_part( 'navigation.php' ); ?>

		<?php else : ?>

			<h1>No posts found.</h1>
			
		<?php endif; ?>
	
	</section> <!-- /content -->

	<?php //if ( is_active_sidebar(1) ) { get_sidebar(); } ?>

</section> <!-- /container -->

<?php get_footer(); ?>
