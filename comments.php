<div class="wg-post-comments pb-border">
	<?php if ( have_comments() ) : ?>
		<ol class="comment-list">
		<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => true,
			'callback'    => 'vsii_comment_list'
		) );
		?>
		</ol>

	<?php endif; ?>

	<?php
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', "vsii-template" ); ?></p>
		<?php endif; ?>
	<div class="wg-comment-comments">
		<?php
			$comment_field = '';
			if ( is_user_logged_in() ) {
				$comment_field = '
				<div class="form-group">
					  <div class="inner-addon relative left-addon">
                 	 		<textarea class="form-control" id="comment" name="comment" cols="40" rows="5" placeholder="' . esc_html__( 'Type your message...', "vsii-template" ) . '"></textarea>
                	  </div>
                </div>';
			} ?>
		<?php
		$commenter = wp_parse_args($commenter, array(
			'comment_author_email'=>'',
			'comment_author_website'=>'',
			'comment_author'=>''
		));
		$comment_form = array(
			'fields' => array(
				'author' => '<div class="frm"><div class="row">
								<div class="form-group col-md-6 col-sm-6">
									<div class="inner-addon relative left-addon">
										<i class="fa fa-user"></i>
										<span class="error-message"></span>
										<input id="author"  name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true"  class="form-control" placeholder="' . esc_html__( 'Your Name', "vsii-template" ) . '" required />
									</div>
			                     </div>',
				'email' => '<div class="form-group col-md-6 col-sm-6">
								<div class="inner-addon relative left-addon">
									<i class="fa fa-user"></i>
									<span class="error-message"></span>
									<input  placeholder="' . esc_html__( 'Email', "vsii-template" ) . '"  class="form-control" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required />
					          	</div>
					        </div>',
				'message' => '<div class="form-group col-md-12 col-sm-12">
								    <div class="inner-addon relative left-addon">
                                		<i class="fa fa-comment"></i>
                                		<span class="error-message"></span>
                             	 		<textarea class="form-control" id="comment-form" name="comment" cols="40" rows="5" placeholder="' . esc_html__( 'Type your message...', "vsii-template" ) . '" required></textarea>
                            	    </div>
                                </div>
                             </div>
                             </div>',
			),
			'comment_field'  => $comment_field,
			'class_submit'   => 'submit-small',
			'title_reply'    => ' <div class="sect-header text-uppercase">'.esc_html__( 'Để Lại Bình Luận', "vsii-template" ).'</div>',
			'title_reply_to' => esc_html__( 'Để lại bình luận cho %s', "vsii-template" ),
			'label_submit' => esc_html__( 'Gửi Bình Luận', "vsii-template" ),
		);
		comment_form( $comment_form ); ?>
	</div>

</div>
