<li id="comment-<?php comment_ID(); ?>" <?php comment_class(['media','blog-reply']) ?>>
    <div class="media-left">
        <a href="#" onclick="return false">
            <?php echo get_avatar($comment,74,'','',array('class'=>'media-object')) ?>
        </a>
    </div>
    <div class="media-right">
        <div class="media-content">
            <h4 class="media-heading">
                <span class="txtlabel text-uppercase"><?php printf(  '%s', sprintf( '%s', get_comment_author_link() ) ); ?></span>
                <span class="media-heading-date"><?php echo get_comment_time(get_option('date_format').' '.get_option('time_format')) ?></span>
            </h4>
            <div class="comment-content">
            <?php comment_text($comment); ?>
            </div>
            <div class="mt20">
                <!--<a class="btn-yellow text-uppercase" href="#" title="Reply">Reply</a>-->
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
        </div>
    </div>
</li>