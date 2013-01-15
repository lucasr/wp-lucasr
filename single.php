<?php
/**
 * The single template file.
 *
 * @package WordPress
 * @subpackage lucasr
 */

get_header();?>

      <div class="row-fluid">

        <div class="span12">

          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
          <?php endwhile; ?>

        </div> <!-- span12 -->

      </div> <!-- row-fluid -->

<?php get_footer(); ?>