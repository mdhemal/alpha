<?php get_header(); ?>

<body <?php body_class(array("first-class", "second-class", "third-class")); ?>>
<?php get_template_part('template-parts/common/hero'); ?>
<div class="post-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center tag-space">
                <h3>Category Name: <?php single_cat_title(); ?></h3>
                <div class="posts">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            </div>
        </div>
    </div>
</div>
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
<?php get_footer(); ?>
</body>
</html>