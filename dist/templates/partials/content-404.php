<?php
/**
 * The template used for the 404 page content
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

<section class="page-404">

	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404.png" alt="" />

	<div class="page-404-text">The page you are looking for doesn't exist.</div>

	<div class="page-404-search-container">
		<form class="page-404-search-form" method="get" action="/search">
     <input class="page-404-search-input" type="text" value="Enter keywords and press enter" name="q" id="s" onfocus="if (this.value == 'Enter keywords and press enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter keywords and press enter';}" />
     <button class="page-404-search-button" type="submit">
        <span class="page-404-search-button-text"><span class="icon-ellosearch-6"></span></span>
     </button>
   </form>
 </div>

</section>
