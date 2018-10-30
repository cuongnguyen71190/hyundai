<?php
	/**
	 * The template for displaying comments
	 *
	 * The area of the page that contains both current comments
	 * and the comment form.
	 *
	 * @package WordPress
	 * @subpackage Twenty_Fifteen
	 * @since Twenty Fifteen 1.0
	 */

	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() ) {
		return;
	}

?>
	<div class="wg-post-comments pb-border">
		<?php if ( have_comments() ) : ?>
			<div class="sect-header text-uppercase">
				<h3 class="title-el">
					<?php comments_number( esc_html__( 'No comment', "vsii-template" ),
						esc_html__( 'Comment: 1', "vsii-template" ), esc_html__( 'Comments : %', "vsii-template" ) ) ?>

				</h3>
			</div>


			<?php vsii_comment_nav(); ?>

			<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 127,
				'callback'    => 'vsii_comment_list'
			) );
			?>
			</ol>

			<?php vsii_comment_nav(); ?>

		<?php endif; // have_comments() ?>

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
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
                                            		<i class="fa fa-comment"></i>
                                         	 		<textarea class="form-control" id="comment" name="comment" cols="40" rows="5" placeholder="' . esc_html__( 'Type your message...', "vsii-template" ) . '"></textarea>
                                        	  </div>
                                        </div>
									';
				} ?>
			<?php
			$commenter=wp_parse_args($commenter,array(
				'comment_author_email'=>'',
				'comment_author_website'=>'',
				'comment_author'=>''
			));
				$comment_form = array(
					'fields'         => array(

						'author'  => '<div class="frm"><div class="row">
												<div class="form-group col-md-6 col-sm-6">
													<div class="inner-addon relative left-addon">
														<i class="fa fa-user"></i>
														<input id="author"  name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true"  class="form-control" placeholder="' . esc_html__( 'Your Name', "vsii-template" ) . '" />
													</div>
							                     </div>',

						'email'   => '<div class="form-group col-md-6 col-sm-6">
										<div class="inner-addon relative left-addon">
											<i class="fa fa-user"></i>
											<input  placeholder="' . esc_html__( 'Email', "vsii-template" ) . '"  class="form-control" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" />
							          	</div>
							          </div>',



						'message' => '<div class="form-group col-md-12 col-sm-12">
											  <div class="inner-addon relative left-addon">
                                            		<i class="fa fa-comment"></i>
                                         	 		<textarea class="form-control" id="comment" name="comment" cols="40" rows="5" placeholder="' . esc_html__( 'Type your message...', "vsii-template" ) . '"></textarea>
                                        	  </div>
                                        </div>
                                     </div>
                                     </div>',
					),
					'comment_field'  => $comment_field,
					'class_submit'   => 'submit-small',
					'title_reply'    => ' <div class="sect-header text-uppercase"><h3>'.esc_html__( 'Leave a comment', "vsii-template" ).'</h3></div>',
					'title_reply_to' => esc_html__( 'Leave a COMMENT to %s', "vsii-template" ),
					'label_submit' => esc_html__( 'SEND COMMENT', "vsii-template" ),
				);

				comment_form( $comment_form ); ?>
		</div>

	</div>
