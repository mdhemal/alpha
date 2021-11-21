<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part('template-parts/common/hero'); ?>
<div class="posts">
    <?php if(!have_posts()) {?>
        <h1 class="text-center"><?php _e('No Search Result Found'); ?></h1>
    <?php }
    else {?>
        <h2 class="text-center">Search Result For: <?php echo get_search_query(); ?></h2>
        <?php while(have_posts()) {
            the_post();
            get_template_part('post-formats/content', get_post_format());
            }
        } ?>
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

<?php get_footer(); ?>