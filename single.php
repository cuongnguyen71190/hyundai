<?php
get_header();
global $post;
while(have_posts()){
    the_post();
    ?>
    <div class="article-content product-single">
        <div class="content-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="title">
                            <h3>
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </h3>
                            <div class="flex-row">
                                <div class="flex-left" id="breadcrum">
                                    <?php echo vsii_breadcrumb(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="type-post">
                        <div class="description">
                            <?php
                            the_content();
                            ?>
                        </div>
                    </div>
                </div>
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
    <?php
}
get_footer();