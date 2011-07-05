<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>

<div id="content">

<div <?php post_class('post clear') ?>>

<h1 class="tweet"><?php twitter_messages('lucasratmundo', 1, false, false, false, true, true, false); ?></h1>

<div class="tweet-info">
&#8212;Follow me on <a title="Follow me on Twitter" href="http://www.twitter.com/lucasratmundo">Twitter</a>
</div>

<div class="postContent">

<p class="intro">

Hi! I posted

<!-- Show latest post title -->
<?php query_posts('showposts=1'); ?>

<?php while (have_posts()) : the_post(); ?>
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?> in my blog"><?php the_title(); ?></a>
<?php endwhile;?>

<!-- Link to blog index -->
in my <a href="/blog">blog</a>.

<!-- Show an item from the 'reading' shelf in GoodReads -->
I'm now reading <?php bookshelf() ?>.

<!-- Show top 3 artists from the weekly chart in Last.fm -->
I've been <a href="http://www.last.fm/user/lucasrocha" target="_blank" title="My Last.fm profile">listening</a> to music by <?php ilastfm(true); ?> lately.

<!-- Link to latest photo in Flickr -->
My latest uploaded photo is called <?php get_flickrRSS(); ?>.

<!-- Link to about page -->
Have a look at the <a href="/about">about page</a> if you want to learn a bit about me.</p>

</p>

</div>

</div>

</div>

<? get_footer(); ?>
