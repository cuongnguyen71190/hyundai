<?php
/**
 * Template Name: Template Blog
 */

get_header();
$sidebar=vsii_get_sidebar();
$sidebar_pos=$sidebar['position'];

// Query Post
$page = get_query_var('paged',1);
$query=array(
	'paged'=>$page,
	'post_type' => 'post',
);
global $wp_query;
query_posts($query);
?>
	<div class="service-single">
		<div class="container">
			<div class="row">
				<div class="sidebar-<?php echo esc_attr($sidebar_pos)?> <?php echo esc_html($sidebar_pos=='no'?'col-md-12':'col-md-9'); ?> primary-content">
					<article class="article-content">
						<div class="blog01">
							<div class="row">
								<?php
								while(have_posts()){
									the_post();
									?>
                                    <div class="col-xs-12 col-sm-3">
                                        <?php get_template_part('loop','post'); ?>
                                    </div>
									<?php
								}
								?>
							</div>
						</div>
						<?php echo vsii_paginate_links(); ?>
					</article>
				</div>
				<?php if($sidebar_pos=='right' or $sidebar_pos=='left'){ get_sidebar(); }?>
			</div>
		</div>
	</div>
<?php wp_reset_postdata(); ?>
<?php
get_footer();
