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
                <?php if ( is_single() ) : ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php else : ?>
                <h1 class="entry-title">
                  <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'lucasr' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h1>
                <?php endif; ?>

                <h2 class="entry-date"><?php the_date( _x( 'F j, Y', 'post date format', 'lucasr' ) ); ?></h2>
              </hgroup>

              <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry-image">
                <div data-picture data-alt="<?php lucasr_the_post_thumbnail_caption(); ?>">
                  <div data-src="<?php lucasr_the_post_thumbnail ( 'small', false ); ?>"></div>
                  <div data-src="<?php lucasr_the_post_thumbnail ( 'medium', false ); ?>" data-media="(min-width: 480px)"></div>
                  <div data-src="<?php lucasr_the_post_thumbnail ( 'large', false ); ?>" data-media="(min-width: 960px)"></div>

                  <!--[if (lt IE 9) & (!IEMobile)]>
                      <div data-src="<?php lucasr_the_post_thumbnail( 'large', false ); ?>" data-media="(min-width: 960px)">
                  <![endif]-->

                  <noscript>
                    <img src="<?php lucasr_the_post_thumbnail ( 'large', false ); ?>" alt="<?php lucasr_the_post_thumbnail_caption(); ?>">
                  </noscript>
                </div>
                <p class="caption-text"><?php lucasr_the_post_thumbnail_caption() ?></p>
              </div>
              <?php endif; ?>

            </header> <!-- .entry-header -->

            <?php if ( is_search() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
              <?php the_excerpt(); ?>
            </div> <!-- .entry-summary -->
            <?php else : ?>
            <div class="entry-content">
              <?php the_content(); ?>
            </div> <!-- .entry-content -->

            <?php if ( get_the_author_meta( 'twitter' ) || get_the_author_meta( 'googleplus' ) ) : ?>

            <div class="entry-discuss">
              <p>
                <?php _e( 'Got something to add? Find me on '); ?>

                <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
                  <a href="<?php the_author_meta( 'twitter' ); ?>">Twitter</a>
                <?php endif; ?>

                <?php if ( get_the_author_meta( 'twitter' ) && get_the_author_meta( 'googleplus' ) ) : ?>
                  <?php _e( 'and', 'lucasr' ); ?>
                <?php endif; ?>

                <?php if ( get_the_author_meta( 'googleplus' ) ) : ?>
                  <a href="<?php the_author_meta( 'googleplus' ); ?>">Google+</a>
                <?php endif; ?>
              </p>
            </div> <!-- .entry-discuss -->

            <?php endif; ?>

            <div class="entry-meta">
              <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
              <p>
                <span class="entry-author"><?php the_author_meta( 'display_name' ); ?></span>
                <?php the_author_meta( 'description' ); ?>
                <a href="<?php lucasr_the_author_page( get_the_author_meta( 'user_login' ) ) ?>"><?php _e( 'More about me', "lucasr" ); ?>&rarr;</a>
              </p>
            </div> <!-- .entry-meta -->

            <?php endif; ?>

          </article> <!-- #post -->
