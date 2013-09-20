<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

	<?php //get_template_part( 'templates/partials/inc', 'featured' ); ?>

	<h1><?php the_title(); ?></h1>

	<div class="entry">

		<?php the_content(); ?>

		<?php //wp_link_pages( array( 'before' => 'Pages: ', 'next_or_number' => 'number' ) ); ?>

		<?php //wp_pagenavi( array( 'type' => 'multipart' ) ); ?>

	</div>

</article>
