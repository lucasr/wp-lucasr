<?php
/**
 * The template file for the archive pages.
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
                <h1 class="archive-title"><?php
                  if ( is_day() ) :
                    printf( __( 'Archives: %s', 'lucasr' ), get_the_date() );
                  elseif ( is_month() ) :
                    printf( __( 'Archives: %s', 'lucasr' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'lucasr' ) ) );
                  elseif ( is_year() ) :
                    printf( __( 'Archives: %s', 'lucasr' ), get_the_date( _x( 'Y', 'yearly archives date format', 'lucasr' ) ) );
                  elseif ( is_category() ) :
                    printf( __( 'Category: %s', 'lucasr' ),  single_cat_title( '', false ) );
                  elseif ( is_tag() ) :
                    printf( __( 'Tag: %s', 'lucasr' ), single_tag_title( '', false ) );
                  elseif ( is_author() ) :
                    printf( __( 'Author: %s', 'lucasr' ), 'Lucas Rocha' );
                  else :
                    _e( 'Archives', 'lucasr' );
                  endif;
                  ?></h1>
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