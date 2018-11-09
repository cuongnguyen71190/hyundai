<div class="product-item">
	<div class="image">
		<a href="<?php the_permalink() ?>">
			<?php
			if (has_post_thumbnail()) {
				echo get_the_post_thumbnail(get_the_ID(), array(300, 255), array('class'=>'img-responsive'));
			} else {
				$link_image = get_template_directory_uri()."/assets/images/no_img.png";
			}
			?>
		</a>
	</div>
	<div class="box-product">
		<div class="title">
			<h3 class="">
	        	<a class="second-text-color" href="<?php the_permalink() ?>"><?php the_title() ?></a>
	        </h3>
		</div>

        <div class="price">
			<span class="pre-price">Giá: </span>
			<span class="next-price"><?php echo get_post_meta(get_the_ID(), 'price', true); ?></span>
		</div>
	</div>

</div>
