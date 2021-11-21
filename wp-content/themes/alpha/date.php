<?php get_header(); ?>

<body <?php body_class(array("first-class", "second-class", "third-class")); ?>>
<?php get_template_part('template-parts/common/hero'); ?>
<div class="post-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center tag-space">
                <h3>Posts In: 
                    <?php
                        if(is_month()) {
                            $month = esc_html(get_query_var('monthnum'));
                            $dateobj = DateTime::createFromFormat('!m', $month);
                            echo $dateobj->format("F");
                        } else if(is_year()) {
                            echo esc_html(get_query_var('year'));
                        } else if(is_day()) {
                            // echo get_query_var('day'),"/".get_query_var("monthnum")."/".get_query_var('year');
                            $day =  esc_html(get_query_var('day'));
                            $month =  esc_html( get_query_var('monthnum'));
                            $year = esc_html(get_query_var('year'));
                            printf("%s/%s/%s",$day,$month, $year);
                        }
                    ?>
                </h3>
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