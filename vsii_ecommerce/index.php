<?php
if(!class_exists('VsiiEcommerce'))
{
    class VsiiEcommerce
    {
        static $system_dir;
        static $app_dir;

        static $framework_version="1.0";

        /**
         * Define system variable
         *
         * Load required core file
         *
         * Run theme app
         *
         *
         * */
        static function init()
        {
            // Init some variable
            self::$system_dir=apply_filters('vsii_system_dir','vsii_ecommerce');
            self::$app_dir=apply_filters('vsii_app_dir','vsii_app');

            // Load Core Files
            self::_load_core_files();

            // Load libraries and helpers
            self::_load_libs();

            // Autoload libraries, helpers, models
            self::_autoload();

            // All Done! Run our app now
            get_template_part(self::$app_dir.'/index');

            add_action('admin_enqueue_scripts',array(__CLASS__,'_add_scripts'));
        }

        static function _add_scripts()
        {
            wp_enqueue_style('ionicon',VsiiAssets::url('admin/ionicons/css/ionicons.min.css'));
            wp_enqueue_style('Vsii-admin',VsiiAssets::url('admin/css/admin.css'));
        }

        /**
         *
         * Autoload libraries, helpers, models
         *
         * */
        static function _autoload()
        {
            $autoloads=VsiiConfig::get('autoload');

            // Load Helpers
            $helpers=isset($autoloads['helpers'])?$autoloads['helpers']:array();
            VsiiLoader::helpers($helpers);

            // Load libraries
            $libraries=isset($autoloads['libraries'])?$autoloads['libraries']:array();
            VsiiLoader::libraries($libraries);

            // Load Helpers
            $models=isset($autoloads['models'])?$autoloads['models']:array();
            VsiiLoader::models($models);

            // Load Widgets
            self::_load_widgets();

            // Load elements
            add_action('init',array(__CLASS__,'_load_elements'));
        }

        static function _load_widgets()
        {
            $dir=get_template_directory().'/'.self::$app_dir;

            $elements=glob($dir."/widgets/*.php");

            // Auto load all $elements file
            if(!empty($elements)){
                foreach ($elements as $filename)
                {
                    VsiiLoader::widget(basename($filename, ".php"));
                }
            }
        }

        static function _load_elements()
        {
            if(!function_exists('vsii_reg_shortcode') or !function_exists('vc_map')) return;

            $dir=get_template_directory().'/'.self::$app_dir;

            $elements=glob($dir."/elements/*.php");

            // Auto load all $elements file
            if(!empty($elements)){
                foreach ($elements as $filename)
                {
                    VsiiLoader::element(basename($filename, ".php"));
                }
            }
        }

        static function _load_core_files(){

            // Loader CLass
            self::_include('core/class-vsii-loader');

            // Config Class
            self::_include('core/class-vsii-config');

            // Session Class
            self::_include('core/class-vsii-session');

            // Template Class
            self::_include('core/class-vsii-template');
        }

        static function _load_libs()
        {
            //Load libraries

        }

        /**
         *
         * Include file in system
         *
         * */
        static function _include($file){
            get_template_part(self::$system_dir.'/'.esc_attr($file));
        }
    }

    VsiiEcommerce::init();
}

