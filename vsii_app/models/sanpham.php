<?php
if (!class_exists('VsiiSanPham')) {

	class VsiiSanPham
	{
		static $content;

		static function __init()
		{

			if (function_exists('vsii_reg_post_type')) {
				add_action('init', array(__CLASS__, '__register_post_type'));
			}

			// add_action('init', array(__CLASS__, '__add_metabox'));
			// add_action('init', array(__CLASS__, '_init_elements'));
		}

		static function __register_post_type()
		{
			$labels = array(
				'name'               => esc_html__('Sản Phẩm', "vsii-template"),
				'singular_name'      => esc_html__('Sản Phẩm', "vsii-template"),
				'menu_name'          => esc_html__('Sản Phẩm', "vsii-template"),
				'name_admin_bar'     => esc_html__('Sản Phẩm', "vsii-template"),
				'add_new'            => esc_html__('Thêm Mới', "vsii-template"),
				'add_new_item'       => esc_html__('Thêm Mới', "vsii-template"),
				'new_item'           => esc_html__('Thêm Mới', "vsii-template"),
				'edit_item'          => esc_html__('Sửa', "vsii-template"),
				'view_item'          => esc_html__('Xem', "vsii-template"),
				'all_items'          => esc_html__('Tất Cả', "vsii-template"),
				'search_items'       => esc_html__('Tìm Kiếm', "vsii-template"),
				'parent_item_colon'  => esc_html__('Parent Portfolio:', "vsii-template"),
				'not_found'          => esc_html__('Not found.', "vsii-template"),
				'not_found_in_trash' => esc_html__('Not found in Trash.', "vsii-template")
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array('slug' => 'vsii_sanpham'),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
			);
			vsii_reg_post_type('vsii_sanpham', $args);

			$labels = array(
				'name'              => esc_html__('Chuyên mục sản phẩm', "vsii-template"),
				'singular_name'     => esc_html__('Chuyên mục sản phẩm', "vsii-template"),
				'search_items'      => esc_html__('Tìm trong chuyên mục sản phẩm', "vsii-template"),
				'all_items'         => esc_html__('Tất cả chuyên mục sản phẩm', "vsii-template"),
				'parent_item'       => esc_html__('Chuyên mục hiện tại', "vsii-template"),
				'parent_item_colon' => esc_html__('Chuyên mục hiện tại:', "vsii-template"),
				'edit_item'         => esc_html__('Sửa chuyên mục sản phẩm', "vsii-template"),
				'update_item'       => esc_html__('Cập nhật chuyên mục sản phẩm', "vsii-template"),
				'add_new_item'      => esc_html__('Thêm chuyên mục sản phẩm', "vsii-template"),
				'new_item_name'     => esc_html__('Thêm chuyên mục sản phẩm', "vsii-template"),
				'menu_name'         => esc_html__('Chuyên mục sản phẩm', "vsii-template"),
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array('slug' => 'category'),
			);

			vsii_reg_taxonomy('category', array('vsii_sanpham'), $args);
		}

		static function __add_metabox()
		{
			$my_meta_box = array(
				'id'       => 'sanpham_metabox',
				'title'    => esc_html__('Register Options', "vsii-template"),
				'desc'     => '',
				'pages'    => array('sanpham'),
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
	}
	VsiiSanPham::__init();
}