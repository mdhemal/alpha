<?php

define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance

function alpha_attachments_slider($attachments) {
	  $fields         = array(
	    array(
	      'name'      => 'slide_title',                         // unique field name
	      'type'      => 'text',                          // registered field type
	      'label'     => __( 'Title', 'attachments' ),    // label to display
	      'default'   => 'title',                         // default value upon selection
	    )
	  );
	 $args = array(
    'label'         => 'Slider',
    'post_type'     => array( 'post'),
    'priority'      => 'high',
    'button_text'   => __( 'Slider Button', 'attachments' ),
    'fields'        => $fields,
  );
 $attachments->register( 'slide', $args ); // unique instance name
}
add_action( 'attachments_register', 'alpha_attachments_slider' );



function alpha_testimonial_slider($attachments) {
	$fields         = array(
	    array(
	      'name'      => 'slide_testimonial_name',                         // unique field name
	      'type'      => 'text',                          // registered field type
	      'label'     => __( 'Name', 'attachments' ),    // label to display
	      'default'   => 'John Doe',                         // default value upon selection
	    ),
	    array(
	      'name'      => 'slide_testimonial_email',                         // unique field name
	      'type'      => 'text',                          // registered field type
	      'label'     => __( 'Email', 'attachments' ),    // label to display
	      'default'   => 'john@doe.com',                         // default value upon selection
	    ),
	     array(
	      'name'      => 'slide_testimonial_position',                         // unique field name
	      'type'      => 'text',                          // registered field type
	      'label'     => __( 'Position', 'attachments' ),    // label to display
	      'default'   => 'CEO',                         // default value upon selection
	    ),
	    array(
	      'name'      => 'slide_testimonial_content',                         // unique field name
	      'type'      => 'textarea',                          // registered field type
	      'label'     => __( 'Testimonial Content', 'attachments' ),    // label to display
	    ),
	);
	$args = array(
	    'label'         => 'Testimonial',
	    'post_type'     => array( 'page'),
	    'priority'      => 'high',
	    'button_text'   => __( 'Attach Button', 'attachments' ),
	    'fields'        => $fields,
	  );
	  $attachments->register( 'testimonial_slide', $args ); // unique instance name
}
add_action( 'attachments_register', 'alpha_testimonial_slider' );



function alpha_team_slider($attachments) {
	$fields         = array(
	    array(
	      'name'      => 'slide_team_name',                         // unique field name
	      'type'      => 'text',                          // registered field type
	      'label'     => __( 'Name', 'attachments' ),    // label to display
	      'default'   => 'John Doe',                         // default value upon selection
	    ),
	    array(
	      'name'      => 'slide_team_email',                         // unique field name
	      'type'      => 'text',                          // registered field type
	      'label'     => __( 'Email', 'attachments' ),    // label to display
	      'default'   => 'john@doe.com',                         // default value upon selection
	    ),
	     array(
	      'name'      => 'slide_team_position',                         // unique field name
	      'type'      => 'text',                          // registered field type
	      'label'     => __( 'Position', 'attachments' ),    // label to display
	      'default'   => 'CEO',                         // default value upon selection
	    ),
	    array(
	      'name'      => 'slide_team_content',                         // unique field name
	      'type'      => 'textarea',                          // registered field type
	      'label'     => __( 'team Content', 'attachments' ),    // label to display
	    ),
	);

	$args = array(
	    'label'         => 'Team',
	    'post_type'     => array( 'page'),
	    'priority'      => 'high',
	    'button_text'   => __( 'Attach Team', 'attachments' ),
	    'fields'        => $fields,
	  );
	  $attachments->register( 'team_slide', $args ); // unique instance name
}
add_action( 'attachments_register', 'alpha_team_slider' );