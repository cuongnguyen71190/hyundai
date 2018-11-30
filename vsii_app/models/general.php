<?php
if (!class_exists('VsiiGeneral')) {

    class VsiiGeneral
    {
        static function _init()
        {
            //Default Framwork Hooked
            add_action('wp', array(__CLASS__, '_setup_author'));
            add_action('after_setup_theme', array(__CLASS__, '_after_setup_theme'));
            add_action('widgets_init', array(__CLASS__, '_add_sidebars'));

            add_action('wp_enqueue_scripts', array(__CLASS__, '_add_scripts'));

            //Custom hooked
            add_filter('vsii_get_sidebar', array(__CLASS__, '_blog_filter_sidebar'));

            // add_action('wp_footer',array(__CLASS__,'_enqueue_footer_css'));

            add_action('init', array(__CLASS__, '_init_elements'));

            // add_action( 'pre_get_posts', array(__CLASS__, 'exclude_category'));

            add_filter('body_class', array(__CLASS__, '_add_body_class'));

            add_filter('post_class',array(__CLASS__,'_change_post_class'));
            add_filter('get_the_archive_title',array(__CLASS__,'_change_archive_title'));
            add_filter('carousel_slider_load_scripts', array(__CLASS__, 'carousel_slider_load_scripts'));

            // add_filter('posts_orderby', [__CLASS__, '_get_order_by_query']);
        }

        // function _get_order_by_query($orderby)
        // {
        //     return $orderby;
        // }

        // static function exclude_category( $query ) {
        //     if ($query->is_search && is_page_template('search')) {
        //         if ( isset($_GET['orderby']) ) {
        //             $query->set( 'orderby', $_GET['orderby'] );
        //         }
        //     }
        //     return $query;
        // }

        static function _change_post_class($class)
        {
            if(!has_post_thumbnail())
            {
                $class[]=' no-image';

            }
            return $class;
        }
        static function carousel_slider_load_scripts( $load_scripts ) {
            return true;
        }

        static function _change_archive_title($title)
        {
            if (is_search()) {
                $title = sprintf(esc_html__("Search Result for: %s","vsii-template"),get_query_var('s'));
            }
            return $title;
        }

        static function _add_body_class($class)
        {
            $sidebar=vsii_get_sidebar();
            $class[]='sidebar-'.$sidebar['position'];

            return $class;
        }


        static function _add_breadcrumb()
        {
            get_template_part('bc');
        }

        static function _init_elements()
        {

        }

        static function _blog_filter_sidebar($sidebar)
        {
            $pos = vsii_get_option('page_sidebar_pos', 'right');

            $sidebar_id = vsii_get_option('page_sidebar_id', 'blog-sidebar');

            /// ID Meta ///
            if (is_singular()) {
                if ($meta = get_post_meta(get_the_ID(), 'sidebar_id', true)) {
                    $sidebar_id = $meta;
                }
            }
            if ($sidebar_id) {
                $sidebar['id'] = $sidebar_id;
            }

            /// position Meta///
            $sidebar['position'] = $pos;
            if (is_singular()) {
                if ($meta = get_post_meta(get_the_ID(), 'sidebar_pos', true)) {
                    $sidebar['position'] = $meta;
                }
            }

            if (VsiiInput::get('sidebar_pos')) {
                $sidebar['position'] = VsiiInput::get('sidebar_pos');
            }
            if (VsiiInput::get('sidebar_id')) {
                $sidebar['id'] = VsiiInput::get('sidebar_id');
            }

            return $sidebar;
        }


        static function _add_scripts()
        {
            /*
             * Javascript
             * */
            wp_enqueue_script('custom', VsiiAssets::url('js/custom.js'),array('jquery'),null,true);
            wp_enqueue_script('bootstrap', VsiiAssets::url('js/bootstrap.min.js'),array('jquery'),null,true);
            wp_enqueue_script('owl-carousel', VsiiAssets::url('js/owl.carousel.min.js'),array('jquery'),null,true);

            if ( is_singular() ) {
            	wp_enqueue_script( 'comment-reply' );
            }
            $data = array(
                'ajaxurl'   => esc_url(admin_url('admin-ajax.php')),
                'site_url'  => site_url(),
                'theme_url' => get_template_directory_uri(),
            );
            wp_localize_script('custom', 'ajax_param', $data);
            wp_localize_script('jquery', 'vsii_params', array(
                'on_loading_text' => esc_html__("Loading ....", "vsii-template"),
                'loadmore_text'   => esc_html__('Load More', "vsii-template"),
                'ajax_url'        => esc_url(admin_url('admin-ajax.php')),
                'nomore_text'     => esc_html__('No More', "vsii-template")
            ));

            // Style
            add_editor_style();
            wp_enqueue_style('my-fonts', VsiiAssets::url('fonts/css@family=Anton'));
            wp_enqueue_style('bootstrap', VsiiAssets::url('stylesheets/bootstrap.css'));
            wp_enqueue_style('owl-theme', VsiiAssets::url('stylesheets/owl.theme.default.min.css'));
            wp_enqueue_style('owl', VsiiAssets::url('stylesheets/owl.carousel.min.css'));
            wp_enqueue_style('font-awesome', VsiiAssets::url('stylesheets/font-awesome.min.css'));
            wp_enqueue_style('vsii-main-style', get_template_directory_uri().'/style.css');
        }

        // -----------------------------------------------------
        // Default Hooked, Do not edit

        /**
         * Hook setup theme
         *
         *
         * */

        static function _after_setup_theme()
        {
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on stframework, use a find and replace
             * to change $st_textdomain to the name of your theme in all the template files
             */

            // This theme uses wp_nav_menu() in one location.
            $menus = VsiiConfig::get('nav_menus');
            if (is_array($menus) and !empty($menus)) {
                register_nav_menus($menus);
            }
            //Theme supports from config
            add_theme_support('automatic-feed-links');
            add_theme_support('post-thumbnails');
            add_theme_support('html5', array(
                'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
            ));
            add_theme_support('post-formats', array(
                'image', 'video', 'gallery', 'audio', 'quote'
            ));
            add_theme_support('woocommerce');
            add_theme_support('custom-header', array());
            add_theme_support('custom-background', array());
            add_theme_support('title-tag', array());
            if (!isset($content_width)) $content_width = 900;
        }

        /**
         * Add default sidebar to website
         *
         *
         * */
        static function _add_sidebars()
        {
            // From config file
            $sidebars = VsiiConfig::get('sidebars');
            if (is_array($sidebars) and !empty($sidebars)) {
                foreach ($sidebars as $value) {
                    register_sidebar($value);
                }
            }

        }
        /**
         * Set up author data
         *
         * */
        static function _setup_author()
        {
            global $wp_query;

            if ($wp_query->is_author() && isset($wp_query->post)) {
                $GLOBALS['authordata'] = get_userdata($wp_query->post->post_author);
            }
        }
        /**
         * Hook to wp_title
         *
         * */
        static function _wp_title($title, $sep)
        {
            if (is_feed()) {
                return $title;
            }

            global $page, $paged;

            // Add the blog name
            $title .= get_bloginfo('name', 'display');

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && (is_home() || is_front_page())) {
                $title .= " $sep $site_description";
            }

            // Add a page number if necessary:
            if (($paged >= 2 || $page >= 2) && !is_404()) {
                $title .= " $sep " . sprintf(esc_html__('Page %s', "vsii-template"), max($paged, $page));
            }

            return $title;
        }
    }

    VsiiGeneral::_init();
}