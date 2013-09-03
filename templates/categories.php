<?php
/*
Template Name: Categories
*/
get_header(); ?>

	<div id="innerwrapper">
	
		<div id="logo">
			<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo( 'name', 'raw' ); ?>"><img src="/wp-content/themes/techexplored2.0/images/logo.png" alt="Tech Explored Logo" /></a>
		</div>

		<div id="container">

			<div id="content_box">
	
				<div id="content" class="categories">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
						
					<div class="catcol">
						
						<?php the_content('<p>Read the rest of this page &rarr;</p>'); ?>
							
						<?php wp_pagenavi( array( 'type' => 'multipart' ) ); ?>
						
					</div>
					
					<?php endwhile; endif; ?>

				</div><!-- content -->
		
			</div><!-- content_box -->

		</div><!-- container -->
			
		<?php get_footer(); ?>

	</div><!-- innerwrapper -->
	
</body>
</html>