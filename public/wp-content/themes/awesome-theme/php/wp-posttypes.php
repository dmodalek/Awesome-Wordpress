<?php


namespace Theme\PostType;

//
// Initialized in functions.php
// - new Theme\PostType\Example();

class Example {

	public function __construct() {

		register_post_type(
			'examples',
			array(
				'labels' => array(
					'name'               => __( 'Examples', 'awesome-textdomain' ),
					'singular_name'      => __( 'Example', 'awesome-textdomain' ),
					'add_new'            => __( 'Add New', 'awesome-textdomain' ),
					'add_new_item'       => __( 'Add New Example', 'awesome-textdomain' ),
					'edit_item'          => __( 'Edit Example', 'awesome-textdomain' ),
				),

				// Backend
				'show_ui'             	=> true,
				'show_in_menu'        	=> true,
				'rewrite' => array(
					'slug' 				=> __('examples', 'awesome-textdomain'),
					'with_front' 		=> false
				),
				'menu_position'       	=> 50,
				'supports' => array(
					'title',
					'editor', 			// content
					'author',
					'thumbnail',		// featured image, current theme must also support post-thumbnails
					'excerpt',
					'custom-fields',
					'comments',			// also will see comment count balloon on edit screen
					'revisions', 		// will store revisions
					'page-attributes', 	// menu order, hierarchical must be true to show Parent option
					'post-formats',		// add post formats, see Post Formats
				),
				'show_in_nav_menus'   	=> true,

				// Capabilities
				'map_meta_cap'        	=> true,

				// Fronted
				'public' => true,
				'has_archive' => true,
				'exclude_from_search' 	=> false,
			)
		);
	}
}