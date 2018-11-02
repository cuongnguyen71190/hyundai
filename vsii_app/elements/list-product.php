<?php
if (!function_exists('func_list_product')) {
    function func_list_product ($atts, $content = false) {
        $html = '';
        $data = shortcode_atts(array(
            'item_per_line' => 4 ,
            'number_post' => '8',
            'order_by' => 'ID',
            'order' => 'DESC',
            'use_ids' => 'no',
            'service_ids' => '',
            'title' => '',
            'category' => ''
        ), $atts);

        extract($data);

        $args = array(
            'post_type' => 'product',
            'orderby' => $order_by,
            'order' => $order,
            'posts_per_page' => $number_post,
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'category-product',
                    'field' => 'id',
                    'terms' => array($category),
                    'include_children' => true,
                    'operator' => 'IN'
                )
            )
        );

        if ($use_ids == 'yes') {
            $ids = explode(',', $service_ids);
            $args['post__in'] = $ids;
        }
        // $services = new WP_Query( $args );


        query_posts($args);
        global $wp_query;
        if (have_posts()) {
            $html = VsiiTemplate::load_view( 'elements/list-product/index', false, array('data' => $data));
        }

        wp_reset_query();

        return $html;
    }
}

vsii_reg_shortcode('list_product', 'func_list_product');
vc_map(array(
    'name' => esc_html__('List Product', 'oceaus'),
    'base' => 'list_product',
    "category" => "HyundaiTheme",
    'icon' => 'icon-vsii',
    'params' => array(
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Title', 'oceaus'),
            'param_name' => 'title',
            'description' => esc_html__('Product Title', 'oceaus'),
            'prefix' => esc_html__('service', 'oceaus'),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Category', 'oceaus'),
            'param_name' => 'category',
            'value' => vsii_vc_convert_array(vsii_get_list_taxonomy_id('category-product')),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'std' => ''
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Number Items', 'oceaus'),
            'param_name' => 'number_post',
            'description' => esc_html__('Number services', 'oceaus'),
            'prefix' => esc_html__('service', 'oceaus'),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Items per line", 'oceaus'),
            "param_name" => "item_per_line",
            "description" => esc_html__("Items per line", 'oceaus'),
            'std' => '4',
            'value' => array(
                esc_html__( 'Two' , 'oceaus' ) => '2' ,
                esc_html__( 'Three' , 'oceaus' ) => '3' ,
                esc_html__( 'Four' , 'oceaus' )  => '4' ,
            ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order By', 'oceaus'),
            'param_name' => 'order_by',
            'value' => vsii_vc_convert_array(vsii_get_order_list()),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'std' => 'ID'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order', 'oceaus'),
            'param_name' => 'order',
            'value' => array(
                esc_html__('ASC', 'oceaus') => 'ASC',
                esc_html__('DESC', 'oceaus') => 'DESC'
            ),
            'std' => 'DESC',
            'edit_field_class' => 'vc_column vc_col-sm-6'
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Use Custom List','oceaus'),
            'param_name' => 'use_ids',
            'value' => array(
                esc_html__('Yes','oceaus') => 'yes'
            ),
            'description' => esc_html__('If you choose to yes, ignore the above criteria', 'oceaus')
        ),
        array(
            'type' 			=> 'autocomplete',
            'class' 		=> '',
            'heading' => esc_html__( 'Custom List', 'oceaus' ),
            'param_name' => 'service_ids',
            'settings' 		=> array(
                'multiple' 		=> true,
                'sortable' 		=> true,
                'unique_values' => true,
                'values'     => vsii_get_type_services_data('product'),
            ),
            'description' => esc_html__( 'Enter List of Services', 'oceaus' ),
            'dependency' => array(
                'element' => 'use_ids',
                'value' => array('yes')
            )
        ),
    )
));
