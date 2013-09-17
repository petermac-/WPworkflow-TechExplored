<?php
/**
 * The template used for displaying content
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

	<?php if(has_tag('Gallery')) { ?>

		<article class="excerpt-gallery-container" id="post-<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>">

			<?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' ); ?>

				<div class="excerpt-gallery-img" style="<?php echo 'background-image: url(' . $image_src[0] . ')'?>">
					<?php //echo '<img src="' . $image_src[0] . '" />'; ?>
				</div>
				<a class="excerpt-title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2><span class="icon-ellopicture-2"></span></a>

			<?php } else { ?>

				<article class="excerpt" id="post-<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>">
				<?php	get_template_part( 'templates/partials/inc', 'thumbnail' ); ?>

		<div class="entry">

			<a class="excerpt-title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
			
			<div class="ellipsis"><?php the_excerpt(); ?></div>

			<a class="meta-link" href="<?php the_permalink(); ?>">
				<?php get_template_part( 'templates/partials/inc', 'meta' ); ?>
			</a>
		
		</div>
					<?php } ?>

</article>
