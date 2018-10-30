<?php
if (!class_exists('VsiiPortfolio')) {

	class VsiiPortfolio
	{
		static $content;

		static function __init()
		{

			if (function_exists('vsii_reg_post_type')) {
				add_action('init', array(__CLASS__, '__register_post_type'));
			}

			add_action('init', array(__CLASS__, '__add_metabox'));
			add_action('init', array(__CLASS__, '_init_elements'));

			add_filter('vsii_get_sidebar', array(__CLASS__, '_service_filter_sidebar'));

		}

		static function _service_filter_sidebar($sidebar)
		{
			return $sidebar;
		}


		static function __register_post_type()
		{
			$labels = array(
				'name'               => esc_html__('Portfolio', "vsii-template"),
				'singular_name'      => esc_html__('Portfolio', "vsii-template"),
				'menu_name'          => esc_html__('Portfolio', "vsii-template"),
				'name_admin_bar'     => esc_html__('Portfolio', "vsii-template"),
				'add_new'            => esc_html__('Add New', "vsii-template"),
				'add_new_item'       => esc_html__('Add New Portfolio', "vsii-template"),
				'new_item'           => esc_html__('New Portfolio', "vsii-template"),
				'edit_item'          => esc_html__('Edit Portfolio', "vsii-template"),
				'view_item'          => esc_html__('View Portfolio', "vsii-template"),
				'all_items'          => esc_html__('All Portfolio', "vsii-template"),
				'search_items'       => esc_html__('Search Portfolio', "vsii-template"),
				'parent_item_colon'  => esc_html__('Parent Portfolio:', "vsii-template"),
				'not_found'          => esc_html__('No Portfolio found.', "vsii-template"),
				'not_found_in_trash' => esc_html__('No Portfolio found in Trash.', "vsii-template")
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array('slug' => 'vsii_portfolio'),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
				'menu_icon'          => 'dashicons-Vsii-portfolio'
			);
			vsii_reg_post_type('vsii_portfolio', $args);

			$labels = array(
				'name'              => esc_html__('Portfolio Categories', "vsii-template"),
				'singular_name'     => esc_html__('Portfolio Category', "vsii-template"),
				'search_items'      => esc_html__('Search Portfolio Categories', "vsii-template"),
				'all_items'         => esc_html__('All Portfolio Categories', "vsii-template"),
				'parent_item'       => esc_html__('Parent Portfolio Category', "vsii-template"),
				'parent_item_colon' => esc_html__('Parent Portfolio Category:', "vsii-template"),
				'edit_item'         => esc_html__('Edit Portfolio Category', "vsii-template"),
				'update_item'       => esc_html__('Update Portfolio Category', "vsii-template"),
				'add_new_item'      => esc_html__('Add New Portfolio Category', "vsii-template"),
				'new_item_name'     => esc_html__('New Portfolio Category Name', "vsii-template"),
				'menu_name'         => esc_html__('Portfolio Category', "vsii-template"),
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array('slug' => 'vsii_portfolio_cat'),
			);

			vsii_reg_taxonomy('vsii_portfolio_cat', array('vsii_portfolio'), $args);
		}

		static function __add_metabox()
		{
			$my_meta_box = array(
				'id'       => 'vsii_portfolio_metabox',
				'title'    => esc_html__('Portfolio Options', "vsii-template"),
				'desc'     => '',
				'pages'    => array('vsii_portfolio'),
				'context'  => 'normal',
				'priority' => 'high',
				'fields'   => array(
					array(
						'label' => __( 'General' , "vsii-template" ) ,
						'type'  => 'tab' ,
						'id'    => 'gen_tab'
					) ,
					array(
						'label' => esc_html__('Gallery', "vsii-template"),
						'id'    => 'gallery',
						'type'  => 'gallery'
					),
				)
			);


			/**
			 * Register our meta boxes using the
			 * ot_register_meta_box() function.
			 */
			if (function_exists('ot_register_meta_box')) {
				ot_register_meta_box($my_meta_box);
			}
		}
		static function _init_elements()
		{

		}
	}
	VsiiPortfolio::__init();
}