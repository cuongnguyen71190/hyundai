<?php
get_header();

while(have_posts()){
	the_post();
	?>
	<div id="area-main">
		<div class="container">
			<div class="row">
				<?php echo vsii_breadcrumb(); ?>
				<div class="col-xs-12 col-md-12'); ?>">
					<div class="blog-item">
						<?php
						if (has_post_thumbnail()) {
							echo get_the_post_thumbnail(get_the_ID(),array(1100,600),array('class'=>'img-responsive'));
						}
						?>
						<div class="blog-content">
							<h3 class="page-title"><?php the_title() ?></h3>

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
						<div class="content-comment">
							<?php
							if(comments_open()){
								comments_template();
							}?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
get_footer();