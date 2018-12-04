<div <?php post_class('box-post')?>>
	<div class="title">
		<h3>
			<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
		</h3>
	</div>
	<div class="post-front-info">
		<span class="post-front-info-date">
			<?php esc_html_e('Post on',"vsii-template") ?>
			<span><?php echo get_the_date('d/m/Y', get_the_ID()) ?></span>
		</span>
	</div>
	<?php
	if (has_post_thumbnail()) { ?>
	<div class="picture">
		<a href="<?php the_permalink() ?>">
			<?php
				echo get_the_post_thumbnail(get_the_ID(), array(370, 260), array('class'=>'img-responsive'));
			?>
		</a>
	</div>
	<?php } ?>
	<div class="post-back">
		<div class="inner">
			<div class="description"><?php the_excerpt() ?></div>
			<a href="<?php the_permalink() ?>" class="continue"><?php esc_html_e('Continue Reading &raquo;', "vsii-template") ?></a>
		</div>
	</div>
</div>
