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

        <div class="archives">

          <div class="span6">

            <h3>Recent Posts</h3>

            <?php $recent_posts = lucasr_get_recent_posts(); ?>

            <table class="table">
              <tbody>

                <?php if ( $recent_posts->have_posts() ) : ?>

                  <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                    <tr>
                      <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                    </tr>
                  <?php endwhile; ?>

                  <?php wp_reset_query(); ?>
                  <?php wp_reset_postdata(); ?>

                <?php else : ?>

                  <!-- Show no posts UI here -->
                  Nope.

                <?php endif; // end $recent_posts->have_posts() check ?>

              </tbody>
            </table>

          </div> <!-- .span6 -->

          <div class="span6">

            <h3>Most Popular</h3>

            <?php $popular_posts = lucasr_get_popular_posts(); ?>

            <table class="table">
              <tbody>

                <?php if ( $popular_posts->have_posts() ) : ?>

                  <?php while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>
                    <tr>
                      <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                    </tr>
                  <?php endwhile; ?>

                  <?php wp_reset_query(); ?>
                  <?php wp_reset_postdata(); ?>

                <?php else : ?>

                  <!-- Show no posts UI here -->
                  Nope.

                <?php endif; // end $popular_posts->have_posts() check ?>

              </tbody>
            </table>

          </div> <!-- .span6 -->

        </div> <!-- .archives -->

      </div> <!-- .row-fluid -->

<?php get_footer(); ?>