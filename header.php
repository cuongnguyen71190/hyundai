<!DOCTYPE html>
<html <?php language_attributes(); ?> class="loading-site no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="msapplication-TileImage" content="https://hyundaidongnam.vn/wp-content/uploads/2018/05/cropped-hyundai-dau-trang-270x270.jpg" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="mfp-bg off-canvas off-canvas-left main-menu-overlay mfp-ready" style="height: 4234px; position: absolute;"></div>
    <div class="mfp-wrap mfp-auto-cursor off-canvas off-canvas-left mfp-ready" tabindex="-1">
        <div class="mfp-container mfp-s-ready mfp-inline-holder">
            <div class="mfp-content">
                <div>
                    <?php get_search_form(); ?>
                    <?php
                        if ( has_nav_menu('mobile') ) {
                            $args = array(
                                'theme_location' => 'mobile',
                                'menu_class'      => 'menu-mobile nav navbar-nav',
                                'walker'          => new Vsii_Menu_Walker,
                            );
                            wp_nav_menu($args);
                        }
                    ?>
                    <div id='mobile-icon_wrapper'>
                        <a  target="_self"  class='fuse_social_icons_links' href=''>
                            <i class='fa fa-facebook fb-awesome-social awesome-social'></i>
                        </a>
                        <a target="_self" class='fuse_social_icons_links' href='#'>
                            <i class='fa fa-twitter tw-awesome-social awesome-social'></i>
                        </a>
                        <a target="_self" class='fuse_social_icons_links' href='#'>
                            <i class='fa fa-youtube youtube-awesome-social awesome-social'></i>
                        </a>
                        <a target="_self" class='fuse_social_icons_links' href='#'>
                            <i class='fa fa-instagram instagram-awesome-social awesome-social'></i>
                        </a>
                    </div>
                </div>
            </div>
            <button title="Close (Esc)" type="button" class="bt-close">×</button>
            </div>
        </div>
    </div>

    <div id="wrapper">
        <!-- Begin header -->
        <header id="header" class="header ">
            <div class="header-wrapper">
                <div id="masthead" class="header-main nav-dark">
                    <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                        <div id="logo" class="flex-col logo">
                            <a href="<?php echo esc_url(home_url('/')) ?>" title="Hyundai Đông Nam - Công ty Cổ phần Đầu tư Ôtô Đông Nam" rel="home">
                                <img width="200" height="110" src="<?php echo vsii_get_option('logo'); ?>" class="header-logo-dark" alt="Hyundai Đông Nam"/>
                            </a>
                        </div>
                        <div class="flex-col hidden-md visible-xs flex-left">
                            <ul class="mobile-nav nav nav-left ">
                                <li class="nav-icon">
                                    <a >
                                        <i class="fa fa-bars icon-menu" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="flex-col flex-right hidden-xs visible-sm">
                            <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                                <li class="html custom html_topbar_left">
                                    <div style="text-align: right">
                                        <p style="margin-bottom:1em">
                                            <i class="fa fa-envelope"></i>
                                            autodongnam.lb@gmail.com
                                            <span style="font-family: 'Anton', sans-serif; font-size: 150%;">Hotline: 0961.182.688</span>
                                        </p>
                                        <p>
                                            <i class="fa fa-map-marker" style="margin-left: 15px"></i>
                                        Chân cầu vượt Thanh Trì giao QL5, Long Biên, Hà Nội</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php echo VsiiTemplate::load_view('menu'); ?>
            </div>
        </header>
        <!-- Begin Main -->
        <main id="main" class="">
