<?php
/**
* The default template for displaying pages.
*
* @package WordPress
* @subpackage lucasr
*/
?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">

              <hgroup>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <h2 class="entry-excerpt"><?php echo get_the_excerpt(); ?></h2>
              </hgroup>

              <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry-image">
                <?php the_post_thumbnail( 'hero-image' ); ?>
              </div>
              <?php endif; ?>

            </header> <!-- .entry-header -->

            <div class="entry-content">
              <?php the_content(); ?>
            </div> <!-- .entry-content -->

          </article> <!-- #post -->