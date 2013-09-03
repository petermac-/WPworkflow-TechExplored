<?php

/**
 * Template for comments and pingbacks, via _s theme.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since _techexplored 1.0
 */
if ( ! function_exists( '_techexplored_comment' ) ) :
function _techexplored_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', '_techexplored' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', '_techexplored' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID() ?>" class="comment">
			<div>
				<div class="comment-author vcard">
					<div class="innervcard">
						<?php echo get_avatar($comment, $size='48'); ?>
						<?php printf( __( '%s <span class="says">says:</span>', '_techexplored' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', '_mbbasetheme' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-main">
					<div class="comment-meta">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( __( '%1$s at %2$s', '_techexplored' ), get_comment_date(), get_comment_time() ); ?>
						</time></a>
						<?php edit_comment_link( __( '(Edit)', '_techexplored' ), ' ' );
						?>
					</div><!-- comment-meta -->
		
					<div class="comment-content"><?php comment_text() ?></div>

					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div>
					
				</div><!-- comment-main -->
			</div>
		</div><!-- comment-id -->
	</li>

	<?php
			break;
	endswitch;
}
endif; // ends check for _techexplored_comment()