<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part('template-parts/common/hero'); ?>
<div class="post-wrap">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="posts">
                    <?php
                    while(have_posts()) {
                        the_post();?>
                         <div class="post"<?php echo post_class(); ?>>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-10  text-center">
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
                                    <p>
                                        <?php
                                        if(has_post_thumbnail()) {
                                            $thumbnail_url = get_the_post_thumbnail_url(null, 'large');
                                            printf('<a href=#" class="popup" data-featherlight="%s">', $thumbnail_url);
                                            the_post_thumbnail('large', "class='img-fluid'");
                                            echo "</a>";
                                        }
                                        ?>
                                    </p>
                                    <?php
                                        if(is_single()) {
                                            the_content();
                                        } else {
                                         the_excerpt();
                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php }
                    ?>
                    <div class="post-links">
                        <div class="container">
                            <?php previous_post_link(); ?>
                            <?php next_post_link(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <?php
                if(is_active_sidebar('blog-sidebar')) {
                    dynamic_sidebar('blog-sidebar');
                }
                ?>
            </div>
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