<?php

class Theme {

	/**
	 * Default WordPress Media Sizes: [0] = max. width, [1] = max. height
	 *
	 * @var array
	 */
	public static $MEDIA_SIZES = array(
		'thumb' => array(0, 0),
		'medium'=> array(510, 510),
		'large' => array(0, 0),
	);

	public static $MEDIA_SIZES_CUSTOM = array(
		'content' => array(
			'small' => array('Content Small', 340, 340, false),
			'medium' => array('Content Medium', 510, 510, false),
			'large' => array('Content Large', 900, 900, false),
		)
	);

	public static $MEDIA_QUERY = array(
		'small' => '(max-width: 21em)',
		'medium' => '(min-width: 21.01em) and (max-width: 31em)',
		'large' => '(min-width: 31.01em)',
	);

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
		 * Post Thumbnails
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
		update_option('image_default_align', 'none');
		update_option('image_default_size', 'medium');

		foreach(self::$MEDIA_SIZES_CUSTOM as $name => $sizes) {
			foreach($sizes as $size => $attribs) {
				add_image_size($name . '_' . $size, $attribs[1], $attribs[2], $attribs[3]);
			}
		}

		// Add multiple Post Thumbnails (Plugin)
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

		/**
		 * Add Styles to TinyMCE
		 *
		 * Add Stylehseet to include frontend styles in tiny mce
		 * Overwrite any styles via wordpress.less
		 */
		if(APP_ENV == 'dev') {
			add_editor_style(get_template_directory_uri() . '/cache/styles.css');
		} else {
			add_editor_style(get_template_directory_uri() . '/cache/styles.min.css');
		}

		/**
		 * Post Types
		 */
	//	new Theme\PostType\Example();

	}


	public static function admin_init() {

		// Options
		self::options();
	}

	protected static function options() {

		// Update default sizes
		update_option('thumbnail_size_w', self::$MEDIA_SIZES['thumb'][0]);
		update_option('thumbnail_size_h', self::$MEDIA_SIZES['thumb'][1]);
		update_option('medium_size_w',    self::$MEDIA_SIZES['medium'][0]);
		update_option('medium_size_h',    self::$MEDIA_SIZES['medium'][1]);
		update_option('large_size_w',     self::$MEDIA_SIZES['large'][0]);
		update_option('large_size_h',     self::$MEDIA_SIZES['large'][1]);

		// Update default alignment and size
		update_option('image_default_align', 		'none');
		update_option('image_default_link_type', 	'none'); // 'none', 'file', 'url'
		update_option('image_default_size', 		'medium');
	}
}