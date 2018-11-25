<div class="new-product new-latest">
	<h3 class="sidebar-title">Tin Mới Nhất</h3>
	<ul>
	<?php
	while($myposts->have_posts()) {
	    $myposts->the_post();
	    $thumbnail_url = get_the_post_thumbnail(get_the_ID(), array(48, 48));
	    $day =  get_the_date('d');
	    $month = get_the_date('m');
	    ?>
		<li>
			<a href="<?php the_permalink() ?>">
					<div class="image">
						<?php if ($thumbnail_url) {
					    	echo $thumbnail_url;
					    } else { ?>
						<div class="no-img"></div>
				    	<?php } ?>
						<div class="date">
							<span><?php echo $day; ?></span>
							<span><?php echo $month; ?></span>
						</div>
					</div>
	            <span><?php the_title() ?></span>
	        </a>
	    </li>
	<?php } ?>
	</ul>
</div>
