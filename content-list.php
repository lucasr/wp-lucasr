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

                <h2 class="entry-date"><?php the_time( _x( 'F j, Y', 'post date format', 'lucasr' ) ); ?></h2>
              </hgroup>

              <div class="entry-image">
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'lucasr' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                  <div data-picture data-alt="<?php lucasr_the_post_thumbnail_caption(); ?>">
                    <div data-src="<?php lucasr_the_post_thumbnail( 'small', true ); ?>"></div>
                    <div data-src="<?php lucasr_the_post_thumbnail( 'medium', true ); ?>" data-media="(min-width: 480px) and (max-width: 767px)"></div>

                    <!--[if (lt IE 9) & (!IEMobile)]>
                        <div data-src="<?php lucasr_the_post_thumbnail ( 'small', true ); ?>" data-media="(min-width: 960px)">
                    <![endif]-->

                    <noscript>
                      <img src="<?php lucasr_the_post_thumbnail( 'medium', true ); ?>" alt="<?php lucasr_the_post_thumbnail_caption(); ?>">
                    </noscript>
                  </div>
                </a>
              </div>

            </header> <!-- .entry-header -->

          </article> <!-- #post -->