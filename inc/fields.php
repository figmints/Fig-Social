<?php
class FigTwitFields {
	public static function init() {
		add_action( 'init', array( 'FigTwitFields', 'fields' ), 999 );
	}

	public static function fields() {

		if ( function_exists('acf_add_options_page') ) {
			acf_add_options_sub_page( array(
				'page_title' => 'Social Feed Settings',
				'menu_title' => 'Social',
				'parent_slug' => 'theme-general-settings',
			));
		}

		if( function_exists('register_field_group') ) {

			register_field_group(array (
				'key' => 'group_54aee7f421383',
				'title' => 'Social Fields',
				'fields' => array (
					array (
						'key' => 'field_54aee86822996',
						'label' => 'Facebook Username',
						'name' => 'facebook_username',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_54d3ca1d3e7d5',
						'label' => 'Twitter Handle',
						'name' => 'twitter_handle',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '@',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'acf-options-social',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
			));

		}

	}
} 

FigTwitFields::init();

?>