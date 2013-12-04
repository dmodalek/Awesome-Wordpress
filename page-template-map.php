<?php

/*
 * Template Name: Map
 */

get_header();

	while (have_posts()) :
		the_post();

		module('content');
		module('map');

	endwhile;

get_footer();

?>