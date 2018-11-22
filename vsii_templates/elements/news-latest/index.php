<div class="row">
	<h3 class="sidebar-title">Tin Mới Nhất</h3>
	<?php
	while($myposts->have_posts()){
	    $myposts->the_post();
	    $thumbnail_url = get_the_post_thumbnail( get_the_ID());
	    ?>
		<div class="news-item col-xs-12">
			<a href="<?php the_permalink() ?>">
				<div class="col-inner">
					<?php if ($thumbnail_url) { ?>
			        <div class="image">
			           <?php echo do_shortcode($thumbnail_url); ?>
			        </div>
			    	<?php } ?>
			        <div class="title">
			            <h5><?php the_title() ?></h5>
			            <p><?php echo get_the_date('d/m/Y'); ?></p>
			        </div>
		        </div>
	        </a>
	    </div>
	<?php } ?>
</div>
