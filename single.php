<?php
get_header();
global $post;
$sidebar=vsii_get_sidebar();
$sidebar_pos=$sidebar['position'];
while(have_posts()){
    the_post();
    ?>
    <div class="service-single">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 sidebar-<?php echo esc_attr($sidebar_pos)?> <?php echo esc_html($sidebar_pos=='no'?'col-md-12':'col-md-9'); ?> primary-content">
                    <div class="article-content">
                        <div class="banner-image">
                            <?php
                            if(has_post_thumbnail()) {
                                echo get_the_post_thumbnail(get_the_ID(),array(770,410),array('class'=>'img-responsive'));
                            }
                            ?>
                        </div>
                        <div class="type-post pb-border">
                            <h1 class="title"><?php the_title() ?></h1>
                            <div class="description mt30">
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
                            </div>
                            <div class="wg-share-tag overflow">
                                <div class="">
                                <?php the_tags('<span class="txtlabel">'.esc_html__('Tags:',"vsii-template").'&nbsp;</span>') ?>
                                </div>
                                <div>
                                <?php $cat=get_the_term_list(get_the_ID(),'category',false,', ',false);
                                if($cat){
                                    echo '<span class="txtlabel">'.esc_html__('Category:',"vsii-template").' </span>&nbsp;'.$cat;
                                }?>
                                </div>
                            </div>
                        </div>
                        <div class="content-comment">
                            <?php
                            if(comments_open()){
                                comments_template();
                            }?>
                        </div>
                    </div>
                </div>
                <?php if($sidebar_pos=='right' or $sidebar_pos=='left'){ get_sidebar(); }?>

            </div>
        </div>
    </div>
    <?php
}
get_footer();