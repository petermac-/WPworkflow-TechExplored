<?php
/**
 * The template used for displaying page content in single.php
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

	<div class="post-meta-container">
		<?php get_template_part( 'templates/partials/inc', 'featured' ); ?>
		<div class="post-meta-content">
			<div class="post-share">
				<?php te_share(); ?>
			</div>
			<?php get_template_part( 'templates/partials/inc', 'meta2' ); ?>
		</div>
	</div>

	<div class="entry">

		<h1><?php the_title(); ?></h1>

		<?php the_content(); ?>

		<?php //wp_link_pages( array( 'before' => 'Pages: ', 'next_or_number' => 'number' ) ); ?>

		<?php wp_pagenavi( array( 'type' => 'multipart' ) ); ?>

		<?php //the_tags( 'Tags: ', ', ', ''); ?>

	</div>

</article>
