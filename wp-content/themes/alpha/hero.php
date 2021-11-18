<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 custom">
            	<?php 
            		if(current_theme_supports('custom-logo')) {?>
            			<div class="text-center">
            				<img src="<?php echo the_custom_logo(); ?>" alt="">
		            	</div>
            		<?php }
            	?>
                <h3 class="tagline"><?php echo bloginfo('description'); ?></h3>
                <a href="<?php echo site_url(); ?>"><h1 class="align-self-center display-1 text-center heading"><?php echo bloginfo('name'); ?></h1></a>
            </div>
            <div class="col-md-12">
            	<?php wp_nav_menu( array(
            		'theme_location'  => 'topmennu',
            		'container_class' => 'menu-{menu-slug}-container',
            		'menu_class'      => 'list-inline text-center',
            		'menu_id'         => '',
            	) ); ?>
            </div>
        </div>
    </div>
</div>