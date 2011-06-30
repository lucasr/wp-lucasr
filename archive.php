<?php
/**
 * @package WordPress
 * @subpackage wp-lucasr
 */

get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="secondary"><?php _e('Archive for the', 'lucasr'); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category', 'lucasr'); ?></h2>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="secondary"><?php _e('Posts Tagged', 'lucasr'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="secondary"><?php _e('Archive for', 'lucasr'); ?> <?php the_time(__('F jS, Y', 'lucasr')); ?></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="secondary"><?php _e('Archive for', 'lucasr'); ?> <?php the_time(__('F, Y', 'lucasr')); ?></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="secondary"><?php _e('Archive for', 'lucasr'); ?> <?php the_time('Y'); ?></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="secondary"><?php _e('Author Archive', 'lucasr'); ?></h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="secondary"><?php _e('Blog Archives', 'lucasr'); ?></h2>
<?php } ?>

<?php while (have_posts()) : the_post(); ?>

<div <?php post_class('clear') ?> id="post-<?php the_ID(); ?>">

<?php if(function_exists(getILikeThis)) getILikeThis('get'); ?>

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'lucasr'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<div class="postInfos">

<strong>
<?php 
if(!function_exists('easy_relative_date')) { 
    the_time(__('F d, Y', 'lucasr'));
} else {
    echo easy_relative_date(get_the_time('U'), get_the_time('F d, Y'));
}
?>
<?php edit_post_link(__('Edit', 'lucasr'), ' | ', ''); ?>
</strong>

</div> <!-- end of postInfos -->

<div class="postContent clear">

<?php the_content(__('Continue reading', 'lucasr').' &rarr;'); ?>

</div> <!-- end of postContent -->

</div> <!-- end of post -->
		
<?php endwhile; ?>

<div class="navigation clear">

<div class="left"><?php next_posts_link('&larr; '.__('Older Entries', 'lucasr')) ?></div>
<div class="right"><?php previous_posts_link(__('Newer Entries', 'lucasr').' &rarr;') ?></div>

</div> <!-- end of navigation -->

<?php else :

if ( is_category() ) { // If this is a category archive
    printf('<p>'.__("Sorry, but there aren't any posts in the %s category yet.", 'lucasr').'</p>', single_cat_title('',false));
} else if ( is_date() ) { // If this is a date archive
    echo('<p>'.__("Sorry, but there aren't any posts with this date.", 'lucasr').'</p>');
} else if ( is_author() ) { // If this is a category archive
    $userdata = get_userdatabylogin(get_query_var('author_name'));
    printf('<p>'.__("Sorry, but there aren't any posts by %s yet.", 'lucasr').'</p>', $userdata->display_name);
} else {
    echo('<p>'.__('No posts found.', 'lucasr').'</p>');
}

get_search_form();

endif; ?>

</div>

<?php get_footer(); ?>
