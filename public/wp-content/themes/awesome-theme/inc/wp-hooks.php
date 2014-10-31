<?php

/**
 * Enqueue scripts and styles for front end.
 *
 * @return void
 */

function theme_scripts() {

	wp_deregister_script('jquery');

	switch(APP_ENV) {

		case 'dev':	wp_register_style('theme-styles', get_template_directory_uri() . '/built/styles.css', array(), false, 'all');
					wp_register_script('theme', get_template_directory_uri() . '/built/scripts.js', array(), false, true);
					break;
		default:	wp_register_style('theme-styles', get_template_directory_uri() . '/built/styles.min.css', array(), false, 'all');
					wp_register_script('theme', get_template_directory_uri() . '/built/scripts.min.js', array(), false, true);
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

/**
 * Remove Admin Toolbar for all Users
 */

add_filter('show_admin_bar', '__return_false');


/**
 * Extend the default WordPress body classes.
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */

function theme_body_classes( $classes ) {

	$classes[] = 'mod mod-layout';

	if(APP_ENV == 'dev') { $classes[] = 'skin-layout-dev'; }

	if(is_front_page()) { $classes[] = 'skin-layout-home'; }

	return $classes;
}

add_filter( 'body_class', 'theme_body_classes' );


/**
 * Tiny MCE customisations
 *
 * @link http://www.kathyisawesome.com/506/custom-styles-for-wordpress-3-9
 *
 * @param array $opts
 * @return array
 */
function theme_tiny_mce_before_init(array $opts) {

	// Add .richtext class to tiny mce
	$opts['body_class'] = 'richtext';

	// Define Styles in Dropdown
	$opts['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3';

	// Add custom Format for Format Button, see next Function
	$style_formats = array (
    	array( 'title' => 'Intro Text', 'block' => 'p', 'classes' => 'intro' ),
	);
    $opts['style_formats'] = json_encode( $style_formats );
    $opts['style_formats_merge'] = false;

	return $opts;
}

add_filter('tiny_mce_before_init', 'theme_tiny_mce_before_init');

// Add Format Button to Tiny MCE
function theme_mce_buttons_2( $buttons ){
    array_splice( $buttons, 1, 0, 'styleselect' );
    return $buttons;
}

add_filter( 'mce_buttons_2', 'theme_mce_buttons_2' );


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
 * Replaces content images with picturefill
 *
 * Image sizes definitions must be from large to smaller sizes, because Picturefill chooses first MQ that matches
 *
 * @param $content
 * @return mixed
 */

function picturefill_content($content) {

	// Looking for wp images in the content
	// - it looks for all text that starts with <img
	// - followed by one or more characters
	// - followed by wp-image-
	// - get the image id using (.*?)[\"| ]
	// - terminate using [^>]+. which looks proceeds until > is found

	$count = preg_match_all('/<img.*class="(.*wp-image-([0-9]*)[^"]*).*alt="([^"]*)".*width="([^"]*)"[^>]*>/i', $content, $images);

	//	echo  'Markup: '.htmlentities($images[0][0]).'<br/>';
	//	echo  'Classes: '.htmlentities($images[1][0]).'<br/>';
	//	echo  'ID: '.htmlentities($images[2][0]).'<br/>';
	//	echo  'Alt: '.htmlentities($images[3][0]).'<br/>';
	//	echo  'Width: '.htmlentities($images[4][0]).'<br/>';

	// Immediately return if $images is not as we expect it to be
	if (is_array($images) == false || count($images) !== 5) return $content;

	// Replace each image markup with picturefill markup
	for ($i = 0; $i < $count; $i++) {

		// Original image
		$orig_image_markup = $images[0][$i];
		$orig_image_classes = $images[1][$i];
		$orig_image_id = $images[2][$i];
		$orig_image_alt = $images[3][$i];
		$orig_image_width = $images[4][$i];
		preg_match('/size-([a-z]*)/i', $orig_image_classes, $orig_image_name_match);
		$orig_image_name = $orig_image_name_match[1];

		// Helper Vars
		$allSizes = array();
		$currentWidth = '';
		$currentWidthHighRes = '';

		// Iterate over all media sizes and output the ones that make sense
		foreach(Theme::$MEDIA_SIZES as $size_name => $attribs) {

			$imgAttribs = wp_get_attachment_image_src($orig_image_id, $size_name);

			// Check if next iteration has a bigger version
			if($currentWidth !== $imgAttribs[1]) {
				$currentWidth = $imgAttribs[1];

				// Does this image exist? Do not output images that are bigger than the original
				if ($imgAttribs !== false && $orig_image_width >= $imgAttribs[1]) {

					// Standard res version
					$allSizes[$size_name]['size'] = $size_name;
					$allSizes[$size_name]['source'] = $imgAttribs[0];
					$allSizes[$size_name]['mq'] = Theme::$MEDIA_SIZES[$size_name][3];

					// High res versions
					foreach (Theme::$HIGH_RES_FACTORS as $highResFactor) {
						$imgAttribsHighRes = wp_get_attachment_image_src($orig_image_id, $size_name.'@'.$highResFactor.'x');

						// Check if next iteration has a bigger version as previous iteration
						if ($currentWidthHighRes !== $imgAttribsHighRes[1] && $currentWidth !== $imgAttribsHighRes[1]) {
							$currentWidthHighRes = $imgAttribs[1];

							// Does this image exist? Do not output images that are bigger than the original
							if ($imgAttribsHighRes !== false && $orig_image_width * $highResFactor >= $imgAttribsHighRes[1]) {
								$allSizes[$size_name . '@' . $highResFactor . 'x']['size'] = $size_name;
								$allSizes[$size_name . '@' . $highResFactor . 'x']['source'] = $imgAttribsHighRes[0];
								$allSizes[$size_name . '@' . $highResFactor . 'x']['mq'] = sprintf(Theme::$HIGH_RES_MQ, Theme::$MEDIA_SIZES[$size_name][3], $highResFactor, $highResFactor * Theme::$STANDARD_DPI);
							}
						}
					}
				}
			}
		}

		// Replace the normal <img> tag with the picturefill, based on template
		$options = array('data' => array(
			'images' => $allSizes,
			'images_width' => $orig_image_width,
			'images_classes' => $orig_image_classes,
			'images_id' => $orig_image_id,
			'images_alt' => $orig_image_alt,
			'images_name' => $orig_image_name,
			'images_fallback' => wp_get_attachment_image_src($orig_image_id, $orig_image_name)
		));

		$picturefill_markup = partial('picturefill-image', $options);

		// Search the content for the image and replace it with the new markup
		$content = str_replace($orig_image_markup, $picturefill_markup, $content);
	}

	return $content;
}

// replace content images with picturefill
// - add late priority because must be performed after html5 captions
add_filter('the_content', 'picturefill_content', 1000);


?>