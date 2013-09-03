<?php
/**
 * The template used for displaying post meta information
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

<div class="meta">
	<?php the_time(); ?>
	<?php //echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
	<?php //the_author(); ?>
	<?php //comments_popup_link( 'No Comments', '1 Comment', '% Comments', 'comments-link', '' ); ?>
</div>
