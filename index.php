<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage lucasr
 */

get_header();?>

      <div class="row-fluid">

        <div class="span12">

          <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
              <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>

          <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

          <?php endif; // end have_posts() check ?>

        </div> <!-- span12 -->

      </div> <!-- row-fluid -->

      <div class="row-fluid">

        <div class="span12">

          <?php $recent_posts = lucasr_get_recent_posts(); ?>

          <?php if ( $recent_posts->have_posts() ) : ?>

            <ul class="archive thumbnails">

            <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
              <li class="span6">
                <div class="thumbnail">
                  <?php get_template_part( 'content', 'list' ); ?>
                </div>
              </li>
            <?php endwhile; ?>

            <?php wp_reset_query(); ?>
            <?php wp_reset_postdata(); ?>

            </ul>

          <?php else : ?>

            <!-- Show no posts UI here -->

          <?php endif; // end $recent_posts->have_posts() check ?>

        </div> <!-- .span12 -->

      </div> <!-- .row-fluid -->

<?php get_footer(); ?>