<?php
/**
 * @package WordPress
 * @subpackage lucasr.org 
 */

// Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="alert"><?php _e('This post is password protected. Enter the password to view comments.', 'lucasr'); ?></p>

<?php
	return;
}
?>

<h2 id="comments"><?php comments_number(__('No Comment', 'lucasr'), __('One Comment', 'lucasr'), __('% Comments', 'lucasr'));?></h2>

<?php if ( have_comments() ) : ?>

    <ul id="commentlist">
    	<?php wp_list_comments(array('callback' => 'lucasr_comment', 'style' => 'li')); ?>
    </ul>
 
	<div class="navComments clear">
		<div class="left"><?php previous_comments_link() ?></div>
		<div class="right"><?php next_comments_link() ?></div>
	</div>

<?php else : ?>

	<?php if ( comments_open() ) : ?><p class="nocomments"><?php _e("Be the first to respond!", 'lucasr'); ?></p><?php endif; ?>
    
<?php endif; ?>


<?php if ( comments_open() ) : ?>

	<div id="respond">
		<h2><?php _e('Leave a Reply', 'lucasr'); ?></h2>
		<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php _e('You must be', 'lucasr'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logged in', 'lucasr'); ?></a> <?php _e('to post a comment', 'lucasr'); ?>.</p>
		<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( is_user_logged_in() ) : ?>
					<p><?php _e('Logged in as', 'lucasr'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'lucasr'); ?>"><?php _e('Log out', 'lucasr'); ?> &raquo;</a></p>
				<?php else : ?>
			    	<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
			    	<label for="author"><?php _e('Name', 'lucasr'); ?> <?php if ($req) echo "<small>(".__('required', 'lucasr').")</small>"; ?></label></p>
			    	<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
			    	<label for="email"><?php _e('Mail', 'lucasr'); ?> <small>(<?php _e('will not be published', 'lucasr'); ?>)</small> <?php if ($req) echo "<small>(".__('required', 'lucasr').")</small>"; ?></label></p>
			    	<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			    	<label for="url"><?php _e('Website', 'lucasr'); ?></label></p>
				<?php endif; ?>
							
				<p><textarea name="comment" id="comment" cols="52" rows="10" tabindex="4"></textarea></p>
				
				<?php if (function_exists(show_subscription_checkbox)) show_subscription_checkbox(); ?>
				
				<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Post Comment', 'lucasr'); ?>" class="submit" />
				<?php comment_id_fields(); ?><?php do_action('comment_form', $post->ID); ?></p>
				
			</form>
		<?php endif; // If registration required and not logged in ?>
	</div>
<?php else : // comments are closed ?>

	<p class="nocomments"><?php _e('Comments are closed.', 'lucasr'); ?></p>
	
<?php endif; ?>
