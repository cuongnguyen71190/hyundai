<?php
if (!function_exists('vsii_button_func')) {
    function vsii_button_func($attr, $content = false)
    {
        $data = shortcode_atts(array(
            'style' => 'btn-yellow',
            'link' => '#',
            'text'=>''
        ), $attr,'vsii_button');
        extract($data);
        $html = '<a class="'.$style.' '.$text.'" href="'.$link.'">'.esc_html($content).'</a>';
        return $html;
    }
    vsii_reg_shortcode('vsii_button', 'vsii_button_func');
}