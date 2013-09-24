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
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<!--[if lt IE 8]>
	    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	<header>
		<div class="logo-main">
			<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo( 'name', 'raw' ); ?>">
				<span class="site-logo">Technology Explored</span>
			</a>
		</div>
		<span class="header-social">
			<div class="fb-like" data-href="http://www.facebook.com/techexplored" data-width="80" data-layout="button_count" data-show-faces="false" data-send="false"></div>
		</span>
		<span class="header-social">
			<a href="https://twitter.com/techXplored" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" data-dnt="true">Follow @techXplored</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</span>
		<?php if(!is_page('Search') && !is_404()) { ?>
		<div class="header-search-container">
			<form class="header-search-form" method="get" action="/search">
	     <input class="header-search-input" type="text" value="Enter keywords and press enter" name="q" id="s" onfocus="if (this.value == 'Enter keywords and press enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter keywords and press enter';}" />
	     <button class="search-button" type="submit">
	        <span class="search-button-text"><span class="icon-ellosearch-6"></span></span>
	     </button>
	   </form>
   </div>
	<?php } ?>
	</header>

	<nav class="nav">
		<span class="header-navicon">lll</span>
		<?php wp_nav_menu( array( 'menu_class' => 'navbar-main', 'theme_location' => 'primary' ) ); ?>
	</nav>

	<section class="container">