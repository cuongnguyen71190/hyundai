<?php
get_header();
?>
    <div class="service-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 primary-content">
                    <article class="article-content">
                        <div class="blog01">
                            <div class="page-title">
                                <?php
                                echo vsii_breadcrumb();
                                ?>
                            </div>
                            <div class="row">
                                <?php
                                while(have_posts()){
                                    the_post();
                                    {?>
                                        <div class="col-xs-12 col-sm-6">
                                            <?php get_template_part('loop','post'); ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php echo vsii_paginate_links(); ?>
                    </article>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();