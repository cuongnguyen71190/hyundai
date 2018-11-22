<?php
extract($data);
?>
<div class="new-product">
	<div class="row">
		<h3 class="sidebar-title"><?php echo $data['title']; ?></h3>
		<?php
	    while (have_posts()) {
	        the_post();
	        $thumbnail_url = get_the_post_thumbnail(get_the_ID(), array(247, 185));
	        $price = get_post_meta(get_the_ID(), 'price', true);
	        ?>
	        	<div class="product-item col-xs-12">
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
