<?php

/*
 * Template Name: Image Top
 */

get_header();

	while (have_posts()) :
		the_post();

		module('content', 'img-top', 'img-top');

	endwhile;

get_footer();

?>