<?php

if ( ! function_exists( 'te_setup' ) ):
function te_setup() {

	/****************************************
	Backend
	*****************************************/

	//-------[ Remove all unnecessary functions http://benword.com/how-to-hide-that-youre-using-wordpress/ ]-------
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

	//-------[ Remove unnecessary CSS http://benword.com/how-to-hide-that-youre-using-wordpress/ ]-------
	// Remove CSS added from the Recent Comments widget
	function roots_remove_recent_comments_style() {
	  global $wp_widget_factory;
	  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
	    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	  }
	}
	add_action('wp_head', 'roots_remove_recent_comments_style', 1);

	// Remove CSS added from galleries
	function roots_gallery_style($css) {
	  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
	}
	add_filter('gallery_style', 'roots_gallery_style');

	//-------[ remove CSS from specified plugins ]-------
	add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
	function my_deregister_styles() {
	  wp_deregister_style( 'adv-spoiler' );
	  wp_deregister_style( 'jquery-ui-lightness-dialog' );
	  //wp_deregister_style( 'scrollGallery2' );
	  //wp_deregister_style( 'scrollGallery2Design' );
	  wp_deregister_style( 'wp-pagenavi' );
	  wp_deregister_style( 'wp-pagenavi-style' );
	  //crayon
	  wp_dequeue_style( 'crayon' );
	  wp_dequeue_style( 'crayon-global' );
	  wp_dequeue_style( 'crayon_style' );
	  wp_dequeue_style( 'crayon_global_style' );
	  wp_dequeue_style( 'crayon-font-consolas' );
	  wp_dequeue_style( 'crayon-theme-mirc-dark' );
	  wp_dequeue_style( 'crayon-theme-tomorrow-night' );
	  wp_dequeue_style( 'crayon-font-courier-new' );
	  //wp-slimbox2
	  wp_deregister_style( 'slimbox2' );
	  wp_deregister_style( 'slimbox2-RTL' );
	  wp_deregister_style( 'farbtastic' );
	  //nggallery.php
	  wp_deregister_style( 'NextGEN' );
	  wp_deregister_style( 'thickbox' );
	  wp_deregister_style( 'shutter' );
	  //photo-dropper
	  wp_dequeue_style( 'pdrp_styles' );
	}

	add_action( 'wp_print_styles', 'my_deregister_scripts', 100 );
	function my_deregister_scripts() {
	  wp_deregister_script( 'adv-spoiler' );
	  //wp_deregister_script( 'slimbox2_autoload' );
	  //wp_deregister_script( 'slimbox2' );
	  //wp_deregister_script( 'thickbox' );
	  wp_deregister_script( 'quicktags' );
	  wp_deregister_script( 'gsc_dialog' );
	  //NextGen Gallery
	  wp_deregister_script( 'photocrati_ajax' );
	}

	//wp_register_script('slimbox2', WP_PLUGIN_URL.'/wp-slimbox2/javascript/slimbox2.js',array('jquery'), '2.04');

	add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
	function dequeue_jquery_migrate( &$scripts){
		if(!is_admin()){
			$scripts->remove( 'jquery');
			$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
		}
	}

	//-------[ added to deregister jQuery if not in the admin dashboard ]-------
	if(is_admin()) {
		wp_deregister_script( 'jquery' );
	}

	//-------[ disable built in search ]-------
	function fb_filter_query( $query, $error = true ) {
		if ( is_search() ) {
			$query->is_search = false;
			$query->query_vars[s] = false;
			$query->query[s] = false;

			// to error
			if ( $error == true ) {
				$query->is_404 = true;
			}
		}
	}

	add_action( 'parse_query', 'fb_filter_query' );
	add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

	//-------[ disable HTML in comments ]-------
	add_filter( 'pre_comment_content', 'wp_specialchars' );

	//-------[ remove autop in admin dash ]-------
	if(is_admin()) {
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_excerpt', 'wpautop' );
	}

	//-------[ remove "Howdy" from top right in admin bar in admin dash ]-------
	function replace_howdy( $wp_admin_bar ) {
	    $my_account=$wp_admin_bar->get_node('my-account');
	    $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );            
	    $wp_admin_bar->add_node( array(
	        'id' => 'my-account',
	        'title' => $newtitle,
	    ) );
	}
	add_filter( 'admin_bar_menu', 'replace_howdy',25 );

	//-------[ hide help in admin bar in admin dash ]-------
	function hide_help() {
	    echo '<style type="text/css">
	            #contextual-help-link-wrap { display: none !important; }
	          </style>';
	}
	add_action('admin_head', 'hide_help');

	//-------[ remove wordpress logo dropdown from admin bar in admin dash ]-------
	function wps_admin_bar() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('wp-logo');
	    $wp_admin_bar->remove_menu('about');
	    $wp_admin_bar->remove_menu('wporg');
	    $wp_admin_bar->remove_menu('documentation');
	    $wp_admin_bar->remove_menu('support-forums');
	    $wp_admin_bar->remove_menu('feedback');
	    $wp_admin_bar->remove_menu('view-site');
	}
	add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

	//-------[ remove editor option in admin menu ]-------
	function remove_editor_menu() {
	  remove_action('admin_menu', '_add_themes_utility_last', 101);
	}
	add_action('_admin_menu', 'remove_editor_menu', 1);

	//-------[ remove admin color scheme from profile ]-------
	function admin_color_scheme() {
	   global $_wp_admin_css_colors;
	   $_wp_admin_css_colors = 0;
	}
	add_action('admin_head', 'admin_color_scheme');

	//-------[ post excerpt thumbnail support ]-------
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300, 225, true ); // default Post Thumbnail dimensions (cropped)
	}

	//-------[ add post thumbnail column in main post page ]-------
	// Add the posts and pages columns filter. They can both use the same function.
	add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
	add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);

	// Add the column
	function tcb_add_post_thumbnail_column($cols){
	  $cols['tcb_post_thumb'] = __('Featured','techexplored');
	  return $cols;
	}

	function my_custom_login_logo() {
	    echo '<style type="text/css">
	        h1 a { background-image:url('.get_bloginfo('template_url').'/images/login.png) !important; }
	    </style>';
	}
	add_action('login_head', 'my_custom_login_logo');


	// Hook into the posts an pages column managing. Sharing function callback again.
	add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
	add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);

	// Grab featured-thumbnail size post thumbnail and display it.
	function tcb_display_post_thumbnail_column($col, $id){
	  switch($col){
	    case 'tcb_post_thumb':
	      if( function_exists('the_post_thumbnail') )
	        echo the_post_thumbnail( 'admin-list-thumb' );
	      else
	        echo 'Not supported in theme';
	      break;
	  }
	}

	//-------[ stop tinymce from removing line breaks and BR tags ]-------
	function cbnet_tinymce_config( $init ) {

	// Don't remove line breaks
	$init['remove_linebreaks'] = false;
	// Convert newline characters to BR tags
	$init['convert_newlines_to_brs'] = true;
	// Do not remove redundant BR tags
	$init['remove_redundant_brs'] = false;

	// Pass $init back to WordPress
	return $init;
	}
	add_filter('tiny_mce_before_init', 'cbnet_tinymce_config');

	// Register menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'techexplored' ),
	) );

	// Register Widget Areas
	add_action( 'widgets_init', 'te_widgets_init' );

	// Execute shortcodes in widgets
	// add_filter('widget_text', 'do_shortcode');

	// Add RSS links to head
	add_theme_support( 'automatic-feed-links' );

	// Add Editor Style
	add_editor_style( 'editor-style.css' );

	// Don't update theme
	add_filter( 'http_request_args', 'te_dont_update_theme', 5, 2 );

	// Prevent File Modifications
	define ( 'DISALLOW_FILE_EDIT', true );

	// Set Content Width
	if ( ! isset( $content_width ) ) $content_width = 900;

	// Enable Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add Image Sizes
	// add_image_size( $name, $width = 0, $height = 0, $crop = false );

	// Enable Custom Headers
	// add_theme_support( 'custom-header' );

	// Enable Custom Backgrounds
	// add_theme_support( 'custom-background' );

	// Remove Dashboard Meta Boxes
	add_action('wp_dashboard_setup', 'te_remove_dashboard_widgets' );

	// Change Admin Menu Order
	add_filter('custom_menu_order', 'te_custom_menu_order');
	add_filter('menu_order', 'te_custom_menu_order');

	// Hide Admin Areas that are not used
	add_action( 'admin_menu', 'te_remove_menu_pages' );

	// Remove default link for images
	add_action('admin_init', 'te_imagelink_setup', 10);

	// Show Kitchen Sink in WYSIWYG Editor
	add_filter( 'tiny_mce_before_init', 'te_unhide_kitchensink' );

	// Define custom post type capabilities for use with Members
	add_action( 'admin_init', 'te_add_post_type_caps' );


	/****************************************
	Frontend
	*****************************************/

	// Add Post Formats Theme Support
	// add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video') );

	// Enqueue scripts
	add_action( 'wp_enqueue_scripts', 'te_scripts' );

	// Remove Query Strings From Static Resources
	add_filter('script_loader_src', 'te_remove_script_version', 15, 1);
	add_filter('style_loader_src', 'te_remove_script_version', 15, 1);

	// Remove Read More Jump
	add_filter('the_content_more_link', 'te_remove_more_jump_link');

	//-------[ remove container from navigation menu ]-------
	function my_wp_nav_menu_args( $args = '' )
	{
	  $args['container'] = false;
	  return $args;
	} // function
	add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

	//-------[ don't show admin bar ]-------
	add_filter( 'show_admin_bar', '__return_false' );

	function delete_comment_link($id) {
	  if (current_user_can('edit_post')) {
	    echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'">Delete</a> ';
	    echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Mark as Spam</a>';
	  }
	}

	/**
	 * Post Time Format
	 */
	function te_time_ago() {
		global $post;

		$date = $post->post_date;
		$time = get_post_time('G', true, $post);
		$mytime = time() - $time;

		if($mytime > 0 && $mytime < 7*24*60*60)
		  $mytimestamp = sprintf(__('%s ago'), human_time_diff($time));
		else
		  $mytimestamp = date(get_option('date_format'), strtotime($date));
		return $mytimestamp;
	}
	add_filter('the_time', 'te_time_ago');

	function te_share() {
		do_action('te_share');
	}
	function te_share_content() {
		$content = apply_filters( 'te_share_content', $content );
		echo $content;
	}
	add_action('te_share', 'te_share_content');

	function te_pagenavi($out) {
		$before = "<div class='navigation'>";
		$after = "</div>";
		if($out != null) {
			$out = $before . $out . $after;
		} else if($out == null && is_search()) {
			//$out = apply_filters( 'te_pagenavi', $out );
			$out = "<span class=\"current\">1</span>";
			$out = "<div class='wp-pagenavi'>\n$out\n</div>";
		}
		echo $out;
	}
	add_action('wp_pagenavi', 'te_pagenavi', $out);

}
endif; // te_setup
add_action('after_setup_theme', 'te_setup');
