<?php
/**
 * Template Name: Template Blog
 */

get_header();
?>
<div class="container">
	<div class="row">
		<?php
		while(have_posts()){
			the_post();
			?>
		    <div class="col-xs-12 col-sm-9 col-md-9">
		        <?php the_content(); ?>
		    </div>
			<?php
		}
		?>
		<div class='content-sidebar col-xs-12 col-sm-3 col-md-3'>
		    <?php
		    echo do_shortcode('[new_product title="Sản Phẩm Mới Nhất" number_post=3]');
		    echo do_shortcode('[vsii_news_latest]');
		    ?>
		</div>
	</div>
</div>


<?php
get_footer();
