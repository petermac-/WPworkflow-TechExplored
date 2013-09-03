<?php get_header(); ?>

	<section class="content">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/partials/content', get_post_format() ); ?>

		<?php endwhile; ?>
	
		<?php else : ?>

			<article>

				<h2>This page is currently under construction.</h2>
					
				<p class="post_date">* * *</p>
					
				<div class="entry">
					<p>Sorry, but you are looking for something that isn't here.</p>
				</div>

			</article>

		<?php endif; ?>

	</section> <!-- /content -->

	<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

	<?php //if ( is_active_sidebar(1) ) { get_sidebar(); } ?>

</section> <!-- /container -->

<?php get_footer(); ?>
