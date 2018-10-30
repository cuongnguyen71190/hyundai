<?php
if(!class_exists('VsiiTemplate'))
{
    class VsiiTemplate{

        static $_template_dir;

        static $_message_session_key;

        static function _init()
        {
            // Init some environment
            self::$_template_dir=apply_filters('vsii_template_dir','vsii_templates');

            self::$_message_session_key=apply_filters('vsii_message_session_key','vsii_message');

            //Load config file
            VsiiConfig::load('template');

        }


        static function load_view($view_name,$slug=false,$data=NULL,$echo=FALSE)
        {
            if($data) extract($data);

            if($slug){
                $template=get_template_directory().'/'.self::$_template_dir.'/'.esc_attr($view_name).'-'.esc_attr($slug).'.php';
                if(!is_readable($template)){
                    $template=get_template_directory().'/'.self::$_template_dir.'/'.esc_attr($view_name).'.php';
                }
            }else{
                $template=get_template_directory().'/'.self::$_template_dir.'/'.esc_attr($view_name).'.php';
            }

            //Allow Template be filter

            $template=apply_filters('vsii_load_view',$template,$view_name,$slug);

            if(is_readable($template)){

                if(!$echo){
                    ob_start();
                    include $template;

                    return @ob_get_clean();
                }else

                include $template;
            }
        }

        static function set_message($message,$type='info',$clear=false)
        {
            if($clear)
            {
                self::clear_messages();
            }


            $messages=self::get_messages();

            if(!is_array($message))
            {
                $messages=array(
                    array(
                        'message'=>$message,
                        'type'=>$type
                    )
                );
            }else{

                $messages[]=array(
                    'message'=>$message,
                    'type'=>$type
                );
            }

            VsiiSession::set(self::$_message_session_key,$messages);
        }

        static function get_messages()
        {
            return VsiiSession::get(self::$_message_session_key,array());
        }

        static function get_message($first=false)
        {
            $messages=self::get_messages();
            if(!$first) return array_pop($messages);
            else return array_shift($messages);
        }

        static function clear_messages()
        {
            VsiiSession::destroy(self::$_message_session_key,NULL);
        }


        static function message($first=false)
        {
            $message=self::get_message($first);
            return self::_message_to_string($message);
        }
        static function messages()
        {
            $all=self::get_messages();

            if(!empty($all))
            {
                $html='';

                foreach($all as $key=>$value)
                {
                    $html.=self::_message_to_string($value);
                }

                return $html;
            }


        }

        static function _message_to_string($message)
        {
            $layout=VsiiConfig::get('message_layout');

            $html= sprintf($layout,$message['type'],$message['message']);

            return apply_filters('vsii_messagge_to_string',$html,$message);
        }

        public static function get_vc_pagecontent($page_id=false)
        {
            if($page_id)
            {
                $page=get_post($page_id);

                if($page)
                {
                    $content=apply_filters('the_content', $page->post_content);

                    $content = str_replace(']]>', ']]&gt;', $content);


                    $shortcodes_custom_css = get_post_meta( $page_id, '_wpb_shortcodes_custom_css', true );

                    VsiiAssets::add_css($shortcodes_custom_css);

                    wp_reset_postdata();

                    return $content;
                }
            }
        }
        static function remove_wpautop( $content, $autop = false ) {

            if ( $autop ) {
                $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
            }
            return do_shortcode( shortcode_unautop( $content) );
        }
    }

    VsiiTemplate::_init();
}