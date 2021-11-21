<?php

/*
* Template Name: Testimonial Page
*/

get_header(); ?>
<body <?php body_class(array("first-class", "second-class", "third-class")); ?>>
<?php get_template_part('template-parts/common/hero'); ?>
<div class="post-wrap">
    <div class="container">
    	<div class="row">
    		<div class="col-xxl-12">
    			<?php
						  // retrieve all Attachments for the 'attachments' instance of post 123
						$attachments = new Attachments( 'testimonial_slide');
				?>
				<?php if( $attachments->exist() ) : ?>
    			<?php if (class_exists( 'Attachments' ) ) : ?>
				<h2 class="text-center">Testimonial</h2>
    			<div class="testimonial-wrapper" id="gallery-images">
					<?php while( $attachments->get() ) : ?>
						<div class="single-attachments">
							<div class="user-thumb">
								<?php echo $attachments->image( 'thumbnail-large' ); ?>
							</div>
							<div class="user-content">
								<h4 class="test-title"><?php echo esc_html($attachments->field( 'slide_testimonial_name' )); ?></h4>
								<p class="test-email"><?php echo esc_html($attachments->field( 'slide_testimonial_email' )); ?></p>
								<p class="test-pos"><?php echo esc_html($attachments->field( 'slide_testimonial_position' )); ?></p>
								<p class="test-content"><?php echo esc_html($attachments->field( 'slide_testimonial_content' )); ?></p>
							</div>
						</div>
					 <?php endwhile; ?>
    			</div>
	    		<?php endif; ?>
    		</div>
    		<?php endif; ?>
    	</div>
    	<div class="row">
    		<?php
			  // retrieve all Attachments for the 'attachments' instance of post 123
				$attachments = new Attachments( 'team_slide');
			?>
			<?php if( $attachments->exist() ) : ?>
    		<div class="col-xxl-12">
				<h2 class="text-center">Team Member</h2>
    			<div class="team-active">
	    				<?php while( $attachments->get() ) : ?>
	    					<div class="single-team">
	    						<div class="user-thumb">
									<?php echo $attachments->image( 'thumbnail-large' ); ?>
								</div>
								<div class="user-content">
									<h4 class="test-title"><?php echo esc_html($attachments->field( 'slide_team_name' )); ?></h4>
									<p class="test-email"><?php echo esc_html($attachments->field( 'slide_team_email' )); ?></p>
									<p class="test-pos"><?php echo esc_html($attachments->field( 'slide_team_position' )); ?></p>
									<p class="test-content"><?php echo esc_html($attachments->field( 'slide_team_content' )); ?></p>
								</div>
	    					</div>
	    				<?php endwhile; ?>
	    			</div>
    		</div>
    		<?php endif; ?>
    	</div>
        <div class="row">
            <div class="col-12">
                <div class="posts">
                    <?php
                    while(have_posts()) {
                        the_post();?>
                        <div class="single-author-link">
                            <?php the_author_posts_link(); ?>
                        </div>
                       <?php the_post_thumbnail(null,"large"); ?>
                    <?php }
                    ?>
                    <p><?php the_content(); ?></p>
                    <div class="pages-link">
                        <?php echo wp_link_pages(); ?>
                    </div>
                    <div class="post-links">
                        <div class="container">
                            <?php previous_post_link(); ?>
                            <?php next_post_link(); ?>
                        </div>
                    </div>
                </div>
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