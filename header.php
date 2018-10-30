<!DOCTYPE html>
<html <?php language_attributes(); ?> class="loading-site no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="msapplication-TileImage" content="https://hyundaidongnam.vn/wp-content/uploads/2018/05/cropped-hyundai-dau-trang-270x270.jpg" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <div id="wrapper">
        <!-- Begin header -->

        <header id="header" class="header ">
            <div class="header-wrapper">
                <div id="masthead" class="header-main hide-for-sticky nav-dark">
                    <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                        <div id="logo" class="flex-col logo">
                            <a href="#" title="Hyundai Đông Nam - Công ty Cổ phần Đầu tư Ôtô Đông Nam" rel="home">
                                <img width="200" height="110" src="<?php echo vsii_get_option('logo'); ?>" class="header-logo-dark" alt="Hyundai Đông Nam"/>
                            </a>
                        </div>
                        <div class="flex-col show-for-medium flex-left">
                            <ul class="mobile-nav nav nav-left ">
                                <li class="nav-icon has-icon"> <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color="" class="is-small" aria-controls="main-menu" aria-expanded="false"> <i class="icon-menu" ></i> </a></li>
                            </ul>
                        </div>
                        <div class="flex-col hide-for-medium flex-right">
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
                    <div class="container">
                        <div class="top-divider full-width"></div>
                    </div>
                </div>
                <?php echo VsiiTemplate::load_view('menu'); ?>
            </div>
        </header>
        <!-- Begin Main -->
        <main id="main" class="">
