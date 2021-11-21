<?php get_header(); ?>

<body <?php body_class(array("first-class", "second-class", "third-class")); ?>>
<?php get_template_part('template-parts/common/hero'); ?>
<div class="post-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 tag-space">
                <!-- author information -->
                <div class="author-info">
                    <div class="container">
                        <div class="author-box">
                            <div class="row">
                                <div class="col-md-2">
                                    <?php echo get_avatar(get_the_author_meta('id')); ?>
                                </div>
                                <div class="col-md-10">
                                    <h2><?php echo get_the_author_meta('display_name'); ?></h2>
                                    <p><?php echo get_the_author_meta('description'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="posts">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
</body>
</html>