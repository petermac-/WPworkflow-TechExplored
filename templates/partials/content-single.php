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
				<span class="post-share-facebook">
					<div class="fb-like" data-width="80" data-layout="button_count" data-show-faces="false" data-send="false"></div>
				</span>
				<span class="post-share-twitter">
					<a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true">Tweet</a>
				</span>
				<span class="post-share-google">
					<div class="g-plusone" data-size="medium"></div>
					<script type="text/javascript">
					  (function() {
					    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					    po.src = 'https://apis.google.com/js/plusone.js';
					    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
				</span>
			</div>
			<?php get_template_part( 'templates/partials/inc', 'meta2' ); ?>
		</div>
	</div>

	<section class="content-single">

		<div class="entry">

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			<?php //wp_link_pages( array( 'before' => 'Pages: ', 'next_or_number' => 'number' ) ); ?>

			<?php wp_pagenavi( array( 'type' => 'multipart' ) ); ?>

			<?php //the_tags( 'Tags: ', ', ', ''); ?>

		</div>

		<div class="post-navigation">

			<?php
				echo "<div class=\"post-navigation-content";
				$prev_post = get_previous_post();
				$next_post = get_next_post();
				if (!empty( $next_post ) && !empty( $prev_post )) { 
					echo ' prev-next">'; 
				} else if(empty( $next_post ) && !empty( $prev_post )) {
					echo ' prev-only">';
				} else if(!empty( $next_post ) && empty( $prev_post )) {
					echo ' next-only">';
				}
			?>

				<?php
					$prev_post = get_previous_post();
					if (!empty( $prev_post )): ?>
						<div class="prev-post">
							Previous Post
				  		<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
				  			<?php $prevtitle = $prev_post->post_title;
				  				echo get_the_post_thumbnail($prev_post->ID, 'thumbnail');
				  				echo "<div class=\"post-navigation-title\">" . $prevtitle . "</div>"; ?>
				  		</a>
							<?php //previous_post_link('%link','%title',0); ?>
						</div>
				<?php endif; ?>
			
				<?php
					$next_post = get_next_post();
					if (!empty( $next_post )): ?>
						<div class="next-post">
							Next Post
				  		<a href="<?php echo get_permalink( $next_post->ID ); ?>">
				  			<?php $nexttitle = $next_post->post_title;
				  				echo get_the_post_thumbnail($next_post->ID, 'thumbnail');
				  				echo "<div class=\"post-navigation-title\">" . $nexttitle . "</div>"; ?>
				  		</a>
							<?php //next_post_link('%link','%title',0); ?>
						</div>
				<?php endif; ?>
				
			</div>

		</div>

	</section>

</article>
