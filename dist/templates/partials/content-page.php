<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

	<h1><?php the_title(); ?></h1>

	<div class="entry">

		<?php the_content(); ?>

	</div>

</article>
