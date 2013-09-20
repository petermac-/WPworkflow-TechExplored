<?php

/****************************************
Backend Functions
*****************************************/

/**
 * Customize Contact Methods
 * @since 1.0.0
 *
 * @author Bill Erickson
 * @link http://sillybean.net/2010/01/creating-a-user-directory-part-1-changing-user-contact-fields/
 *
 * @param array $contactmethods
 * @return array
 */
function te_contactmethods( $contactmethods ) {
	unset( $contactmethods['aim'] );
	unset( $contactmethods['yim'] );
	unset( $contactmethods['jabber'] );

	return $contactmethods;
}

/**
 * Register Widget Areas
 */
function te_widgets_init() {
	// Main Sidebar
	register_sidebar(array(
		'name'          => __( 'Main Sidebar', 'te' ),
		'id'            => 'main-sidebar',
		'description'   => __( 'Widgets for Main Sidebar.', 'te' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	// Footer Left
	register_sidebar(array(
		'name'          => __( 'Footer Left', 'te' ),
		'id'            => 'footer-widgets-left',
		'description'   => __( 'Widgets for Footer.', 'te' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	// Footer Right
	register_sidebar(array(
		'name'          => __( 'Footer Right', 'te' ),
		'id'            => 'footer-widgets-right',
		'description'   => __( 'Widgets for Footer.', 'te' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));
}

/**
 * Don't Update Theme
 * @since 1.0.0
 *
 * If there is a theme in the repo with the same name,
 * this prevents WP from prompting an update.
 *
 * @author Mark Jaquith
 * @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 *
 * @param array $r, request arguments
 * @param string $url, request url
 * @return array request arguments
 */
function te_dont_update_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}

/**
 * Remove Dashboard Meta Boxes
 */
function te_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incomite_links']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

/**
 * Change Admin Menu Order
 */
function te_custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	return array(
		// 'index.php', // Dashboard
		// 'separator1', // First separator
		// 'edit.php?post_type=page', // Pages
		// 'edit.php', // Posts
		// 'upload.php', // Media
		// 'gf_edit_forms', // Gravity Forms
		// 'genesis', // Genesis
		// 'edit-comments.php', // Comments
		// 'separator2', // Second separator
		// 'themes.php', // Appearance
		// 'plugins.php', // Plugins
		// 'users.php', // Users
		// 'tools.php', // Tools
		// 'options-general.php', // Settings
		// 'separator-last', // Last separator
	);
}

/**
 * Hide Admin Areas that are not used
 */
function te_remove_menu_pages() {
	// remove_menu_page('link-manager.php');
}

/**
 * Remove default link for images
 */
function te_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	$image_set2 = get_option( 'image_default_size' );
	
	if ($image_set !== 'file') {
		update_option('image_default_link_type', 'file');
	}
	if($image_set2 !== 'full') {
		update_option('image_default_size', 'full');
	}
}

/**
 * Show Kitchen Sink in WYSIWYG Editor
 */
function te_unhide_kitchensink($args) {
	$args['wordpress_adv_hidden'] = false;
	return $args;
}

/****************************************
Frontend
*****************************************/

/**
 * Enqueue scripts
 */
function te_scripts() {
	// CSS first
	//wp_register_style('te_style', get_stylesheet_directory_uri().'/style.css', null, '1.0', 'all' );
	//wp_enqueue_style( 'te_style' );
	// JavaScript
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( !is_admin() ) {
		//wp_enqueue_script('jquery');
		//wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, NULL );
		//wp_enqueue_script('customplugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array('jquery'), NULL, true );
		//wp_enqueue_script('customscripts', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), NULL, true );
		//wp_enqueue_script('customscripts', get_template_directory_uri() . '/assets/js/vendor/jquery.easing.1.3.js', array('jquery'), NULL, true );
	}
}

/**
 * Remove Query Strings From Static Resources
 */
function te_remove_script_version($src){
	$parts = explode('?', $src);
	return $parts[0];
}

/**
 * Remove Read More Jump
 */
function te_remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}

function te_custom_gallery_format($content) {
	if(has_tag('Gallery')) {
		remove_filter( 'the_content', 'wpautop' );
		$content = str_replace('<p></p>','',$content);
		$content = str_replace('<a','<a data-effect="mfp-zoom-in"',$content);
	}
	return $content;
}
add_filter('the_content','te_custom_gallery_format',0);

function te_custom_excerpt( $length ) {
	global $post;
	  $raw_excerpt = $text;
	  if ( '' == $text ) {
	    $text = get_the_content('');
	    $text = strip_shortcodes( $text );
	    $text = apply_filters('the_content', $text);
	    $text = str_replace('\]\]\>', ']]&gt;', $text);
	  }
	
	$pos = strpos($text, '<p class="download-box"');
	if($pos !== FALSE) {
		$posEnd = strpos($text, '</p>', $pos);
		$length = $posEnd + 4 - $pos;
		$text = substr($text, 0, $pos) . substr($text, $posEnd); // remove <p class="download-box"> node
	}

	$pos = strpos($text, '<script>');
	if($pos !== FALSE) {
		$posEnd = strpos($text, '</script>', $pos);
		$length = $posEnd + 9 - $pos;
		$text = substr($text, 0, $pos) . substr($text, $posEnd); // remove <script>*</script>
	}

	//$text = preg_replace('~<script>*</script>~', '', $text);
	$text = strip_tags($text, '<a></a>');
	$text = preg_replace('/^\s+|\n|\r|\s+$/m', ' ', $text);

	//$title = get_the_title();
	/*if( strlen($text) > 315 ) {
		if( strlen($title) > 45 ) {
			//$excerpt_length = apply_filters('excerpt_length', 43);
			//$excerpt_more = apply_filters('excerpt_more', '...');
			$text = substr($text, 0, 315);
			//$text = wp_trim_words( $text, $excerpt_length, $excerpt_more ); //since wp3.3
		} else {
			//$excerpt_length = apply_filters('excerpt_length', 60);
			//$excerpt_more = apply_filters('excerpt_more', '...');
			$text = substr($text, 0, 385);
			//$text = wp_trim_words( $text, $excerpt_length, $excerpt_more ); //since wp3.3
		}
	}*/
	$text = substr($text, 0, 650);
	//$text = substr($text, 0, strripos($text, " "));
	//$text = rtrim($text); //posts that had crayon syntax plugin removed from excerpt had an extra space at the end
	//$text = $text.'...';

	/*$words = explode(' ', $text, $excerpt_length + 1);
	  if (count($words)> $excerpt_length) {
	    array_pop($words);
	    $text = implode(' ', $words);
	    $text = $text . $excerpt_more;
	  } else {
	    $text = implode(' ', $words);
	  }
	return $text;*/
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt); //since wp3.3
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'te_custom_excerpt');

//-------[ add arrow to navigation menu ]-------
add_filter('wp_nav_menu_items','add_arrow_to_menu', 10, 2);
function add_arrow_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return "<div class=\"icon-elloup-dir\"></div>".$items;

    return $items;
}

//-------[ check if post body contains image ]-------
function post_image() {
     do_action('post_image');
}
function post_has_image($content) {
	//$content = $post->post_content;
	//$searchimages = '~<img [^>]* />~';
	$searchnestedimages = '~<a [^>]*><img [^>]* /></a>~';
	/*Run preg_match_all to grab all the images and save the results in $pics*/

	//preg_match_all( $searchimages, $content, $pics );
	preg_match_all( $searchnestedimages, $content, $pics );

	// Check to see if we have at least 1 image
	$iNumberOfPics = count($pics[0]);

	if ( $iNumberOfPics > 0 ) {
	     // Your post have one or more images.
		$content .= '<script src="' . get_stylesheet_directory_uri() . '/assets/js/vendor/magnificpopup.js"></script>';
		$content .= "<script> (function($) { $('.entry').magnificPopup({ delegate: 'a', type: 'image', removalDelay: 500, callbacks: { beforeOpen: function() { this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim'); this.st.mainClass = this.st.el.attr('data-effect'); } }, gallery: { enabled: true, preload: [0,2], navigateByImgClick: true, arrowMarkup: '<button title=\"%title%\" type=\"button\" class=\"mfp-arrow mfp-arrow-%dir%\"></button>', tPrev: 'Previous (Left arrow key)', tNext: 'Next (Right arrow key)', tCounter: '<span class=\"mfp-counter\">%curr% of %total%</span>' }, closeOnContentClick: true, midClick: true }); })(jQuery); </script>";
		
		for($i=0; $i < $iNumberOfPics; $i++) {
			//$content = $content . $imgs[0][0];
			$tmp = str_replace('<a','<a data-effect="mfp-zoom-in"',$pics[0][$i]);
			$content = str_replace($pics[0][$i],$tmp,$content);
			//$content = str_replace('<a','<a data-effect="mfp-zoom-in"',$content);
		}
	}
	return $content;
}
//add_action('post_image', 'post_has_image');
add_filter('the_content','post_has_image',10);