<?php

/*
 * Template Name: Facts List
 */

get_header();

	while (have_posts()) :
		the_post();

		module('facts-list');

	endwhile;

get_footer();

?>