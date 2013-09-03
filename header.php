<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php if ( is_home() && get_bloginfo('description') ) { bloginfo('description'); ?> – <?php } else { wp_title(' - ',true, 'right'); }; bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png" />
	<link rel="alternate" type="application/rss+xml" title="Tech Explored's RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<!--<script src="<?php echo get_template_directory_uri();?>/assets/js/vendor/alertify.min.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/assets/js/source/plugins.js"></script>-->
	<?php echo file_get_contents('http://192.168.1.131/techexplored/wp-content/themes/techexplored/header.html'); ?>
</head>

<body <?php body_class(); ?> >
<!--[if lt IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
	<header>
		<div class="logo-main">
			<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo( 'name', 'raw' ); ?>">
				<span class="site-logo">Technology Explored</span>
			</a>
		</div>
		<span class="menu-header-search">
		      <div class="header-search-icon"></div>
		      <div class="header-search-dropdown">
		      	<form class="header-search-form" method="get" action="<?php echo home_url(); ?>">
		        	<input class="header-search-input" type="text" value="..." name="s" id="s" onfocus="if (this.value == '...') {this.value = '';}" onblur="if (this.value == '') {this.value = '...';}" />
		        	<button class="search-button" name="submit">
		          		<span class="search-button-text">Search</span>
		        	</button>
		      	</form>
		      </div>
		</span>
	</header>

	<nav>
		<?php wp_nav_menu( array( 'menu_class' => 'navbar-main', 'theme_location' => 'primary' ) ); ?>
	</nav>

	<section class="container">