<?php


namespace Theme\PostType;


class Fact {

	public function __construct() {

		register_post_type(
			'icelab_facts',
			array(
				'labels'      => array(
					'name' => __( 'Facts', 'icelab' ),
					'singular_name' => __( 'Facts', 'icelab' ),
					'add_new_item'    => __('Add Facts', 'icelab'),
					'edit_item'       => __('Edit Facts', 'icelab'),
					'update_item'     => __('Update Facts', 'icelab'),
					'add_new'         => __('Add Facts', 'icelab'),
				),

				// Backend
				'show_ui'             => true,
				'show_in_menu'        => true,
				'rewrite' 			  => array('slug' => __('/facts', 'icelab'), 'with_front' => false),
				'menu_position'       => 50,
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'page-attributes',
					'revisions',
				),
				'show_in_nav_menus'   => true,
				'capability_type'     => array('icelab_fact', 'icelab_facts'),

				// Capabilities
				'map_meta_cap'        => false,
				'capability_type'     => array('icelab_fact', 'icelab_facts'),

				// Fronted
				'public' => true,
				'has_archive' => true,
				'exclude_from_search' => false,
			)
		);
	}
}


class Profile {

	public function __construct() {

		register_post_type(
			'icelab_profile',
			array(
				'labels'      => array(
					'name' => __( 'Profile', 'icelab' ),
					'singular_name' => __( 'Profile', 'icelab' ),
					'add_new_item'    => __('Add Profile', 'icelab'),
					'edit_item'       => __('Edit Profile', 'icelab'),
					'update_item'     => __('Update Profile', 'icelab'),
					'add_new'         => __('Add Profile', 'icelab'),
				),

				// Backend
				'show_ui'             => true,
				'show_in_menu'        => true,
				'rewrite' 			  => array('slug' => __('where-why/list-of-all-icelabs/profile', 'icelab'), 'with_front' => false),
				'menu_position'       => 50,
				'supports' => array(
					'title',
					'page-attributes',
					'revisions'
				),
				'show_in_nav_menus'   => true,
				'capability_type'     => array('icelab_profile', 'icelab_profiles'),

				// Capabilities
				'map_meta_cap'        => false,
				'capability_type'     => array('icelab_profile', 'icelab_profiles'),

				// Fronted
				'public' => true,
				'has_archive' => true,
				'exclude_from_search' => false,
			)
		);
	}
}
