<?php

extract($data);

$args = array(
    'post_type' => 'product',
    'tax_query' => array(
        array(
            'taxonomy' => 'category-product',
            'field'    => 'id',
            'terms'    => $data['category']
        )
    )
);
$query = new WP_Query( $args );
?>
<div class="item-category">
	<a href="<?php echo get_term_link($categories->term_id, 'category-product') ?>">
		<div class="box box-category">
			<div class="box-image">
				<div class="image-zoom">
					<?php taxonomy_featured_image($categories->term_id); ?>
					<div class="overlay"></div>
				</div>
			</div>
			<div class="box-text text-center">
				<h5 class="uppercase header-title"><?php echo $categories->name ?></h5>
				<p class="is-xsmall uppercase"><?php echo $query->found_posts ?> san pham</p>
			</div>
		</div>
	</a>
</div>
