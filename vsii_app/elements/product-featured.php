<?php
if (!function_exists('product_featured')) {
    function product_featured($atts)
    {
        $data = shortcode_atts(array(
            'title' => 'những sản phẩm nổi bật',
            'description' => 'HỖ TRỢ MUA XE TRẢ GÓP, LÃI SUẤT THẤP, THỦ TỤC NHANH CHÓNG'
        ), $atts);

        extract($data);

        $args = array(
            'post_type' => 'product',
            'showposts' => 10,
            'meta_key'  => 'featured_product',
            'value' => 'on',
            'orderby' => 'id',
            'order' => 'DESC'
        );
        $results = new WP_Query( $args );
        if ($results->have_posts()) {
            return VsiiTemplate::load_view("elements/product-featured/index", false, array('results' => $results, 'data' => $data));
        }
    }
}
 vsii_reg_shortcode('vsi_product_featured', 'product_featured');

 vc_map(array(
	"name"     => esc_html__("Vsii product Featured", "vsii-template"),
	"base"     => "vsi_product_featured",
	"category" => "HyundaiTheme",
    'icon' => 'icon-vsii',
	"params"   => array(
		array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Title', 'oceaus'),
            'param_name' => 'title',
            'prefix' => esc_html__('service', 'oceaus'),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            "type"        => "textarea_html",
            "heading"     => esc_html__("Description", "vsii-template"),
            "param_name"  => "description",
            'admin_label' => true
        ),
	)
));