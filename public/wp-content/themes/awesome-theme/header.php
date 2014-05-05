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

		<!-- Icon Moon SVG Definition !-->
		<svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
			<defs>
				<g id="icon-bars">
					<path class="path1" d="M27.429 24v2.286q0 0.464-0.339 0.804t-0.804 0.339h-25.143q-0.464 0-0.804-0.339t-0.339-0.804v-2.286q0-0.464 0.339-0.804t0.804-0.339h25.143q0.464 0 0.804 0.339t0.339 0.804zM27.429 14.857v2.286q0 0.464-0.339 0.804t-0.804 0.339h-25.143q-0.464 0-0.804-0.339t-0.339-0.804v-2.286q0-0.464 0.339-0.804t0.804-0.339h25.143q0.464 0 0.804 0.339t0.339 0.804zM27.429 5.714v2.286q0 0.464-0.339 0.804t-0.804 0.339h-25.143q-0.464 0-0.804-0.339t-0.339-0.804v-2.286q0-0.464 0.339-0.804t0.804-0.339h25.143q0.464 0 0.804 0.339t0.339 0.804z" />
				</g>
			</defs>
		</svg>

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
