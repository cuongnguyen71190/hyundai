<?php
	global $wp_query;
	get_header();
	$total = $wp_query->found_posts;
	if ($wp_query->query_vars['paged'] == 0) {
		$from = 1;
		$to = $wp_query->query_vars['posts_per_page'];
	} else {
		$from = ($wp_query->query_vars['paged'] - 1) * $wp_query->query_vars['posts_per_page'] + 1;
		$to = $wp_query->query_vars['paged'] * $wp_query->query_vars['posts_per_page'];
		if ($wp_query->query_vars['paged'] * $wp_query->query_vars['posts_per_page'] > $wp_query->found_posts) {
			$to = $total;
		}
	}
	if ($total == 0) {
		$from = 0;
		$to = 0;
	}
	if ($wp_query->query_vars['posts_per_page'] > $wp_query->found_posts) {
		$to = $total;
	}
?>
	<div class="container search-result">
		<div class="row">
			<div class="flex-row">
				<div class="flex-left" id="breadcrum">
					<?php echo vsii_breadcrumb(); ?>
				</div>
				<div class="flex-right">
					<div class="show-page">
						<p>Hiển thị <span><?php echo $from ?> - <?php echo $to; ?></span> trong <?php echo $total ?> kết quả</p>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<?php
					while (have_posts()) {
						the_post();
						{?>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<?php  get_template_part('loop','post'); ?>
							</div>
							<?php
						}
					}
					if (!have_posts()) {
						get_template_part('loop','none');
					}
					?>
				</div>
				<?php echo vsii_paginate_links(); ?>
			</div>
		</div>
	</div>
<?php
	get_footer();