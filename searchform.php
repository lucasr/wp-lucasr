<?php
/**
 * @package WordPress
 * @subpackage lucasr.org 
 */
?>

<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">

<p>

<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input type="submit" id="searchSubmit" value="<?php _e('Search', 'lucasr'); ?>" />

</p>

</form>
