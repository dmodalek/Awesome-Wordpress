<?php

/*
 * Template Name: Image Top
 */

get_header();

	while (have_posts()) :
		the_post();

		echo module('content')->template('img-top')->skin('img-top');

	endwhile;

get_footer();

?>