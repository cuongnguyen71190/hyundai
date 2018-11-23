<?php
extract($data);
?>
<div class="new-product">
	<h3 class="sidebar-title"><?php echo $data['title']; ?></h3>
	<ul>
	<?php
    while (have_posts()) {
        the_post();
        $thumbnail_url = get_the_post_thumbnail(get_the_ID(), array(60, 60));
        $price = get_post_meta(get_the_ID(), 'price', true);
        ?>
        	<li class="item">
                <a href="<?php the_permalink() ?>">
                	<?php echo do_shortcode($thumbnail_url); ?>
            		<span><?php the_title() ?></span>
            	</a>
	        </li>
    <?php } ?>
    </ul>
</div>
