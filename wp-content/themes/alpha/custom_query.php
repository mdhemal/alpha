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
                    $paged = get_query_var("paged") ? get_query_var("paged") : 1;
                    $posts_per_page = 2;
                    $total_posts = 4;
                    // $post_ids = array(11, 12, 15, 140, 16);
                    $query = get_posts( array(
                        // 'post__in' => $post_ids,
                        'author_in' => 1,
                        'orderby' => 'post__in',
                        'numberposts' => $total_posts,
                        'posts_per_page' => $posts_per_page,
                        'paged' => $paged // for pagination

                    ) );
                    foreach( $query as $post ) {
                        setup_postdata( $query );
                        ?>
                        <h2><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
                    <?php } wp_reset_postdata(); 
                    ?>
                    <div class="pagination">
                        <?php
                        echo paginate_links(
                            array(
                                // 'total' => ceil(count($post_ids) / $posts_per_page)
                                'total' => ceil($total_posts / $posts_per_page)
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