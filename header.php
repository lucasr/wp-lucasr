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

<link href='http://fonts.googleapis.com/css?family=Pacifico&subset=latin&v2' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700&subset=latin&v2' rel='stylesheet' type='text/css'>

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

<div class="content clear">

<h1><a href="/"><?php bloginfo('name'); ?></a></h1>

<?php wp_page_menu(array('show_home' => '1', 'exclude' => '1291')); ?>

</div> <!-- .content -->

</div> <!-- #header -->

<div id="wrapper">
