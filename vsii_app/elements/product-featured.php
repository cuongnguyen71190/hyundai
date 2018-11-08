<?php
if (!function_exists('product_featured')) {
    function product_featured($atts)
    {
    	$data = shortcode_atts(array(
            'slider_id' => 4
        ), $atts);
    	extract($data);
        return VsiiTemplate::load_view("elements/product-featured/index", false, array('data' => $data));
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
            'heading' => esc_html__('Slider ID', 'oceaus'),
            'param_name' => 'slider_id',
            'description' => esc_html__('Sliser Id', 'oceaus'),
            'prefix' => esc_html__('service', 'oceaus'),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        )
	)
));