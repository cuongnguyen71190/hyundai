<?php
if (!function_exists('vsii_about_func')) {
	function vsii_about_func($attr, $content = false)
	{
        $data = shortcode_atts(array(
            'title' => '1',
            'icon'  => '',
            'color'  => '',
        ), $attr,'vsii_about');
        extract($data);
        $class = VsiiAssets::build_css('  color: '.esc_attr($color).'; ',' .color_about');
        $class2 = VsiiAssets::build_css('  color: '.esc_attr($color).' !important; ',':hover .color_about');

        $html = ' 
            <div class="item_about canvas-box magin30 text-center wow '.esc_attr($class).' '.esc_attr($class2).'">
                <span class="text-center"><i class="'.esc_attr($icon).' color_about"></i></span>
                <h4 class="color_about">'.esc_html($title).'</h4>
                <p>'.do_shortcode($content).'</p>
            </div>';
        return $html;

    }
	vsii_reg_shortcode('vsii_about', 'vsii_about_func');
	vc_map(array(
		"name"     => esc_html__("Vsii About", "vsii-template"),
		"base"     => "vsii_about",
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
				"type"        => "textfield",
				"heading"     => esc_html__("Content", "vsii-template"),
				"param_name"  => "content",
				'admin_label' => true
			),
			array(
				"type"        => "iconpicker",
				"heading"     => esc_html__("Icon", "vsii-template"),
				"param_name"  => "icon",
				'admin_label' => false
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