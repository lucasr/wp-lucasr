<?php
/**
 * @package WordPress
 * @subpackage wp-lucasr
 */

automatic_feed_links();

function lucasr_tinymce_css($wp) {
$wp .= ',' . get_bloginfo('stylesheet_url').'?lala=1';
return $wp;
}
add_filter( 'mce_css', 'lucasr_tinymce_css' );

function lucasr_tinymce_init($initArray){
$initArray['spellchecker_languages'] = '+English=en';
$initArray['theme_advanced_statusbar_location'] = 'none';
$initArray['theme_advanced_toolbar_align'] = 'center';
$initArray['theme_advanced_buttons1'] = "bold,italic,strikethrough,|,bullist,numlist,blockquote,|,link,unlink,|,spellchecker,fullscreen,wp_adv";
return $initArray;
}
add_filter('tiny_mce_before_init', 'lucasr_tinymce_init');

wp_enqueue_script('theme_functions', get_bloginfo('template_url').'/js/functions.js', array('jquery'));

load_theme_textdomain('lucasr', TEMPLATEPATH.'/lang/');

function lucasr_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li class="clear" id="comment-<?php comment_ID() ?>">
    <div <?php comment_class('clear'); ?>>
    <div class="clear commentEntry">
        <?php if ($comment->comment_approved == '0') : ?>
            <p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
        <?php endif; ?>
        <?php comment_text() ?>
        <div class="commentAuthor">&#8212;<?php comment_type('', __('Trackback from', 'lucasr'), __('Pingback from', 'lucasr')); ?> <?php comment_author_link() ?>, <?php comment_date(__('F d, Y', 'lucasr')) ?></div>
        </div>
    </div>
<?php
}

function most_commented_posts($no_posts = 10, $before = '<li>', $after = '</li>', $show_pass_post = false, $duration='') {
    global $wpdb;

    $request = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'comment_count' FROM $wpdb->posts, $wpdb->comments";

    $request .= " WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish'";

    if(!$show_pass_post) $request .= " AND post_password =''";

    if($duration !="") { $request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
    }

    $request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";

    $posts = $wpdb->get_results($request);
    $output = '';

    if ($posts) {
        foreach ($posts as $post) {
            $post_title = stripslashes($post->post_title);
            $comment_count = $post->comment_count;
            $permalink = get_permalink($post->ID);
            $output .= $before . '<a href="' . $permalink . '" title="' . $post_title.'">' . $post_title . '</a>' . $after;
        }
    } else {
        $output .= $before . "None found" . $after;
    }

    echo $output;
}
?>
