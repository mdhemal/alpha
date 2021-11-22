<?php 
/**
 * Template Name: Custom Query 1
 */
get_header(); ?>

<body <?php body_class(array("first-class", "second-class", "third-class")); ?>>
<?php get_template_part('template-parts/common/hero'); ?>
<div class="post-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center tag-space">
                <div class="posts">
                    <?php
                    $query = get_posts( array(
                        'post__in' => array(11, 12, 15),
                        'orderby' => 'post__in',
                        'posts_per_page' => 1,
                    ) );
                    foreach( $query as $post ) {
                        setup_postdata( $query );
                        ?>
                        <h2><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
                    <?php } wp_reset_postdata(); 
                    ?>
                    <div class="pagination">
                        <?php
                        the_posts_pagination(
                            array(
                                'screen_reader_text' => '',
                                'prev_text' => 'New Posts',
                                'next_text' => 'Old Posts'
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
</body>
</html>