<?php
get_header();
?>
    <div class="article-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-row">
                        <div class="flex-left" id="breadcrum">
                            <?php echo vsii_breadcrumb(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 primary-content">
                    <div class="row">
                        <?php
                        while(have_posts()){
                            the_post();
                            {?>
                                <div class="col-xs-12 col-sm-12 col-md-12 new-item">
                                    <?php get_template_part('loop','post'); ?>
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