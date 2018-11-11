<?php
global $wp_query;
get_header();
?>
    <div class="category article-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="flex-row">
                        <div class="flex-left" id="breadcrum">
                            <?php echo vsii_breadcrumb(); ?>
                        </div>
                        <div class="flex-right">
                            <?php count_result($wp_query); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 article-content">
                    <div class="row">
                        <?php
                        while(have_posts()){
                            the_post();
                            {?>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <?php get_template_part('loop','archive'); ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php echo vsii_paginate_links(); ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();