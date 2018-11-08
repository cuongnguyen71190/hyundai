<?php
get_header();
while(have_posts()){
    the_post();
    ?>
    <div class="service-single">
        <div class="container">
            <?php echo vsii_breadcrumb(); ?>
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="article-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="nivoSlider" id="slider">
                                    <?php
                                    $gallery = get_post_meta(get_the_ID(), 'gallery', true);
                                    $gallery = explode(',', $gallery);
                                    if (!empty($gallery)) {
                                        foreach($gallery as $k=>$v){
                                            $url = wp_get_attachment_image_url($v, array(76, 76));
                                            $url_full = wp_get_attachment_image_url($v, 'full');
                                    ?>
                                        <img class="pro-img" src="<?php echo esc_url($url_full) ?>" data-thumb="<?php echo esc_url($url) ?>" alt="" />
                                    <?php } } ?>
                                </div>
                                <div id="pro-modal" class="modal">
                                    <div class="content">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="pro-modal-img">
                                    </div>
                                </div>

                                <div class="single-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#description" aria-controls="description" role="tab" data-toggle="tab">mô tả</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">bình luận (<?php echo get_comments_number() ?>)</a>
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
                            <div class="col-md-6">
                                <div class="type-post">
                                    <h3 class="pro-title"><?php the_title() ?></h3>
                                    <p class="pro-price">Giá: <span><?php echo get_post_meta(get_the_ID(), 'price', true); ?></span></p>

                                    <div class="pro-desc">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-product">
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
                        if ( $my_query->have_posts() ) {
                            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

                                <?php
                            endwhile;
                        }
                        wp_reset_query();
                        ?>
                    </div>
                </div>
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
    <?php
}
get_footer();