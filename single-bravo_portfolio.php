<?php
get_header();
global $post;
$author_id = $post->post_author;
$sidebar=vsii_get_sidebar();
$sidebar_pos=$sidebar['position'];
while(have_posts()){
    the_post();
    ?>
    <div class="introduction spacetb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="intro-image">
                        <p class="relative">
                            <?php
                            if(has_post_thumbnail()) {
                                echo get_the_post_thumbnail(get_the_ID(),array(570,570),array('class'=>'img-responsive'));
                                $url_tmb = get_the_post_thumbnail_url(get_the_ID(),'full');
                                if(!empty($url_tmb)){
                                    echo '<a href="'.esc_url($url_tmb).'" class="zoom"></a>';
                                }
                            }
                            ?>

                        </p>

                        <ul>
                            <?php
                            $gallery = get_post_meta(get_the_ID(),'gallery',true);
                            $gallery = explode(',',$gallery);
                            if(!empty($gallery)){
                                foreach($gallery as $k=>$v){
                                    $url = wp_get_attachment_image_url($v,array(300,300));
                                    $url_full = wp_get_attachment_image_url($v,'full');
                                ?>
                                    <li class="relative">
                                        <img src="<?php echo esc_url($url) ?>" class="img-responsive" >
                                        <a href="<?php echo esc_url($url_full) ?>" class="zoom"></a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-6">
                    <article class="article-ourwork-single">
                        <div class="wpb-intro">
                            <h3 class="wpb-intro-title text-uppercase"><?php the_title() ?></h3>
                        </div>

                        <?php
                        the_content();
                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', "vsii-template" ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', "vsii-template" ) . ' </span>%',
                            'separator'   => '<span class="">, </span>',
                        ) );
                        ?>

                        <?php get_template_part('share'); ?>
                    </article>


                </div>

            </div>
        </div>
    </div>
    <?php
}
get_footer();