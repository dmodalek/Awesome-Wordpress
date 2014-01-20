<?php

/*
 * Template Name: Map
 */

get_header();

	while (have_posts()) :
		the_post();

		echo module('content');
		echo module('map')->template('icelabs')->skin('icelabs');

	endwhile;

get_footer();

?>