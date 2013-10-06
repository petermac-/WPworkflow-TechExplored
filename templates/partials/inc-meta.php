<?php
/**
 * The template used for displaying post meta information
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

<div class="meta">
	<?php echo te_time_ago( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
</div>
