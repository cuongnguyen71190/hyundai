<?php
if (!function_exists('vsii_form_register')) {
    function vsii_form_register ($attr, $content = false)
    {
        $data = shortcode_atts (array('action' => ''), $attr, 'form_register');

        extract($data);

        return VsiiTemplate::load_view("elements/register/index");
    }

    vsii_reg_shortcode('form_register', 'vsii_form_register');
}