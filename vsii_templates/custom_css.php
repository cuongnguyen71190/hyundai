<?php
/*
 * Custom color for option main color
 * */
if(empty($main_color)){
	$main_color=vsii_get_option('main_color','#f4bc16');
	$bg_rgb = vsii_hex2rgb($main_color);
	$bg_rgb = implode(' , ',$bg_rgb);
}else{
	$bg_rgb = "__rgba__";
}
?>
a:hover{
color: <?php echo esc_attr($main_color) ?>;
}