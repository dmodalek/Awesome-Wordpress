<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other 'pages'
 * on your WordPress site will use a different template.
 *
 */

get_header(); ?>

	<div id="main-content" class="main-content" role="main">

		<?php
		while (have_posts()) :
			the_post();

			module('content');

		endwhile;
		?>

		<?php get_sidebar('content'); ?>
	</div>

<?php
get_sidebar();
get_footer();
