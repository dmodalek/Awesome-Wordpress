<?php

if ( ! function_exists( 'theme_setup' ) ) :

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

	// Make Theme available for translation
	load_theme_textdomain('theme', get_template_directory() . '/languages');

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style('css/editor-style.css');

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support('post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size('theme-full-width', 1038, 576, true);

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'theme' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'theme' ),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list',
	));

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	));

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	)));

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
    	'additional_post_types' => 'page',
	));
}
endif; // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Terrific module markup
 */

function module($name, $template = null, $skin = null, $attr = array()) {
    $flat = strtolower($name);
    $dashed = strtolower(preg_replace(array('/([A-Z]+)([A-Z][a-z])/', '/([a-z\d])([A-Z])/'), array('\\1-\\2', '\\1-\\2'), $name));
    $template = $template == null ? '' : '-' . strtolower($template);
    $skin = $skin == null ? '' : ' skin-' . $dashed . '-' . $skin;
    $attributes = ' ';
    $additionalClasses = '';
    foreach ($attr as $key => $value) {
        if ($key === 'class' && $value !== '') {
            $additionalClasses .= ' ' . $value;
        }
        else {
            $attributes .= $key . '="' . $value . '" ';
        }
    }
    echo "<div class=\"mod mod-" . $dashed . $skin . $additionalClasses . "\"" . chop($attributes) . ">" . "\n";
    require dirname(__FILE__) . '/modules/' . $name . '/' . $flat . $template . '.html';
    echo "\n</div>";
}

/**
 * Enqueue scripts and styles for front end.
 *
 * @return void
 */
function theme_scripts() {

	// theme.css
	wp_register_style('theme-styles', get_template_directory_uri() . '/dist/theme.min.css', array(), false, all);
	wp_enqueue_style('theme-styles');

	// Enqueue Script: theme-head.js
	wp_register_script('theme-head', get_template_directory_uri() . '/dist/theme-head.min.js', array(), false, false);
	wp_enqueue_script('theme-head');

	// Enqueue Script: theme.js
	wp_register_script('theme', get_template_directory_uri() . '/dist/theme.min.js', array('jquery'), false, true);
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

	if (is_home()) {
		$classes[] = 'skinLayoutHome';
	}

	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function theme_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'theme_post_classes' );

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

require get_template_directory() . '/inc/helper.php';
require get_template_directory() . '/inc/posttypes.php';
require get_template_directory() . '/inc/taxonomies.php';
require get_template_directory() . '/inc/walker.php';


/**************************************************************/


/**
 * Register widget areas.
 *
 * @return void
 */
function theme_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'theme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );



?>