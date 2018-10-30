<?php
if (!function_exists('product_featured')) {
    function product_featured()
    {
        return VsiiTemplate::load_view("elements/product-featured/index");
    }
}
 vsii_reg_shortcode('vsi_product_featured', 'product_featured');

 vc_map(array(
	"name"     => esc_html__("Vsii product Featured", "vsii-template"),
	"base"     => "vsi_product_featured",
	"category" => "HyundaiTheme",
    'icon' => 'icon-vsii',
	"params"   => array()
));