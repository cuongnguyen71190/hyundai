<?php
global $post;
get_header();
while(have_posts()){
    the_post();
    ?>
    <div class="product-single article-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-row">
                        <div class="flex-left" id="breadcrum">
                            <?php echo vsii_breadcrumb(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9 product-left">
                    <div class="row product-top">
                        <div class="col-sm-6">
                            <?php
                                $gallery = get_post_meta(get_the_ID(), 'gallery', true);
                                if (!empty($gallery)) {
                                $gallery = explode(',', $gallery);
                            ?>
                            <div class="owl-carousel" id="image-related-slider">
                                <?php
                                foreach ($gallery as $k => $v) {
                                    $url = wp_get_attachment_image_url($v, array(76, 76));
                                    $url_full = wp_get_attachment_image_url($v, 'full');
                                ?>
                                <div>
                                    <img class="pro-img" src="<?php echo esc_url($url_full) ?>" data-thumb="<?php echo esc_url($url) ?>" alt="<?php the_title() ?>" />
                                    <div class="expand">
                                        <i class="fa fa-expand"></i>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div id="pro-modal" class="modal">
                                <div class="content">
                                    <span class="close">&times;</span>
                                    <img class="modal-content" id="pro-modal-img">
                                </div>
                            </div>
                            <?php
                            } else { ?>
                                <div class="banner-image">
                                <?php if (has_post_thumbnail()) {
                                    echo get_the_post_thumbnail(get_the_ID(), array(770, 410),array('class'=>'img-responsive pro-img'));
                                } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="type-post">
                                <h3 class="pro-title"><?php the_title() ?></h3>
                                <p class="pro-price">Giá: <span><?php echo get_post_meta(get_the_ID(), 'price', true); ?></span></p>

                                <div class="pro-desc">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product-bottom">
                        <div class="col-xs-12">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#description" aria-controls="description" role="tab" data-toggle="tab">mô tả</a>
                                </li>
                                <li role="presentation">
                                    <a href="#comment" aria-controls="comment" role="tab" data-toggle="tab"><?php comments_number( esc_html__( 'bình luận (0)', "vsii-template" ), esc_html__( 'bình luận (1)', "vsii-template" ), esc_html__( 'bình luận (%)', "vsii-template" ) ) ?></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="description">
                                    <?php the_content(); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="comment">
                                    <?php
                                    if (comments_open()) {
                                        comments_template();
                                    }?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
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

                    if ( $my_query->have_posts() ) { ?>
                    <div class="row related-product">
                        <div class="com-md-12 col-xs-12">
                            <h3 class="cat-title">SẢN PHẨM TƯƠNG TỰ</h3>
                            <div class="owl-carousel" id="related-product-carousel">
                                <?php
                                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                    <div class="product-item">
                                        <div class="image">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                $link_image = get_the_post_thumbnail_url(get_the_ID(), 'full', array('class'=>'img-responsive'));
                                            } else {
                                                $link_image = get_template_directory_uri()."/assets/images/no_img.png";
                                            }
                                            ?>
                                            <a href="<?php the_permalink() ?>">
                                                <img src="<?php echo $link_image; ?>" alt="<?php the_title() ?>">
                                            </a>
                                        </div>
                                        <div class="box-product">
                                            <div class="title">
                                                <h3>
                                                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                                </h3>
                                            </div>

                                            <div class="price">
                                                <span class="pre-price">Giá: </span>
                                                <span class="next-price"><?php echo get_post_meta(get_the_ID(), 'price', true); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <?php }
                    wp_reset_query();
                    ?>
                </div>
                <div class='content-sidebar col-md-3 col-sm-3 hidden-xs'>
                    <?php
                    echo do_shortcode('[new_product title="Sản Phẩm Mới Nhất" number_post=3 post__not_in=' .$post->ID. ']');
                    echo do_shortcode('[vsii_news_latest]');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
get_footer();