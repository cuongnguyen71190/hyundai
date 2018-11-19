<?php

extract($data);
$image = wp_get_attachment_image_src($data["image"], "large");
?>
<div class="feature-image" style="padding-top: 300px;">
	<div class="hover-box">
		<div class="hover-box-inner">
			<div class="hover-box-front">
				<div class="fill" style="background: url('<?php echo $image[0] ?>') no-repeat center; background-size: cover; max-height: 300px;"></div>
				<div class="overlay"></div>
			</div>

			<div class="hover-box-back" style="color: <?php echo $color; ?>">
				<div class="hover-box-title">
					<h2 class="text-center" style="color: <?php echo $color; ?>; font-size: 30px;"><?php echo $data['title']; ?></h2>
				</div>
				<div class="hover-box-text">
					<?php echo $data['content']; ?>
				</div>
			</div>
		</div>
	</div>
</div>