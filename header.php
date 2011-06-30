<?php
/**
 * @package WordPress
 * @subpackage wp-lucasr
 */
?>

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-GB">

<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>

<?php if (is_front_page()) : ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/frontpage.css" type="text/css" media="screen" />
<?php endif; ?>

<link rel="icon" type="image/png" href="http://www.lucasr.org/favicon.ico">
<link rel="SHORTCUT ICON" type="image/png" href="http://www.lucasr.org/favicon.ico">

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

</head>

<body>

<div id="header">

<div id="header-content" class="clear">

<h1 class="logo"><a href="/"><?php bloginfo('name'); ?></a></h1>

<?php wp_page_menu(array('show_home' => '1', 'exclude' => '1291')); ?>

</div> <!-- #header-content -->

</div> <!-- #header -->

<div id="wrapper">
