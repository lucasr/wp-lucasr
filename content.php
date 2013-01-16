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

                <h2 class="entry-date"><?php the_date( 'F j, Y' ); ?></h2>
              </hgroup>

              <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry-image">
                <div data-picture data-alt="<?php lucasr_the_post_thumbnail_caption(); ?>">
                  <div data-src="<?php lucasr_the_post_thumbnail_small(); ?>"></div>
                  <div data-src="<?php lucasr_the_post_thumbnail_medium(); ?>" data-media="(min-width: 480px)"></div>
                  <div data-src="<?php lucasr_the_post_thumbnail_large(); ?>" data-media="(min-width: 960px)"></div>

                  <!--[if (lt IE 9) & (!IEMobile)]>
                      <div data-src="<?php lucasr_the_post_thumbnail_large(); ?>" data-media="(min-width: 960px)">
                  <![endif]-->

                  <noscript>
                    <img src="<?php lucasr_the_post_thumbnail_large(); ?>" alt="<?php lucasr_the_post_thumbnail_caption(); ?>">
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

            <div class="entry-discuss">
              <p>Got something to add? Find me on <a href="http://twitter.com/lucasratmundo" title="Tweet to @lucasratmundo">Twitter</a>
              and <a href="http://gplus.to/lucasr" title="Find me on Google+">Google+</a></p>
            </div> <!-- .entry-discuss -->

            <div class="entry-meta">
              <?php echo get_avatar( get_the_author_meta('ID'), 100 ); ?>
              <p>
                <span class="entry-author"><?php the_author_meta( 'display_name' ); ?></span>
                <?php the_author_meta( 'description' ); ?>
                <a href="about"><?php _e( 'More about me', "lucasr" ); ?>&rarr;</a>
              </p>
            </div> <!-- .entry-meta -->

            <?php endif; ?>

          </article> <!-- #post -->