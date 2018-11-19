<?php
if (!function_exists('func_list_category')) {
    function func_list_category ($atts, $content = false) {
        $html = '';
        $data = shortcode_atts(array(
            'category' => ''
        ), $atts);

        extract($data);

        if (!empty($data['category'])) {
            $categories = get_terms( array(
                'taxonomy' => 'category-product',
                'include' => $data['category'],
                'hide_empty'  => false,
                'orderby'  => 'term_id'
            ));

            if (!empty($categories)) {
                $html = VsiiTemplate::load_view( 'elements/category/index', false, array('categories' => $categories, 'data' => $data));
            }
        }

        return $html;
    }
}

vsii_reg_shortcode('list_category', 'func_list_category');
vc_map(array(
    'name' => esc_html__('Danh Mục Sản Phẩm', 'oceaus'),
    'base' => 'list_category',
    "category" => "HyundaiTheme",
    'icon' => 'icon-vsii',
    'params' => array(
        array(
            'type' => 'dropdown_multi',
            'heading' => esc_html__('Category', 'oceaus'),
            'param_name' => 'category',
            'value' => vsii_vc_convert_array(vsii_get_list_taxonomy_id('category-product')),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'std' => ''
        )
    )
));
