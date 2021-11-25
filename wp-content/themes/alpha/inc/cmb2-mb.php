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
	$cmb->add_field( array(
		'name' => __( 'Image', 'cmb2' ),
		'id' => $prefix . 'image',
		'type' => 'file',
	) );

	$cmb->add_field( array(
		'name' => __( 'File', 'cmb2' ),
		'id' => $prefix . 'file_upload',
		'type' => 'file',
		'options' => array(
	        'url' => false, // Hide the text input for the url
	    ),
	    'text'    => array(
	        'add_upload_file_text' => 'Upload' // Change upload button text. Default: "Add or Upload File"
	    ),
	) );
}



add_action( 'cmb2_init', 'cmb2_add_pricing_table' );
function cmb2_add_pricing_table() {

	$prefix = '_alpha_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'pricing_table',
		'title'        => __( 'Pricing Table', 'alpha' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );
 	$group = $cmb->add_field( array(
        'name' => __( 'Pricing Table', 'alpha' ),
        'id'   => $prefix . 'pricing_table_group',
        'type' => 'group',
    ) );


	$cmb->add_group_field($group, array(
		'name' => __( 'Pricing Title', 'alpha' ),
		'id' => $prefix . 'pricing_title',
		'type' => 'text',
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Pricing Fields', 'alpha' ),
		'id' => $prefix . 'pricing_fields',
		'type' => 'text',
		'repeatable' => true
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Pricing Value', 'alpha' ),
		'id' => $prefix . 'pricing_value',
		'type' => 'text',
	) );

}