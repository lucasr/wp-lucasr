<?php
/**
 * The template file for search results.
 *
 * @package WordPress
 * @subpackage lucasr
 */

get_header();?>

      <div class="row-fluid">

        <div class="span12">

          <?php if ( have_posts() ) : ?>

            <header class="entry-header">

              <hgroup>
                <h1 class="archive-title"><?php printf( __( 'Search: %s', 'lucasr' ), get_search_query() ); ?></h1>
              </hgroup>

            </header>

            <ul class="archive thumbnails">

            <?php while ( have_posts() ) : the_post(); ?>
              <li class="span6">
                <div class="thumbnail">
                  <?php get_template_part( 'content', 'list' ); ?>
                </div>
              </li>
            <?php endwhile; ?>

            </ul>

            <div class="pagination">
              <?php lucasr_the_pagination_links(); ?>
            </div>

          <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

          <?php endif; // end have_posts() check ?>

        </div> <!-- span12 -->

      </div> <!-- row-fluid -->

<?php get_footer(); ?>