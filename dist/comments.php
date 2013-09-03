<?php
/**
* The template for displaying Comments.
 *
 * @package techexplored
 * @since techexplored 1.0
 */
 ?>

 <?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
 
<!-- You can start editing here. -->
 
 <div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comment-title"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h2>
		<p class="comment-subtitle">| discussion on &#8220;<?php the_title(); ?>&#8221;</p>

		<ol class="commentlist">
			<?php wp_list_comments('type=comment&callback=advanced_comment'); //this is the important part that ensures we call our custom comment layout defined above ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<div role="navigation" class="comment-navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', '_techexplored' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', '_techexplored' ) ); ?></div>
			</div>
		<?php endif; // check for comment navigation ?>
	
 	<?php endif; // have_comments() ?>
 
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', '_techexplored' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
 
</div><!-- #comments .comments-area -->
