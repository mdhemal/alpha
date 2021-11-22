<?php 
/**
 * Template Name: Custom Query Or Relation
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
                    $total_posts = 5;
                    // $post_ids = array(11, 12, 15, 140, 16);
                    $query = new Wp_Query( array(
                        'posts_per_page' => $posts_per_page,
                        'paged' => $paged,
                        'tax_query' => array(
                            'relation' => 'OR',
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => array( 'new' ),
                            ),
                            array(
                                'taxonomy' => 'post_tag',
                                'field'    => 'slug',
                                'terms'    => array( 'learn' ),
                            ),
                        )
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