<div id="wide-nav" class="header-bottom wide-nav hide-for-sticky nav-dark hide-for-medium">
    <div class="flex-row container">
        <div class="flex-col hide-for-medium flex-left">
            <?php
			    if ( has_nav_menu('primary') ) {
			        $args = array(
			            'theme_location' => 'primary',
			            'menu_class'      => 'menu nav navbar-nav header-bottom-nav nav-left  nav-divided nav-size-medium nav-spacing-xlarge nav-uppercase',
			            'walker'          => new Vsii_Menu_Walker,
			        );
			        wp_nav_menu($args);
			    }
		    ?>
        </div>
        <div class="flex-col hide-for-medium flex-right flex-grow">
            <ul class="nav header-nav header-bottom-nav nav-right  nav-divided nav-size-medium nav-spacing-xlarge nav-uppercase">
                <li class="header-search-form search-form html relative has-icon">
                    <div class="header-search-form-wrapper">
                        <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
