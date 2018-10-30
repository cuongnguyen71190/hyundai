<?php
if (!class_exists('VsiiPage')) {
    class VsiiPage
    {
        static function _init()
        {
            if (function_exists('vc_add_param')) {
                add_action('init', array(__CLASS__, '_init_elements'));
            }
            add_action('init', array(__CLASS__, '_add_metabox'));
            add_filter( 'vc_shortcodes_css_class' , array(
                __CLASS__ ,
                'css_classes_for_vc_row_and_vc_column'
            ) , 10 , 2 );

        }
        static function _init_elements()
        {


        }

        static function _add_metabox()
        {
            $my_meta_box = array(
                'id'       => 'vsii_page_metabox',
                'title'    =>esc_html__('Page Information', "vsii-template"),
                'desc'     => '',
                'pages'    => array('page'),
                'context'  => 'normal',
                'priority' => 'high',
                'fields'   => array(
                    array(
                        'label' => __( 'Page Options' , "vsii-template" ) ,
                        'type'  => 'tab' ,
                        'id'    => 'page_options'
                    ) ,
                    array(
                        'id'      => 'custom_logo',
                        'label'   => esc_html__('Custom Logo?', "vsii-template"),
                        'type'    => 'on-off',
                        'std'     => 'off',
                    ),
                    array(
                        'id'      => 'logo',
                        'label'   => esc_html__('Logo', "vsii-template"),
                        'desc'    => esc_html__('This allow you to change logo', "vsii-template"),
                        'type'    => 'upload',
                        'section' => 'option_general',
                    ),
                )
            );

            /**
             * Register our meta boxes using the
             * ot_register_meta_box() function.
             */
            if (function_exists('ot_register_meta_box')) {
                ot_register_meta_box($my_meta_box);
            }
        }

        static function css_classes_for_vc_row_and_vc_column( $class_string , $tag )
        {
            if($tag == 'vc_row' || $tag == 'vc_row_inner') {
                $class_string = str_replace( 'vc_row-fluid' , '' , $class_string );
            }

            if(defined( 'WPB_VC_VERSION' )) {
                if(version_compare( WPB_VC_VERSION , '4.2.3' , '>' )) {
                    if($tag == 'vc_column' || $tag == 'vc_column_inner') {
                        $class_string = str_replace( 'vc_col' , 'col' , $class_string );
                        $class_string = str_replace( 'col-sm' , 'col-md' , $class_string );
                    }
                } else {
                    if($tag == 'vc_column' || $tag == 'vc_column_inner') {
                        $class_string = preg_replace( '/vc_span(\d{1,2})/' , 'col-lg-$1' , $class_string );
                        $class_string = str_replace( 'col-sm' , 'col-md' , $class_string );
                    }
                }
            }

            return $class_string;
        }



    }

    VsiiPage::_init();
}
