<?php
class FigTwitFields {
	public static function init() {
		add_action( 'init', array( 'FigTwitFields', 'fields' ), 999 );
	}

	public static function fields() {

		if ( function_exists('acf_add_options_page') ) {
			acf_add_options_sub_page( array(
				'page_title' => 'Twitter Settings',
				'menu_title' => 'Twitter',
				'parent_slug' => 'theme-general-settings',
			));
		}

		if( function_exists('register_field_group') ) {

			register_field_group(array (
				'key' => 'group_54a1b4fe8d152',
				'title' => 'Twitter Fields',
				'fields' => array (
					array (
						'key' => 'field_54a1b5170864b',
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
					array (
						'key' => 'field_54a1b52f0864c',
						'label' => 'Consumer Key',
						'name' => 'consumer_key',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
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
						'key' => 'field_54a1b5500864d',
						'label' => 'Consumer Secret',
						'name' => 'consumer_secret',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
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
						'key' => 'field_54a1b5670864e',
						'label' => 'Access Token',
						'name' => 'access_token',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
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
						'key' => 'field_54a1b58d0864f',
						'label' => 'Access Token Secret',
						'name' => 'access_token_secret',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
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
				),
				'location' => array (
					array (
						array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'acf-options-twitter',
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