<?php
/*
 * Template Name: Media
 */

get_header();

	while (have_posts()) :
		the_post();

		echo module('content', 'media');

	endwhile;

get_footer();
