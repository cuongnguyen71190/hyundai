<section class="section dark" id="product-featured">
    <div class="section-content relative">
        <div class="row">
            <div class="col-md-12"  >
                <div class="col-inner"  >
                    <div class="title-special-header">
                        <div class="wrapper-title">
                            <span class="big-title"><?php echo $data['title']; ?></span><br />
                            <span class="sub-title">&lt;&lt;&lt;<?php echo $data['description']; ?>&gt;&gt;&gt;
                            </span>
                        </div>
                    </div>
                    <div class="owl-carousel" id="featured-product-slider">
                    <?php
                        while ($results->have_posts()) {
                            $results->the_post();
                            $url = get_the_post_thumbnail_url(get_the_ID(), array('300', '255'));
                            ?>
                            <div class="box">
                                <div class="image">
                                    <img src="<?php echo esc_url($url) ?>" alt="<?php the_title() ?>" />
                                </div>
                                <div class="box-info">
                                    <div class="left"><?php the_title() ?></div>
                                    <div class="right">Giá: <?php echo get_post_meta(get_the_ID(), 'price', true); ?></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>