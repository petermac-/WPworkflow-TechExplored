<?php
/**
 * The template used for displaying post navigation
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

	<div class="excerpt-thumb-container">
		
		<a class="excerpt-thumb" href="<?php the_permalink(); ?>">
			<?php
				if(has_post_thumbnail()) {
			    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
			    echo '<img src="' . $image_src[0] . '" />';
			  } else {
			  	echo '<img src="http://placehold.it/750x438" />';
			  }
			?>
	  </a>
	   
	</div>
