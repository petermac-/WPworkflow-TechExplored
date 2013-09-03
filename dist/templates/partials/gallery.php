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

	</section> <!-- /container -->
	
	<?php get_footer(); ?>
