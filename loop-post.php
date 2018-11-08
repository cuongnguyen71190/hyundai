<div <?php post_class('box-post')?>>
	<div class="pic">
		<a href="<?php the_permalink() ?>">
			<?php
			if(has_post_thumbnail()){
				echo get_the_post_thumbnail(get_the_ID(),array(370,260),array('class'=>'img-responsive'));
			}else{
				$link_image = get_template_directory_uri()."/assets/images/no_img.png";
			}
			?>
		</a>
	</div>
	<div class="post-back">

		<div class="post-front">
			<div class="inner">
                <h3 class=""><a class="second-text-color" href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                <div class="post-front-info">
					<span class="post-front-info-author">
						<?php esc_html_e('Post by',"vsii-template") ?>
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="name"><?php the_author(); ?> </a>
					</span>
					<span class="divider">|</span>
					<span class="post-front-info-category">
						<?php $terms=get_the_terms(get_the_ID(),'category');
						$terms_link=array();
						if(!empty($terms) and !is_wp_error($terms)){
							$i=0;
							foreach($terms as $term){
								if($i>1) continue;

								$terms_link[]=sprintf('<a class="%s">%s</a>',get_category_link($term),$term->name);

								$i++;
							}
						}
						if(!empty($terms_link)) echo implode(', ',$terms_link);


						?>
					</span>
				</div>
				<div class="hidden-sm hidden-xs"><?php the_excerpt() ?></div>
				<a href="<?php the_permalink() ?>" class="continue"><?php esc_html_e('Continue Reading &raquo;',"vsii-template") ?></a>
			</div>
		</div>
	</div>
</div>
