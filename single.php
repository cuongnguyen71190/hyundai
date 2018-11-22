<?php
get_header();
global $post;
while(have_posts()){
    the_post();
    ?>
    <div class="service-single product-single">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="flex-row">
                        <div class="flex-left" id="breadcrum">
                            <?php echo vsii_breadcrumb(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-9">
                    <div class="article-content">
                        <div class="banner-image">
                            <?php
                            // var_dump(wp_get_attachment_image(66, array(76, 76)));
                            if(has_post_thumbnail()) {
                                echo get_the_post_thumbnail(get_the_ID(),array(770,410),array('class'=>'img-responsive'));
                            }
                            ?>
                        </div>
                        <div class="type-post pb-border">
                            <h3 class="title"><?php the_title() ?></h3>
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
                            </div>
                        </div>
                        <div class="single-tab">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">homne</div>
                            <div role="tabpanel" class="tab-pane" id="profile">profile</div>
                            <div role="tabpanel" class="tab-pane" id="messages">messages</div>
                            <div role="tabpanel" class="tab-pane" id="settings">settings</div>
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
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
    <?php
}
get_footer();