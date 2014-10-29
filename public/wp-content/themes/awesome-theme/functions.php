<?php

/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */

/**
 * Include all files from the /include directory
 */
require get_template_directory() . '/inc/wp-theme.php';
require get_template_directory() . '/inc/wp-shortcodes.php';
require get_template_directory() . '/inc/wp-posttypes.php';
require get_template_directory() . '/inc/wp-taxonomies.php';
require get_template_directory() . '/inc/wp-walker.php';
require get_template_directory() . '/inc/wp-hooks.php';

require get_template_directory() . '/inc/terrific.php';
require get_template_directory() . '/inc/helper.php';

/*
 * Init / Setup Theme
 */
add_action('after_setup_theme', 'Theme::after_setup_theme');
add_action('admin_init',        'Theme::admin_init');

?>