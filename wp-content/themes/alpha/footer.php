<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            	<?php if(is_active_sidebar('footer-left')) : ?>
            		<?php dynamic_sidebar('footer-left'); ?>
            	<?php endif; ?>
            </div>
            <div class="col-md-6">
            	<?php wp_nav_menu( array(
            		'theme_location'  => 'footer-menu',
            		'container_class' => 'menu-{menu-slug}-container',
            		'menu_class'      => 'list-inline text-center',
            		'menu_id'         => '',
            	) ); ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>