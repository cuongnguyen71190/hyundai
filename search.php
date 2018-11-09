<?php
	global $wp_query;
	get_header();
?>
	<div class="container search-result">
		<div class="row">
			<div class="flex-row">
				<div class="flex-left" id="breadcrum">
					<?php echo vsii_breadcrumb(); ?>
				</div>
				<div class="flex-right">
					<?php count_result($wp_query); ?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<?php
					while (have_posts()) {
						the_post();
						{?>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<?php  get_template_part('loop', 'archive'); ?>
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