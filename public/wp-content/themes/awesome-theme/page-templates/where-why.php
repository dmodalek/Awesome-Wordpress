<?php

/*
 * Template Name: Where / Why
 */

get_header();

	while (have_posts()) :
		the_post();

		echo module('content');
		echo module('map')->template('icelabs')->skin('icelabs');
		echo module('icelab-list');

	endwhile;

get_footer();

?>