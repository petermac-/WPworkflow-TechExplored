<?php get_header(); ?>
		
	<section class="content">
	
		<?php if (have_posts()) : ?>

			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>				

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1>Entries from <?php the_time('F Y'); ?></h1>

			<?php } ?>

			<?php while (have_posts()) : the_post(); ?>
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p class="post_date"><?php the_time('F jS, Y') ?> &#8212; <?php the_tags() ?></p>
				<div class="entry">
					<?php if ( has_tag( 'Gallery' ) ) { the_excerpt(); }
					else { the_content("Continue reading &rarr;"); } ?>
				</div>
				<p class="post_meta"><span class="add_comment"><?php comments_popup_link('Post a comment', '1 Comment', '% Comments'); ?></span></p>
			<?php endwhile; ?>

			<?php get_template_part( 'templates/partials/inc', 'nav' ); ?>

		<?php else : ?>

			<h2>Welp, we couldn't find that...try again?</h2>
			<p class="post_date">* * *</p>
			<div class="entry">
				<?php get_template_part( 'searchform.php' ); ?>
			</div>

		<?php endif; ?>

	</section> <!-- /content -->

	<?php //if ( is_active_sidebar(1) ) { get_sidebar(); } ?>

</section> <!-- /container -->

<?php get_footer(); ?>
