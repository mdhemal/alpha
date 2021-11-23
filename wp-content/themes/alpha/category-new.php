<?php
get_header();
echo single_cat_title();
$alpha_curren_item = get_queried_object();
$alpha_thumb_thumbnail_id = get_field('tax_thumbnail', $alpha_curren_item);
$image_url = wp_get_attachment_image_src($alpha_thumb_thumbnail_id, 'thumbnail');?>
<div class="thumb-sq">
	<img src="<?php echo $image_url[0]; ?>" alt="">
</div>


