<?php
add_action( 'cmb2_init', 'alpha_image_information' );
function alpha_image_information() {

	$prefix = '_alpha_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'image_information',
		'title'        => __( 'Image Information', 'alpha' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Camera Model', 'alpha' ),
		'id' => $prefix . 'camera_model',
		'type' => 'text',
		'default' => 'canon',
	) );

	$cmb->add_field( array(
		'name' => __( 'Information', 'alpha' ),
		'id' => $prefix . 'information',
		'type' => 'textarea',
	) );

	$cmb->add_field( array(
		'name' => __( 'Date', 'alpha' ),
		'id' => $prefix . 'date',
		'type' => 'text_date_timestamp',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licenced', 'alpha' ),
		'id' => $prefix . 'licenced',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licence Information', 'alpha' ),
		'id' => $prefix . 'licence_information',
		'type' => 'textarea',
		'attributes' => array(
			'data-conditional-id' =>$prefix . 'licenced',
			// Works too: 'data-conditional-value' => 'on'.
		),
	) );

}