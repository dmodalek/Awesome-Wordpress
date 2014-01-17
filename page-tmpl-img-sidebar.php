<?php

/*
 * Template Name: Images Sidebar
 */

get_header();

	while (have_posts()) :
		the_post();

		echo module('content')->template('img-sidebar')->skin('img-sidebar');

	endwhile;

get_footer();

?>