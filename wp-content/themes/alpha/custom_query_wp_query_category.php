<?php 
/**
 * Template Name: Custom Query Category Posts
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
                    $posts_per_page = 1;
                    $total_posts = 5;
                    // $post_ids = array(11, 12, 15, 140, 16);
                    $query = new Wp_Query( array(
                        'category_name' => 'new',
                        'posts_per_page' => $posts_per_page,
                        'paged' => $paged
                    ));
                    while($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <h2><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
                    <?php } wp_reset_query(); 
                    ?>
                    <div class="pagination">
                       <?php
                           echo paginate_links( array(
                            'total' => $query->max_num_pages,
                            'current' => $paged,
                            // 'prev_next' => false,
                            'prev_text' => 'Old Posts',
                            'next_text' => 'Next Posts'
                           ) );
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