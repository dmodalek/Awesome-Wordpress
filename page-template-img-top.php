<?php

/*
 * Template Name: Image Sidebar
 */

get_header();

	while (have_posts()) :
		the_post();

//		module('content', 'img-sidebar', 'img-sidebar');

	endwhile;

get_footer();

?>