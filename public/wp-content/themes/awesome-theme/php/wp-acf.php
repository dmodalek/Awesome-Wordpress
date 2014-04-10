<?php

if(function_exists("register_field_group"))
{

	register_field_group(array (
		'id' => 'acf_facts',
		'title' => 'Facts',
		'fields' => array (
			array (
				'key' => 'field_522b15a373caa',
				'label' => 'Areas of application',
				'name' => 'fact_areas',
				'type' => 'checkbox',
				'required' => 1,
				'choices' => array (
					'med' => 'Med',
					'sport' => 'Sport',
					'wellness' => 'Wellness',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_522b157f73ca9',
				'label' => 'Strasse',
				'name' => 'fact_street',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52322818cfbf7',
				'label' => 'PLZ Ort',
				'name' => 'fact_plz_city',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_522cb2f5d45ed',
				'label' => 'Country',
				'name' => 'fact_country',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_522cd6d880e30',
				'label' => 'Profile',
				'name' => 'fact_profile',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'profiles',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'facts',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-media',
		'title' => 'Page Media',
		'fields' => array (
			array (
				'key' => 'field_52d70aabdd76c',
				'label' => 'Media Files',
				'name' => 'page_media',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_52d78eb3ca17b',
						'label' => 'Section',
						'name' => 'page_media_section_title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_52d78ee19be8b',
						'label' => 'Files',
						'name' => 'page_media_section_files',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_52d78ef89be8c',
								'label' => 'File',
								'name' => 'page_media_section_file',
								'type' => 'file',
								'column_width' => '',
								'save_format' => 'object',
								'library' => 'all',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'row',
						'button_label' => 'Add File',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Section',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '6',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_profile',
		'title' => 'Profile',
		'fields' => array (
			array (
				'key' => 'field_529c33cdaae44',
				'label' => 'Header Image',
				'name' => 'profile_headerimage',
				'type' => 'image',
				'instructions' => 'Add a wide image that will be displayed on top of your profile page.',
				'save_format' => 'id',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_529c364d86c0f',
				'label' => 'Logo',
				'name' => 'profile_logo',
				'type' => 'image',
				'instructions' => 'Add your logo image here. It will be displayed on the left side of your description.',
				'required' => 1,
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_529c3784975a2',
				'label' => 'Description',
				'name' => 'profile_description',
				'type' => 'wysiwyg',
				'instructions' => 'You can add a short description for your profile page. It will appear next to your logo.',
				'required' => 1,
				'default_value' => 'Write a short description here.',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_529c37e87d7d8',
				'label' => 'Description in English',
				'name' => 'profile_description_en',
				'type' => 'wysiwyg',
				'instructions' => 'You can add your description in English, too. Visitors can change between the too languages when visiting your profile.',
				'default_value' => 'Write a short description in English here.',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_52d45aa60ecfc',
				'label' => 'Offers',
				'name' => 'profile_offers',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_52d45b1e0ecfd',
						'label' => 'Image',
						'name' => 'profile_offer_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_52d45b480ecfe',
						'label' => 'Description',
						'name' => 'profile_offer_description',
						'type' => 'wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'basic',
						'media_upload' => 'no',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Offer',
			),
			array (
				'key' => 'field_52d45bf611bf9',
				'label' => 'Media',
				'name' => 'profile_media',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_52d45c0811bfa',
						'label' => 'File',
						'name' => 'profile_media_file',
						'type' => 'file',
						'column_width' => '',
						'save_format' => 'object',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Media File',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'profiles',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>