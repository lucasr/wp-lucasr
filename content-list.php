<?php
/**
* The default template for displaying posts. Used for both single
* and index/archive/search.
*
* @package WordPress
* @subpackage lucasr
*/
?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">

              <hgroup>
                <h1 class="entry-title">
                  <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'lucasr' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h1>

                <h2 class="entry-date">AA<?php the_date( _x( 'F j, Y', 'post date format', 'lucasr' ) ); ?></h2>
              </hgroup>

              <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry-image">
                <img src="<?php lucasr_the_post_thumbnail_small(); ?>" alt="<?php lucasr_the_post_thumbnail_caption(); ?>">
              </div>
              <?php else : ?>
              <div class="entry-image">
                <img src="http://placehold.it/480x200">
              </div>
              <?php endif; ?>

            </header> <!-- .entry-header -->

            <div class="entry-summary">
              <?php the_excerpt(); ?>
            </div> <!-- .entry-summary -->

          </article> <!-- #post -->