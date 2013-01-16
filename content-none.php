<?php
/**
* The template for displaying a "No posts found" message.
*
* @package WordPress
* @subpackage lucasr
*/
?>

          <article id="post-0" class="post no-results not-found">

            <header class="entry-header">

              <hgroup>
                <h1 class="entry-title"><?php _e( 'Nothing found', 'lucasr' ) ?></h1>
                <h2 class="entry-date"><?php _e( 'Try a search?', 'lucasr' ); ?></h2>
              </hgroup>

            </header> <!-- .entry-header -->

            <div class="entry-content">
              <?php get_search_form(); ?>
            </div> <!-- .entry-content -->

          </article> <!-- #post -->