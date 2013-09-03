<?php
/**
 * The template used for displaying a comment form
 *
 * @package techexplored
 * @since techexplored 1.0
 */
?>

<div id="respond">
 
	<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
 
	<div class="cancel-comment-reply">
		<p><?php cancel_comment_reply_link(); ?></p>
	</div>
 
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
 
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
<?php if ( is_user_logged_in() ) : ?>

		<div class="user-comment">
 
			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		</div>
		
<?php else : //this is where we setup the comment input forums ?>
		<div class="commentinput">
 
			<p class="commentinput-name">
				<label for="author">Name: <?php if ($req) echo "(required)"; ?></label>
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			</p> 

			<p class="commentinput-email">
				<label for="email">Email: <?php if ($req) echo "(required)"; ?></label>
				<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</p>
 
			<p class="commentinput-site">
				<label for="url">Website:</label>
				<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			</p>
			
		</div>
 
<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
			<label for="comment">Comment:</label>
			<div class="commentbox"> 
					<textarea name="comment" id="comment" cols="10" rows="10" tabindex="4"></textarea>
				<div class="submit"> 
					<input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
				</div>
			</div>

<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
 
	</form>
 
<?php endif; // If registration required and not logged in ?>
</div>
