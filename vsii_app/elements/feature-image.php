<?php
if (!function_exists('vsii_about_feature_image')) {
	function vsii_about_feature_image($attr, $content = '')
	{
        $data = shortcode_atts(array(
            'title' => 'hyundai',
            'image'  => '',
            'color'  => ''
        ), $attr,'about_feature_image');

        extract($data);
        $data['content'] = $content;
        $html = VsiiTemplate::load_view( 'elements/feature-image/index', false, array('data' => $data));

        return $html;
    }

	vsii_reg_shortcode('about_feature_image', 'vsii_about_feature_image');

	vc_map(array(
		"name"     => esc_html__("Vsii Feature Image", "vsii-template"),
		"base"     => "about_feature_image",
		"category" => "VsiiTheme",
        'icon' => 'icon-vsii',
		"params"   => array(
			array(
				"type"        => "textfield",
				"heading"     => esc_html__("Title", "vsii-template"),
				"param_name"  => "title",
				'admin_label' => true
			),
			array(
				"type"        => "textarea_html",
				"heading"     => esc_html__("Content", "vsii-template"),
				"param_name"  => "content",
				'admin_label' => true
			),
			array(
				"type"        => "attach_image",
				"heading"     => esc_html__("Image", "vsii-template"),
				"param_name"  => "image",
				'admin_label' => true
			),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__("Color", "vsii-template"),
                "param_name"  => "color",
                'admin_label' => false
            ),
		)
	));
}