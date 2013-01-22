<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package WordPress
 * @subpackage lucasr
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

    <div id="page" class="container site">

      <header class="site-header">
        <h1>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
        </h1>
      </header>