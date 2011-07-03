<?php
/**
 * @package WordPress
 * @subpackage wp-lucasr
 */

get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('clear post-'.get_the_time('Y')) ?> id="post-<?php the_ID(); ?>">

<?php if(function_exists(getILikeThis)) getILikeThis('get'); ?>

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'lucasr'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<div class="post-info">

<?php 
if(!function_exists('easy_relative_date')) { 
    the_time(__('F d, Y', 'lucasr'));
} else {
    echo easy_relative_date(get_the_time('U'), get_the_time('F d, Y'));
}
?>
<?php edit_post_link(__('Edit', 'lucasr'), ' | ', ''); ?>

</div> <!-- end of post-info -->

<div class="postContent clear">

<?php the_content(__('Continue reading', 'lucasr').' &rarr;'); ?>

</div> <!-- end of postContent -->

</div> <!-- end of post -->

<?php endwhile; ?>
	
<div class="navigation clear archives">

<?php
 
// Declare some helper vars
$previous_year = $year = 0;
$previous_month = $month = 0;
$ul_open = false;
 
// Get the posts
$myposts = get_posts('numberposts=10&offset=4&orderby=post_date&order=DESC');
?>
 
<?php foreach($myposts as $post) : ?>	
 
<?php

// Setup the post variables
setup_postdata($post);

$year = mysql2date('Y', $post->post_date);
$month = mysql2date('n', $post->post_date);
$day = mysql2date('j', $post->post_date);

?>

<?php if($year != $previous_year || $month != $previous_month) : ?>

<?php if($ul_open == true) : ?>
</ul>
<?php endif; ?>

<h3><?php the_time('F Y'); ?></h3>

<ul class="month_archive">

<?php $ul_open = true; ?>

<?php endif; ?>

<?php $previous_year = $year; $previous_month = $month; ?>

<li><span class="the_day"><?php the_time('j'); ?></span> <span class="the_article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></li>
 
<?php endforeach; ?>

</ul>

<div class="right">
<a class="archive_link" href="/archives"><?php echo __('See all posts', 'lucasr'); ?></a> &rarr;
</div>

</div> <!-- end of navigation -->

<?php endif; ?>

</div> <!-- end of content -->

<?php get_footer(); ?>
