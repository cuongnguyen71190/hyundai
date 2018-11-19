<?php
$config['version']='1.0';

/**
 * List all helpers file autoload
 * @see VsiiEcommerce::_autoload();
 *
 * */
$config['autoload']['helpers']=array(
    'general',
    'post',
);

/**
 * List all libraries file autoload
 * @see VsiiEcommerce::_autoload();
 *
 * */
$config['autoload']['libraries']=array(
    'assets',
    'author-meta',
    'input',
    'optiontree',
    'optiontree-css-output',

    'importer',
    'required_plugins',
    'rectan-menu-walker',
);

/**
 * List all models file autoload
 * @see VsiiEcommerce::_autoload();
 *
 * */
$config['autoload']['models']=array(
    'general',
    'post',
    'page',
    'product',
    'list-category'
    /*'woocommerce',*/
);

/**
 * Array of defaults navigation menu
 *
 * @see VsiiGeneral::_after_setup_theme()
 *
 *
 * */
$config['nav_menus']=array(
    'primary' => esc_html__( 'Main Menu', "vsii-template" ),
    'mobile' => esc_html__( 'Mobile Menu', "vsii-template" )
);

/**
 * Default sidebar
 * @see VsiiGeneral::_add_sidebars();
 *
 * */
$config['sidebars']=array(
    array(
        'name' => esc_html__( 'Blog Sidebar', "vsii-template" ),
        'id' => 'blog-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown on all blog page.', "vsii-template"),
        'before_title' => '<h4 class="sidebar-heading">',
        'after_title' => '</h4>',
        'before_widget' => '<div id="%1$s" class="sidebar-widget Vsii-sidebar widget %2$s">',
        'after_widget'  => '</div>',
    ),
);


/**
 * Default get assets folder
 * @see VsiiAssets::url()
 *
 * */
$config['asset_url']=get_template_directory_uri().'/assets';


/**
 * Default Theme Options Menu Title
 *
 * @see VsiiOptiontree::_change_menu_title()
 *
 *
 * */
$config['theme_option_menu_title']='Theme Settings';