<?php get_header(); ?>
		
	<section class="content">
	
		<?php if (have_posts()) : ?>

			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>				

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1>Entries from <?php the_time('F Y'); ?></h1>

			<?php } ?>

			<?php while (have_posts()) : the_post(); ?>
				
				<?php get_template_part( 'templates/partials/content', get_post_format() ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<h2>Welp, we couldn't find that...try again?</h2>
			<p class="post_date">* * *</p>
			<div class="entry">
				<?php get_template_part( 'searchform.php' ); ?>
			</div>

		<?php endif; ?>

	</section> <!-- /content -->

	<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

	<?php //if ( is_active_sidebar(1) ) { get_sidebar(); } ?>

</section> <!-- /container -->

<?php get_footer(); ?>
