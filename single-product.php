<?php
get_header();
while(have_posts()){
    the_post();
    $tags = wp_get_post_terms(get_the_ID(), 'category-product');
    $first_tag = $tags[0]->term_id;
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 5,
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
                'taxonomy' => 'category-product',
                'field' => 'term_id',
                'terms' => $first_tag
            )
        )
    );
    $my_query = new WP_Query($args);
    if ( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

    <?php
    endwhile;
    }
    wp_reset_query();

    ?>
    <div class="service-single">
        <div class="container">
            <?php echo vsii_breadcrumb(); ?>
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="article-content">
                        <div class="banner-image">
                            <?php
                            var_dump(wp_get_attachment_image(66, array(76, 76)));
                            if(has_post_thumbnail()) {
                                echo get_the_post_thumbnail(get_the_ID(),array(770,410),array('class'=>'img-responsive'));
                            }
                            ?>
                        </div>
                        <div class="type-post pb-border">
                            <h3 class="title"><?php the_title() ?></h3>
                            <div class="description mt30">
                                <?php
                                wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', "vsii-template" ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', "vsii-template" ) . ' </span>%',
                                    'separator'   => '<span class="">, </span>',
                                ) );
                                ?>
                            </div>
                            <div class="wg-share-tag overflow">
                                <div class="">
                                <?php the_tags('<span class="txtlabel">'.esc_html__('Tags:',"vsii-template").'&nbsp;</span>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="single-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">mô tả</a></li>
                            <li role="presentation"><a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">bình luận</a></li>
                        </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <?php the_content(); ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="comment">
                                <?php
                                if(comments_open()){
                                    comments_template();
                                }?>
                            </div>
                          </div>

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