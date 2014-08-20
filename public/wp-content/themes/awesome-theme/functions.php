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
require get_template_directory() . '/includes/wp-theme.php';
require get_template_directory() . '/includes/wp-shortcodes.php';
require get_template_directory() . '/includes/wp-posttypes.php';
require get_template_directory() . '/includes/wp-taxonomies.php';
require get_template_directory() . '/includes/wp-walker.php';
require get_template_directory() . '/includes/wp-filter.php';
require get_template_directory() . '/includes/wp-actions.php';

require get_template_directory() . '/includes/terrific.php';
require get_template_directory() . '/includes/helper.php';

/*
 * Init / Setup Theme
 */
add_action('after_setup_theme', 'Theme::after_setup_theme');
add_action('admin_init',        'Theme::admin_init');

?>