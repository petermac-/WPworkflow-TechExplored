<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
		
		<div id="innerwrapper">
	
			<div id="logo">
				<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo( 'name', 'raw' ); ?>"><img src="/wp-content/themes/techexplored2.0/images/logo.png" alt="Tech Explored Logo" /></a>
			</div>

			<div id="container">

				<div id="content_box">

					<div id="content" class="page">
		
						<h1>Browse the Archives...</h1>
						<div class="entry">
							<p><strong>Monthly archives:</strong><p>
							<ul>
								<?php wp_get_archives('type=monthly'); ?>
							</ul>
							<p><strong>Topical archives:</strong></p>
							<ul>
								<?php wp_list_categories('title_li=0'); ?>
							</ul>
						</div>
			
					</div><!-- content -->

					<?php get_sidebar(); ?>
	
				</div><!-- content_box -->

			</div><!-- container -->
			
			<?php get_footer(); ?>

		</div><!-- innerwrapper -->
		
</body>
</html>