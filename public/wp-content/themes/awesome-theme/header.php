<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="description" content="<?= bloginfo('description') ?>">
		<meta name="keywords" content="keyword1, keyword2, keyword3">

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-precomposed.png">
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="//ajax.googleapis.com" rel="dns-prefetch">

		<!-- Live Reload !-->
		<? if(APP_ENV == 'dev') { echo '<script>document.write(\'<script src="http://\' + (location.host || \'localhost\').split(\':\')[0] + \':35729/livereload.js?snipver=1"></\' + \'script>\')</script>'; } ?>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<?= partial('google-analytics'); ?>

		<div class="site-wrapper">

			<header class="site-header" role="banner">
				<div class="inner">
					<?php echo module('main-nav')->template('toggle')->skin('toggle') ?>
					<?php echo module('logo') ?>
					<?php echo module('main-nav')->template('items')->skin('items') ?>
				</div>
			</header>

			<div class="site-main" role="main">
				<div class="inner">
