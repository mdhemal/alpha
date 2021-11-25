<?php

/**
 * Template Name: Pricing Table
*/
get_header();


if(class_exists('CMB2')) :
    $pricing = get_post_meta(get_the_ID(), '_alpha_pricing_table_group', true);?>
    <div class="container">
    	<div class="row">
    	<?php foreach($pricing as $price) : ?>
    		<div class="col-md-4 text-center ">
    			<h4 class="mb-5"><?php echo $price['_alpha_pricing_title']; ?></h4>
    			<ul class="mb-3">
					<?php foreach($price['_alpha_pricing_fields'] as $field) : ?>
	    				<li> <?php echo esc_html($field); ?> </li>
					<?php endforeach; ?>
    			</ul>
    			<h4><?php echo apply_filters('alpha_price_filer', $price['_alpha_pricing_value']);  ?></h4>
    		</div>
    	<?php endforeach; ?>
    	</div>
    </div>
<?php ?>
<?php endif;


get_footer();