<?php
/**
 * @package WordPress
 * @subpackage wp-lucasr
 */

get_header(); ?>

<div id="content" class="col620">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div <?php post_class('clear post-'.get_the_time('Y')) ?> id="post-<?php the_ID(); ?>">
		<?php if(function_exists(getILikeThis)) getILikeThis('get'); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'lucasr'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<div class="col140 postInfos">
                        <?php 
                        if(!function_exists('easy_relative_date')) { 
                            the_time(__('F d, Y', 'lucasr'));
                        } else {
                            echo easy_relative_date(get_the_time('U'), get_the_time('F d, Y'));
                        }
                        ?>
                        <?php edit_post_link(__('Edit', 'lucasr'), ' | ', ''); ?>
		</div>
		<div class="col460 postContent clear">
			<?php the_content(__('Continue reading', 'lucasr').' &rarr;'); ?>
			<?php wp_link_pages(array('before' => '<p class="pagination"><span>'.__('Pages', 'lucasr').'</span> ', 'after' => '</p>', 'pagelink' => '<strong>%</strong>')); ?>
		</div>
	</div>

<?php endwhile; ?>
	
	<?php comments_template(); ?>

<?php endif; ?>

</div>

<?php get_footer(); ?>
