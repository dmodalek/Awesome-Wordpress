<?php
/*
 * Template Name: Media Files
 */

get_header();

	while (have_posts()) :
		the_post();

		echo module('content', 'media');

	endwhile;

get_footer();
