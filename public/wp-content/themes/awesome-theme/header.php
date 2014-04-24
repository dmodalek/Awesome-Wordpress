<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="description" content="">

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-precomposed.png">
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="//ajax.googleapis.com" rel="dns-prefetch">

		<script src="<?php echo get_template_directory_uri(); ?>/js/dyn/modernizr-2.6.2.min.js" type="text/javascript"></script>

		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/dyn/html5shiv-printshiv-3.7.1.js" type="text/javascript"></script>
		<![endif]-->

		<!-- Live Reload !-->
		<? if(APP_ENV == 'dev') { echo '<script>document.write(\'<script src="http://\' + (location.host || \'localhost\').split(\':\')[0] + \':35729/livereload.js?snipver=1"></\' + \'script>\')</script>'; } ?>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<div class=container">

			<header class="header" role="banner">
				<h1>Awesome Kickstart</h1>
				<?php echo module('logo') ?>
				<?php echo module('mainnav') ?>
			</header>