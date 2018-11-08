<?php
extract($data);
?>
<div class="list-product number_<?php echo esc_html($item_per_line) ?>">
	<div class="col-inner">
		<h2 class="title-des">
			<span>
				<a href="<?php echo get_category_link($data['category']); ?>"><?php echo $data['title']; ?></a>
			</span>
		</h2>
		<div class="row">
			<?php
		    while(have_posts()){
		        the_post();
		        $thumbnail_url = get_the_post_thumbnail(get_the_ID(), array(247, 185));
		        $price = get_post_meta(get_the_ID(), 'price', true);
		        ?>
		        	<div class="product-item col-md-3 col-sm-6 col-xs-12">
			            <div class="image">
			                <a href="<?php the_permalink() ?>"><?php echo do_shortcode($thumbnail_url); ?></a>
			            </div>
			            <div class="box-product">
			            	<div class="title">
				                <h3>
				                	<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				                </h3>
				            </div>
				            <?php if (!empty($price)) { ?>
				            <div class="price">
				            	<span class = "pre-price">Giá:</span>
				            	<span class = "next-price"><?php echo $price; ?></span>
				            </div>
				        	<?php } ?>
			            </div>
			        </div>
		    <?php } ?>
		</div>
	</div>
</div>
