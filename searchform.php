<?php
/**
 * The template file for the search form.
 *
 * @package WordPress
 * @subpackage lucasr
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  <div class="input-append">
    <input class="span4" id="appendedInputButton" type="text" placeholder="<?php _e( 'Search posts by keyword', 'lucasr' ) ?>" name="s" id="s">
    <button class="btn" type="submit"><?php _e( 'Search', 'lucasr' ) ?></button>
  </div>
</form>