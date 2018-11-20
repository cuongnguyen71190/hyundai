<?php
	$html = '<div class="row list-category">';
	foreach ($categories as $key => $category) {
		$image = get_wp_term_image($category->term_id);
		$args = array(
		    'post_type' => 'product',
		    'tax_query' => array(
		        array(
		            'taxonomy' => 'category-product',
		            'field'    => 'id',
		            'terms'    => $category->term_id
		        )
		    )
		);
		$query = new WP_Query( $args );
		$content = '<a href="'. get_term_link($category->term_id) .'"><div class="feature-image" style="padding-top: 300px;">
			<div class="hover-box">
				<div class="hover-box-inner">
					<div class="hover-box-front">
						<div class="fill" style="background: url(' .$image .') no-repeat center; background-size: cover; max-height: 300px;"></div>
						<div class="overlay"></div>
					</div>

					<div class="hover-box-back">
						<div class="hover-box-title">
							<h4 class="text-center">' . $category->name . '</h4>
						</div>
						<div class="hover-box-text">
							'. $query->found_posts . ' sản phẩm
						</div>
					</div>
				</div>
			</div>
		</div></a>';
		if ($key == 0) {
			$html .= '<div class="col-md-6 col-sm-6 col-xs-12 feature-image-'.$key.'" style="padding: 0">' . $content . '</div>';
		}
		if ($key == 1) {
			$html .= '<div class="col-md-6 col-sm-6 col-xs-12 feature-image-'.$key.'">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0">
					' . $content . '
					</div>';
		}
		if ($key == 2) {
			$html .= '<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 0">
				<div class="row" style="margin-left: 15px;">
					<div class="col-md-12 feature-image-'.$key.'" style="padding: 0">
					' . $content . '
					</div>';
		}
		if ($key == 3) {
			$html .= '<div class="col-md-12 feature-image-'.$key.'" style="padding: 0">
				' . $content . '
				</div>
				</div><!!-- /row --!!>
				</div> <!!-- /col-md-6 --!!>
				</div> <!!-- /row --!!>
				</div> <!!-- /col-md-6 --!!>
				';
		}
	}
	$html .= '</div>';
	echo $html;
?>

