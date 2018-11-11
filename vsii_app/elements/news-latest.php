<?php
if(!function_exists('vsii_func_news_latest')){
    function vsii_func_news_latest(){

        $html = '';

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => '4',
            'orderby' => 'ID',
            'order' => 'DESC',
        );
        $service_query = new WP_Query($args);
        if($service_query->have_posts()) {
            $html = VsiiTemplate::load_view( 'elements/news-latest/index', false, array('myposts' => $service_query));
        }
        wp_reset_postdata();

        return $html;
    }
}

vsii_reg_shortcode('vsii_news_latest', 'vsii_func_news_latest');
vc_map(array(
    'name' => esc_html__('Vsii News Latest', 'oceaus'),
    'base' => 'vsii_news_latest',
    "category" => "HyundaiTheme",
    'icon' => 'icon-vsii',
    'params' => array()
));
