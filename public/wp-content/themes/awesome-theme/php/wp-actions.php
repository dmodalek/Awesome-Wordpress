<?php

/**
 * Enqueue scripts and styles for front end.
 *
 * @return void
 */

function theme_scripts() {

//	wp_deregister_script('jquery');

	switch(APP_ENV) {

		case 'dev':	wp_register_style('theme-styles', get_template_directory_uri() . '/cache/styles.css', array(), false, 'all');
					wp_register_script('theme', get_template_directory_uri() . '/cache/scripts.js', array(), false, true);
					break;
		default:	wp_register_style('theme-styles', get_template_directory_uri() . '/cache/styles.min.css', array(), false, 'all');
					wp_register_script('theme', get_template_directory_uri() . '/cache/scripts.min.js', array(), false, true);
	}

	wp_enqueue_style('theme-styles');
	wp_enqueue_script('theme');
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/**
 * Removes stylesheets added by plugins
 *
 * @static
 *
 */

function remove_plugin_stylesheets() {
	wp_deregister_style('contact-form-7');
}

add_action('wp_enqueue_scripts', 'remove_plugin_stylesheets', 1000);


/**
 * Register our sidebars and widgetized areas.
 */

function widgets_init() {

	register_sidebar( array(
		'name' => 'Promo Homepage',
		'id' => 'promo-homepage',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array(
		'name' => 'Footer',
		'id' => 'footer',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	));
}

add_action('widgets_init', 'widgets_init');


/**
 * Remove some admin pages for authors
 */

function my_remove_menu_pages() {

    global $user_ID;

    if ( current_user_can( 'author' ) ) {
		remove_menu_page('index.php'); 			// Dashboard
		remove_menu_page('edit.php'); 			// Posts
		remove_menu_page('upload.php'); 		// Media
		remove_menu_page('edit-comments.php'); 	// Comments
		remove_menu_page('tools.php'); 			// Tools
    }
}

add_action( 'admin_init', 'my_remove_menu_pages' );

?>