<?php

/*
 * Template Name: Map
 */

get_header();

	while (have_posts()) :
		the_post();

		module('content');
		module('map', 'icelabs');

	endwhile;

get_footer();

?>