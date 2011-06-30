<?php
/*
Template Name: Archives 
*/

get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('post clear page') ?> id="post-<?php the_ID(); ?>">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'lucasr'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<div class="postContent clear">

<? the_content(); ?>

<h2 class="secondary">Most Popular</h2>

<?php WPPP_show_popular_posts( "title=&number=10&show=posts&days=0&format=<a href='%post_permalink%' title='%post_title_attribute%'>%post_title%</a>" );?>

<h2 class="secondary">Most Commented</h2>

<ul>
<?php most_commented_posts();?>
</ul>

<h2 class="secondary">All Posts</h2>

<?php
 
// Declare some helper vars
$previous_year = $year = 0;
$previous_month = $month = 0;
$ul_open = false;
 
// Get the posts
$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
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

<h3 class="secondary"><?php the_time('F Y'); ?></h3>

<ul class="month_archive">

<?php $ul_open = true; ?>

<?php endif; ?>

<?php $previous_year = $year; $previous_month = $month; ?>

<li><span class="the_day"><?php the_time('j'); ?></span> <span class="the_article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></li>
 
<?php endforeach; ?>

</ul>

</div> <!-- end of postContent -->

</div> <!-- end of post -->

<?php endwhile; endif; ?>

</div> <!-- end of content -->

<?php get_footer(); ?>
