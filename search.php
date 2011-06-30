<?php
/**
 * @package WordPress
 * @subpackage wp-lucasr
 */

get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>

<h2 class="secondary"><?php _e('Search Results', 'lucasr'); ?></h2>

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

<?php the_excerpt(); ?>

</div> <!-- end of postContent -->

</div> <!-- end of post -->

<?php endwhile; ?>

<div class="navigation clear">

<div class="left"><?php next_posts_link('&larr; '.__('Older Entries', 'lucasr')) ?></div>
<div class="right"><?php previous_posts_link(__('Newer Entries', 'lucasr').' &rarr;') ?></div>

</div> <!-- end of navigation -->

<?php else : ?>

<h2><?php _e('No posts found. Try a different search?', 'lucasr'); ?></h2>

<?php get_search_form(); ?>		

<?php endif; ?>

</div>

<?php get_footer(); ?>
