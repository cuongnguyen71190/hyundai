<?php
	$html = '<div class="row">';
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
		$content = '<div class="feature-image" style="padding-top: 300px;">
			<div class="hover-box">
				<div class="hover-box-inner">
					<div class="hover-box-front">
						<div class="fill" style="background: url(' .$image .') no-repeat center; background-size: cover; max-height: 300px;"></div>
						<div class="overlay"></div>
					</div>

					<div class="hover-box-back">
						<div class="hover-box-title">
							<h2 class="text-center">' . $category->name . '</h2>
						</div>
						<div class="hover-box-text">
							'. $query->found_posts . '
						</div>
					</div>
				</div>
			</div>
		</div>';
		if ($key == 0) {
			$html .= '<div class="col-md-6">' . $content . '</div>';
		}
		if ($key == 1) {
			$html .= '<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
					' . $content . '
					</div>';
		}
		if ($key == 2) {
			$html .= '<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
					' . $content . '
					</div>';
		}
		if ($key == 3) {
			$html .= '<div class="col-md-12">
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

