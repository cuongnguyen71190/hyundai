<?php
if (!function_exists('func_new_product')) {
    function func_new_product ($atts, $content = false) {
        $html = '';
        $data = shortcode_atts(array(
            'number_post' => '3',
            'post__not_in' => '',
            'title' => ''
        ), $atts);

        extract($data);

        $args = array(
            'post_type' => 'product',
            'orderby' => 'ID',
            'order' => 'DESC',
            'posts_per_page' => $number_post,
            'item_per_line' => 1
        );
        if ($post__not_in) {
            $args['post__not_in'] = array($post__not_in);
        }
        query_posts($args);

        if (have_posts()) {
            $html = VsiiTemplate::load_view( 'elements/new-product/index', false, array('data' => $data));
        }

        wp_reset_query();

        return $html;
    }
}

vsii_reg_shortcode('new_product', 'func_new_product');
vc_map(array(
    'name' => esc_html__('Sản Phẩm Mới Nhất', 'oceaus'),
    'base' => 'new_product',
    "category" => "HyundaiTheme",
    'icon' => 'icon-vsii',
    'params' => array(
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
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Post Not IN', 'oceaus'),
            'param_name' => 'post__not_in',
            'description' => esc_html__('Number services', 'oceaus'),
            'prefix' => esc_html__('service', 'oceaus'),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Title', 'oceaus'),
            'param_name' => 'title',
            'description' => esc_html__('Number services', 'oceaus'),
            'prefix' => esc_html__('service', 'oceaus'),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        )
    )
));
