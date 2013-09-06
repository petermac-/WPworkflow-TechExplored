<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php if ( is_home() && get_bloginfo('description') ) { bloginfo('description'); ?> – <?php } else { wp_title(' - ',true, 'right'); }; bloginfo('name'); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png" />
	<link rel="alternate" type="application/rss+xml" title="Tech Explored's RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script src="//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
	<script>
	  WebFont.load({
	    google: {
	      families: ['Signika', 'Forum', 'Actor', 'Average Sans', 'Ubuntu', 'Poly', 'Arvo', 'Oswald:400,300', 'Jura:300,400,500,600', 'Fjord+One']
	    }
	  });
	</script>
	<?php
		$dir = get_template_directory_uri() . '/';
		$head = file($dir . 'header.html');
		for($i=0; $i < count($head); $i++) {
			$tmp = $head[$i];
			if(strpos($tmp, 'src') !== false) {
				$tmp = str_replace('src="', 'src="' . $dir, $tmp);
			} else if(strpos($tmp, 'href') !== false) {
				$tmp = str_replace('href="', 'href="' . $dir, $tmp);
			}
			echo $tmp;
		}
	?>
	<?php wp_head(); ?>
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
		<?php if(!is_page('Search')) { ?>
		<div class="header-search-container">
			<form class="header-search-form" method="get" action="/search">
<<<<<<< HEAD
	     <input class="header-search-input" type="text" value="Enter keywords and press enter" name="q" id="s" onfocus="if (this.value == 'Enter keywords and press enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter keywords and press enter';}" />
	     <button class="search-button" type="submit">
=======
	     <input class="header-search-input" type="text" value="Enter keywords and press enter" name="s" id="s" onfocus="if (this.value == 'Enter keywords and press enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter keywords and press enter';}" />
	     <button class="search-button" type="submit" name="submit">
>>>>>>> e131a9fbafc8a0beb126d7bd1c55e97498e94799
	        <span class="search-button-text"><span class="icon-ellosearch-6"></span></span>
	     </button>
	   </form>
   </div>
	<?php } ?>
	</header>

	<nav class="nav">
<<<<<<< HEAD
		<span class="header-navicon">lll</span>
=======
	<span class="header-navicon">lll</span>
>>>>>>> e131a9fbafc8a0beb126d7bd1c55e97498e94799
		<?php wp_nav_menu( array( 'menu_class' => 'navbar-main', 'theme_location' => 'primary' ) ); ?>
	</nav>

	<section class="container">