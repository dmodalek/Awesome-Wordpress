<?php

class Theme {

	/**
	 * Media Sizes
	 *
	 * Order must be from small to large because last picturefill MQ matches
	 *
	 * 	[0] = max. width
	 * 	[1] = max. height
	 * 	[2] = crop (thumbnail only)
	 * 	[3] = media query (picturefill)
	 *
	 * 	Media Queries: When to switch an image with another size
	 *
	 * 	- Not the same as CSS Mediaqueries
	 * 	- Define based on the image size  and the content width i.e.
	 * 	  Image size + Difference Width of Content Area and Viewport
	 */

	// Used mainly for TinyMCE Editor and richtext in the frontend
	public static $MEDIA_SIZES = array(
		'thumbnail' => array(240, 240, false, '(min-width:1px)'),
		'medium' => array(340, 340, false, '(min-width: 300px)'),
		'large' => array(440, 440, false, '(min-width: 400px)'),
		'full' => array('', '', false, '(min-width: 500px)')
	);

	// Used for places like teaser, outside of the content area
	public static $MEDIA_SIZES_CUSTOM = array(
		'example' => array(
			'small' => array(240, 240, false, '(min-width:1px)'),
			'medium' => array(340, 340, false, '(min-width: 300px)'),
			'large' => array(440, 440, false, '(min-width: 400px)')
		)
	);

	public static $STANDARD_DPI = 72;
	public static $HIGH_RES_FACTORS = array(2);
	public static $HIGH_RES_MQ = '%1$s and (-webkit-min-device-pixel-ratio: %2$s), %1$s and (min-resolution: %3$sdpi)';


	/**
	 *
	 * Setup the Theme
	 *
	 */

	public static function after_setup_theme() {

		/**
		 * APP Env
		 */
		if(!defined(APP_ENV)) {
			define(APP_ENV, 'prod');
		};

		/**
		 * Make theme available for translation.
		 */
		load_theme_textdomain('awesome-textdomain', get_template_directory() . '/languages');

		/**
		 * Switch default core markup to valid HTML5
		 */
		add_theme_support('html5', array(
			'search-form', 'comment-form', 'comment-list',
		));

		/**
		 * Nav Menus
		 */
		register_nav_menus( array(
			'main-menu'   => __('Main Menu', 'awesome-textdomain'),
			'service-menu' => __('Service Menu', 'awesome-textdomain'),
//			'footer-menu' => __( 'Footer Menu', 'awesome-textdomain' ),
		));

		/**
		 *
		 * Register image sizes, including custom and high-res
		 *
		 */

		// default sizes
		foreach(self::$MEDIA_SIZES as $size => $attribs) {
			add_image_size($size, $attribs[0], $attribs[1], $attribs[2]);

			foreach(self::$HIGH_RES_FACTORS as $highResFactor) {
				add_image_size($size . '@' . $highResFactor . 'x', $attribs[0] * $highResFactor, $attribs[1] * $highResFactor, $attribs[2]);
			}
		}

		// custom sizes
		foreach(self::$MEDIA_SIZES_CUSTOM as $name => $sizes) {
			foreach($sizes as $size => $attribs) {
				add_image_size($name . '_' . $size, $attribs[0], $attribs[1], $attribs[2]);

				foreach(self::$HIGH_RES_FACTORS as $highResFactor) {
					add_image_size($name.'_'.$size . '@' . $highResFactor . 'x', $attribs[0] * $highResFactor, $attribs[1] * $highResFactor, $attribs[2]);
				}

			}
		}

		/**
		 * Post Thumbnails
		 */
		add_theme_support('post-thumbnails' );

		/**
		 * Add Styles to TinyMCE
		 *
		 * Adds element styles and Styles wrapped with .richtext
		 *
		 * @see 6-elements.less
		 * @see 9-wordpress.less
		 */

		if(APP_ENV == 'dev') {
			add_editor_style(get_template_directory_uri() . '/built/styles.css');
		} else {
			add_editor_style(get_template_directory_uri() . '/built/styles.min.css');
		}

		/**
		 * Register Custom Post Types
		 */

//		new Theme\PostType\Example();

	}


	public static function admin_init() {

		// Options
		self::options();
	}

	protected static function options() {

		// Update default sizes
		update_option('thumbnail_size_w', 	self::$MEDIA_SIZES['thumbnail'][0]);
		update_option('thumbnail_size_h', 	self::$MEDIA_SIZES['thumbnail'][1]);
		update_option('thumbnail_crop', 	self::$MEDIA_SIZES['thumbnail'][2]);

		update_option('medium_size_w',    	self::$MEDIA_SIZES['medium'][0]);
		update_option('medium_size_h',    	self::$MEDIA_SIZES['medium'][1]);

		update_option('large_size_w',     	self::$MEDIA_SIZES['large'][0]);
		update_option('large_size_h',     	self::$MEDIA_SIZES['large'][1]);

		// Update default alignment and size
		update_option('image_default_align', 		'none');
		update_option('image_default_link_type', 	'none'); // 'none', 'file', 'url'
		update_option('image_default_size', 		'medium');
	}
}