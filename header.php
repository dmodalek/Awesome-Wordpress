<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div class="site-main">
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?> class="no-js">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?> class="no-js">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.7.1-custom.js" type="text/javascript"></script>
	<![endif]-->

	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icons/apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icons/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icons/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icons/apple-touch-icon-57x57-precomposed.png">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icons/apple-touch-icon-precomposed.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="site-wrapper">

		<header class="site-header" role="banner">

			<? module('logo'); ?>

			<? module('main-menu'); ?>

			<? module('lang-menu'); ?>
		</header>

		<div class="site-main" role="main">
