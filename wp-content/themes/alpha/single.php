<?php get_header(); ?>
<?php
$sidebar_class = "col-xl-8";
    $text_class = "text-left";
if(!is_active_sidebar('blog-sidebar')) {
    $sidebar_class = "col-xl-12";
    $text_class = "text-center";
}
$attachments = new Attachments( 'attachments' );
?>
<body <?php body_class(array("first-class", "second-class", "third-class")); ?>>
<?php get_template_part('template-parts/common/hero'); ?>
<div class="post-wrap">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($sidebar_class); ?>">
                <div class="posts">
                    <?php
                    while(have_posts()) {
                        the_post();?>
                        <div class="single-author-link">
                            <?php the_author_posts_link(); ?>
                        </div>
                        <!-- gallery images -->
                        <?php if( $attachments->exist() ) : ?>
                            <div id="gallery-images">
                                <?php while( $attachment = $attachments->get() ) : ?>
                                   <div class="single-image">
                                       <?php echo $attachments->image( 'large' ); ?>
                                   </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                         <?php get_template_part('post-formats/content', get_post_format()); ?>
                    <?php }
                    ?>
                    <div class="pages-link">
                        <?php echo wp_link_pages(); ?>
                    </div>
                    <div class="post-links">
                        <div class="container">
                            <?php previous_post_link(); ?>
                            <?php next_post_link(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(is_active_sidebar('blog-sidebar')) : ?>
            <div class="col-xl-4">
                <?php
                if(is_active_sidebar('blog-sidebar')) {
                    dynamic_sidebar('blog-sidebar');
                }
                ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
	<div class="container">
		<?php if(comments_open()) : ?>
			<div class="comments-template">
				<?php comments_template(); ?>
			</div>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
</body>
</html>