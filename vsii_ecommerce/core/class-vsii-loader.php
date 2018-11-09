<?php
if(!class_exists('VsiiLoader'))
{
    class VsiiLoader
    {
        static $_sysdir;
        static $_appdir;

        static function _init()
        {
            self::$_appdir=VsiiEcommerce::$app_dir;
            self::$_sysdir=VsiiEcommerce::$system_dir;
        }

        // -----------------------------------------------------------------
        /**
         * @string library file to load
         *
         * @todo load library file from libraries folder
         * @since 1.0
         * */
        static function library($lib_name=false)
        {
            if(!$lib_name) return;

            $file=get_template_directory().'/'.self::$_appdir.'/libraries/'.esc_attr($lib_name).'.php';

            if(is_readable($file)){
                include_once $file;
            }else{
                $file=get_template_directory().'/'.self::$_sysdir.'/libraries/'.esc_attr($lib_name).'.php';
                if(is_readable($file)) {
                    include_once $file;
                }
            }


        }
        // -----------------------------------------------------------------
        /**
         * @array libraries array files to load
         *
         * @todo load libraries file from libraries folder
         * @since 1.0
         * */
        static function libraries($libs=array())
        {
            if(!empty($libs) and is_array($libs))
            {
                foreach($libs as $key)
                    self::library($key);
            }

        }

        // -----------------------------------------------------------------
        /**
         * @string element file to load
         *
         * @todo load element file from elements folder
         * @since 1.0
         * */
        static function element($lib_name=false)
        {
            if(!function_exists('vc_map') or !function_exists('vsii_reg_shortcode')) return;
            if(!$lib_name) return;


            $file=get_template_directory().'/'.self::$_appdir.'/elements/'.esc_attr($lib_name).'.php';

            if(is_readable($file)){
                include_once $file;
            }else{
                $file=get_template_directory().'/'.self::$_sysdir.'/elements/'.esc_attr($lib_name).'.php';
                if(is_readable($file)) {
                    include_once $file;
                }
            }


        }
        // -----------------------------------------------------------------
        /**
         * @array elements array files to load
         *
         * @todo load elements file from elements folder
         * @since 1.0
         * */
        static function elements($libs=array())
        {

            if(!empty($libs) and is_array($libs))
            {
                foreach($libs as $key)
                    self::element($key);
            }

        }

        // -----------------------------------------------------------------
        /**
         * @string widget file to load
         *
         * @todo load widget file from libraries folder
         * @since 1.0
         * */
        static function widget($lib_name=false)
        {
            if (!$lib_name) return;

            $file = get_template_directory().'/'.self::$_appdir.'/widgets/'.esc_attr($lib_name).'.php';

            if (is_readable($file)) {
                include_once $file;
            } else {
                $file = get_template_directory().'/'.self::$_sysdir.'/widgets/'.esc_attr($lib_name).'.php';
                if (is_readable($file)) {
                    include_once $file;
                }
            }
        }
        // -----------------------------------------------------------------
        /**
         * @array widgets array files to load
         *
         * @todo load widgets file from libraries folder
         * @since 1.0
         * */
        static function widgets($libs=array())
        {
            if(!empty($libs) and is_array($libs))
            {
                foreach($libs as $key)
                    self::widget($key);
            }

        }

        // -----------------------------------------------------------------
        /**
         * @string helper file to load
         *
         * @todo load helper file from  folder
         * @since 1.0
         * */
        static function helper($lib_name=false)
        {
            if(!$lib_name) return;


            $file=get_template_directory().'/'.self::$_appdir.'/helpers/'.esc_attr($lib_name).'.php';

            if(is_readable($file)){
                include_once $file;
            }else{
                $file=get_template_directory().'/'.self::$_sysdir.'/helpers/'.esc_attr($lib_name).'.php';
                if(is_readable($file)) {
                    include_once $file;
                }
            }

        }

        // -----------------------------------------------------------------
        /**
         * @array helpers array file to load
         *
         * @todo load helpers file from helpers folder
         * @since 1.0
         * */
        static function helpers($helpers=array())
        {
            if(!empty($helpers) and is_array($helpers))
            {
                foreach($helpers as $key)
                    self::helper($key);
            }

        }
        // -----------------------------------------------------------------
        /**
         *
         * @todo load model file from models folder
         * @since 1.0
         * */
        static function model($lib_name=false)
        {
            if(!$lib_name) return;

            $file=get_template_directory().'/'.self::$_appdir.'/models/'.esc_attr($lib_name).'.php';

            if(is_readable($file)){
                include_once $file;
            }else{
                $file=get_template_directory().'/'.self::$_sysdir.'/models/'.esc_attr($lib_name).'.php';
                if(is_readable($file)) {
                    include_once $file;
                }
            }

        }

        // -----------------------------------------------------------------
        /**
         * @array models file to load
         *
         * @todo load multi model file from models folder
         * @since 1.0
         * */
        static function models($models=array())
        {
            if(!empty($models) and is_array($models))
            {
                foreach($models as $key)
                    self::model($key);
            }
        }
    }

    VsiiLoader::_init();
}
