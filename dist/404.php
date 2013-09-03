<?php get_header(); ?>

	<div id="innerwrapper">
	
		<div id="logo">
			<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo( 'name', 'raw' ); ?>"><img src="/wp-content/themes/techexplored2.0/images/logo.png" alt="Tech Explored Logo" /></a>
		</div>

		<div id="container">

			<div id="content_box">
	
				<div id="content" class="page col">
		
					<h1>My 404 page is better than yours.</h1>
						
					<div class="entry">
						
						<p>Welcome to the seedy underbelly of this otherwise upstanding Web site. There are 2 possible reasons that you are here:<br />1) You are attempting to access a restricted page for clan members only<br />2) Somebody f***** up<br />So let's just say you don't have permissions to access this page.  Please choose from the following in order to get back on track:</p>
							
						<ul>
							<li>Try the ol' back button on your browser&#8212;it <em>is</em> the most used button on the Web, you know.</li>
							<li>Head on back <a href="<?php echo home_url(); ?>">home</a>.</li>
							<li>Try the navigation menu at the top &uarr; of the page.</li>
						</ul>
							
					</div>
						
				</div><!-- content -->
					
				<?php if ( is_active_sidebar(1) ) { get_sidebar(); } ?>
		
			</div><!-- content_box -->

		</div><!-- container -->

		<?php get_footer(); ?>
			
	</div><!-- innerwrapper -->

</body>
</html>