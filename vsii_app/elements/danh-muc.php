<?php
if (!function_exists('func_danh_muc')) {
    function func_danh_muc ($atts, $content = false) {
        $html = '';
        $data = shortcode_atts(array(
            'category' => ''
        ), $atts);

        extract($data);

        $categories = get_term_by('id', $category, 'category-product');

        if (!empty($categories)) {
            $html = VsiiTemplate::load_view( 'elements/category/index', false, array('categories' => $categories, 'data' => $data));
        }


        return $html;
    }
}

vsii_reg_shortcode('danh_muc', 'func_danh_muc');
vc_map(array(
    'name' => esc_html__('Danh Mục Sản Phẩm', 'oceaus'),
    'base' => 'danh_muc',
    "category" => "HyundaiTheme",
    'icon' => 'icon-vsii',
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Category', 'oceaus'),
            'param_name' => 'category',
            'value' => vsii_vc_convert_array(vsii_get_list_taxonomy_id('category-product')),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'std' => ''
        )
    )
));
