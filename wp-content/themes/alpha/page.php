<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part('template-parts/about-page/hero-page'); ?>
    <div class="col-xl-10 offset-md-1">
        <div class="posts">
            <?php
            while(have_posts()) {
                the_post();?>
                 <div class="post"<?php echo post_class(); ?>>
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-10  text-center mb-100">
                            <h2 class="post-title"><?php echo get_the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="row justify-content-center  text-center">
                        <div class="col-md-10">
                            <p>
                                <strong><?php echo get_the_author(); ?></strong><br/>
                                <?php echo get_the_date(); ?>
                            </p>
                            <?php echo get_the_tag_list('<ul class="list-unstyled inline"><li>', '</li><li>','</li></ul>'); ?>
                        </div>
                        <div class="col-md-10">
                            <?php the_content(); ?>
                        </div>
                    </div>

                </div>
            </div>
            <?php }
            ?>
        </div>
    </div>
<?php get_footer(); ?>
</body>
</html>