<?php
$sidebar=vsii_get_sidebar();
$sidebar_pos=$sidebar['position'];
global $wp_query;
get_header();
?>
    <div class="service-single">
        <div class="container">
            <div class="row">
                <?php if($sidebar_pos=='left'){ get_sidebar(); }?>
                <div class="<?php echo esc_html($sidebar_pos=='no'?'col-md-12':'col-md-9'); ?> primary-content">

                    <article class="article-content">
                        <div class="blog01">
                            <div class="page-title">
                                <?php
                                the_archive_title( '<h2 class="page-title">', '</h2>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
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
                <?php if($sidebar_pos=='right'){ get_sidebar(); }?>
            </div>
        </div>
    </div>
<?php
get_footer();