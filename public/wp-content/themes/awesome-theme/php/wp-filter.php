<?php

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

	$count = preg_match_all('/<img.*class="(.*wp-image-([0-9]+)[^"]+)[^>]+>/i', $content, $images);

	// Immediately return if $images is not as we expect it to be
	// - $images[0] contains the <img> html markup
	// - $images[1] contains the image classes
	// - $images[2] contains the image id's

	if (is_array($images) == false || count($images) !== 3) return $content;

	// Replace each image markup with picturefill markup
	for ($i = 0; $i < $count; $i++) {

		$image_markup = $images[0][$i];
		$contentImagesClasses = $images[1][$i];
		$image_id = $images[2][$i];
		$contentImagesAlt = '';

		// Get content images
		$contentImages = array();

		foreach (Theme::$MEDIA_SIZES_CUSTOM['content'] as $size => $attribs) {

			$imgAttribs = wp_get_attachment_image_src($image_id, 'content' . '_' . $size);

			if ($imgAttribs !== false) {
				$contentImagesAlt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				$contentImages[$size]['size'] = $size;
				$contentImages[$size]['source'] = $imgAttribs[0];
				$contentImages[$size]['width'] = $imgAttribs[1];
				$contentImages[$size]['height'] = $imgAttribs[2];
			} else {
				return $content;
			}
		}

		// Replace the normal <img> tag with the picturefill, based on template
		$options = array('data' => array(
			'images' => $contentImages,
			'images_alt' => $contentImagesAlt,
			'images_classes' => $contentImagesClasses
		));

		$picturefill_markup = partial('image', $options);

		// Search the content for the image and replace it with the new markup
		$content = str_replace($image_markup, $picturefill_markup, $content);
	}

	return $content;
}

// replace content images with picturefill
// - add late priority because must be performed after html5 captions
add_filter('the_content', 'picturefill_content', 1000);


?>