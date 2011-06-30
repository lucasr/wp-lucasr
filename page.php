<?php
/**
 * @package WordPress
 * @subpackage lucasr.org 
 */

get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('post clear page') ?> id="post-<?php the_ID(); ?>">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'lucasr'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<div class="postContent clear">

<?php the_content(); ?>

<?php wp_link_pages(array('before' => '<p class="pagination"><span>'.__('Pages', 'lucasr').'</span> ', 'after' => '</p>', 'pagelink' => '<strong>%</strong>')); ?>

</div> <!-- end of postContent -->

</div> <!-- end of post -->

<?php endwhile; endif; ?>

</div> <!-- end of content -->

<?php get_footer(); ?>
