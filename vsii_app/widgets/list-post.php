<?php
var_dump("xxx");
if(!class_exists("Vsii_Recent_Posts_Widget")){
	class Vsii_Recent_Posts_Widget extends WP_Widget {

		public function __construct(){

			parent::__construct( false, 'Vsii Recent Posts' );

		}
		static function st_add_widget()
		{
			register_widget( __CLASS__ );
		}

		public function widget( $args, $instance ) {
			var_dump($instance);
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Vsii Recent Posts' ,"vsii-template");


			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
			if ( ! $number )
				$number = 5;
			$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

			$r = new WP_Query( array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true
			) );
			if ($r->have_posts()) :
				echo $args['before_widget'];
				?>
					<?php if ( $title ) {
						echo balanceTags($args['before_title'] . $title . $args['after_title']);
					} ?>
					<ul class="group-listing">
							<?php while ( $r->have_posts() ) : $r->the_post();
							$link_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

							if(empty($link_image)){
								$link_image = get_template_directory_uri().'/assets/images/no_img.png';
							}
							?>
								<li>
									<h4>
										<a href="<?php the_permalink() ?>">
											<img alt="<?php the_title() ?>" class="img-responsive" src="<?php echo esc_url($link_image) ?>">
											<?php the_title() ?>
											<?php if ( $show_date ) : ?>
												<p>
													<?php echo get_the_time('j F Y') ?>
												</p>
											<?php endif; ?>
										</a>
									</h4>
								</li>
							<?php endwhile; ?>
					</ul>
				<?php
				// Reset the global $the_post as this query will have stomped on it
				wp_reset_postdata();

				echo $args['after_widget'];

			endif;
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			$instance['number'] = (int) $new_instance['number'];
			$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
			return $instance;
		}


		public function form( $instance ) {
			$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
			$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
			?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:',"vsii-template" ); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html($title); ?>" /></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' )) ?>"><?php _e( 'Number of posts to show:',"vsii-template" ); ?></label>
				<input class="tiny-text" id="<?php echo esc_html($this->get_field_id( 'number' )); ?>" name="<?php echo esc_html($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_html($number); ?>" size="3" /></p>

			<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_html($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_html($this->get_field_name( 'show_date' )); ?>" />
				<label for="<?php echo esc_html($this->get_field_id( 'show_date' )); ?>"><?php _e( 'Display post date?',"vsii-template" ); ?></label></p>
			<?php
		}

	}
	add_action( 'widgets_init', array('Vsii_Recent_Posts_Widget','st_add_widget'));
}

