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

function theme_setup() {

	/*
	 * APP Env
	 */
	if(defined(APP_ENV) == false) {
		define(APP_ENV, 'prod');
	}

	/**
	 * Define Paths
	 *
	 * The same paths are defined for Javascript in terrific-bootstrap.js
	 */

	define('BUILT_DIR', '/dist');

	/*
	 * Register Nav Menus
	 */
	register_nav_menus( array(
		'main-menu'   => __( 'Main Menu', 'theme' ),
		'lang-menu' => __( 'Lang Menu', 'theme' ),
		'footer-menu' => __( 'Footer Menu', 'theme' ),
	));

	/*
	 * Register Post Thumbnails
	 */

	add_theme_support('post-thumbnails' );

	// Update default sizes
	update_option('thumbnail_size_w',140);
	update_option('thumbnail_size_h', 140);
	update_option('medium_size_w', 298);
	update_option('medium_size_h', 200);
	update_option('large_size_w', 400);
	update_option('large_size_h', 300);

	// Update default alignment and size
	update_option('image_default_align', 'left');
	update_option('image_default_size', 'medium');

	// Add additional image sizes
	add_image_size('theme-sidebar', 298, 200, false);
	add_image_size('theme-content-header', 880, 400, false);

	add_image_size('theme-profile-header', 767, 178, true);
	add_image_size('theme-profile-medium', 200, 200, false);
	add_image_size('theme-profile-media', 200, 65, false);
	add_image_size('theme-page-media', 200, 65, false);


	// Add multiple Post Thumbnails
	if (class_exists('MultiPostThumbnails')) {
		$types = array('page');
		foreach($types as $type) {
			new MultiPostThumbnails(array(
				'label' => 'Secondary Image',
				'id' => 'secondary-image',
				'post_type' => $type
				)
			);
			new MultiPostThumbnails(array(
				'label' => 'Third Image',
				'id' => 'third-image',
				'post_type' => $type
				)
			);
		}
	}

	/*
	 * Theme Frontend Languages
	 */
	load_theme_textdomain('theme', get_template_directory() . '/languages');


	/*
	 * Editor Styles
	 *
	 * Add theme.css to include frontend styles in tiny mce
	 * Overwrite any styles via wordpress.scss
	 */

	if(APP_ENV == 'dev') {
		add_editor_style(BUILT_DIR . '/theme.css');
	} else {
		add_editor_style(BUILT_DIR . '/theme.min.css');
	}


	/*
	 * Switch default core markup for search form, comment form, and comments to output valid HTML5
	 */
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list',
	));

	/*
	 * Enable support for Post Formats, see http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	));
}
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Enqueue scripts and styles for front end.
 *
 * @return void
 */
function theme_scripts() {

	// jQuery CDN
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', false, null, true); // Can't add without protocol 'cause of WordPress
	wp_enqueue_script('jquery');

	switch(APP_ENV) {

		case 'dev':	wp_register_style('theme-styles', get_template_directory_uri() . BUILT_DIR . '/theme.css', array(), false, 'all');
					wp_register_script('theme', get_template_directory_uri() . BUILT_DIR . '/theme.js', array('jquery'), false, true);
					break;
		default:	wp_register_style('theme-styles', get_template_directory_uri() . BUILT_DIR . '/theme.min.css', array(), false, 'all');
					wp_register_script('theme', get_template_directory_uri() . BUILT_DIR . '/theme.min.js', array('jquery'), false, true);
	}

	wp_enqueue_style('theme-styles');
	wp_enqueue_script('theme');
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/**
 * Extend the default WordPress body classes.
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function theme_body_classes( $classes ) {

	$classes[] = 'mod mod-layout';

	if(APP_ENV == 'dev') { $classes[] = 'skin-layout-dev'; }

	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'theme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'theme_wp_title', 10, 2 );




/**
 * Include all files from the /inc directory
 */

require get_template_directory() . '/includes/wp-shortcodes.php';
require get_template_directory() . '/includes/wp-posttypes.php';
require get_template_directory() . '/includes/wp-taxonomies.php';
require get_template_directory() . '/includes/wp-walker.php';
require get_template_directory() . '/includes/wp-filter.php';

require get_template_directory() . '/includes/terrific.php';
require get_template_directory() . '/includes/helper.php';


/*
 * Constructor
 */

new Theme\PostType\Fact();
new Theme\PostType\Profile();

?>
