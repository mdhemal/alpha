<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part('template-parts/common/hero'); ?>
<div class="posts">
    <?php
    while(have_posts()) {
        the_post();?>
         <?php get_template_part('post-formats/content', get_post_format()) ?>
    <?php }
    ?>
</div>
<div class="blog-pagination">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php the_posts_pagination(array(
                'screen_reader_text' => ''
                )); ?>
            </div>
        </div>
    </div>
</div>

<!-- testimonial from testimonial page -->
<?php if(is_front_page()) : ?>
<div class="container">
    <div class="row">
        <div class="col-xxl-10 offset-xxl-1 mb-50">
            <div class="col-xxl-12">
                <?php
                          // retrieve all Attachments for the 'attachments' instance of post 123
                        $attachments = new Attachments( 'testimonial_slide', 143);
                ?>
                <?php if( $attachments->exist() ) : ?>
                <?php if (class_exists( 'Attachments' ) ) : ?>
                <h2 class="text-center">Testimonial</h2>
                <div class="testimonial-wrapper" id="gallery-images">
                    <?php while( $attachments->get() ) : ?>
                        <div class="single-attachments">
                            <div class="user-thumb">
                                <?php echo $attachments->image( 'thumbnail-large' ); ?>
                            </div>
                            <div class="user-content">
                                <h4 class="test-title"><?php echo esc_html($attachments->field( 'slide_testimonial_name' )); ?></h4>
                                <p class="test-email"><?php echo esc_html($attachments->field( 'slide_testimonial_email' )); ?></p>
                                <p class="test-pos"><?php echo esc_html($attachments->field( 'slide_testimonial_position' )); ?></p>
                                <p class="test-content"><?php echo esc_html($attachments->field( 'slide_testimonial_content' )); ?></p>
                            </div>
                        </div>
                     <?php endwhile; ?>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>