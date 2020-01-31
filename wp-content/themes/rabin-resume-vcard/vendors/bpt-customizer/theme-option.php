<?php 

/**
* Theme Options Panel.
*
* @package Rabin_Resume_Vcard
*/


// Add Theme Options Panel.
$manager->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'rabin-resume-vcard' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
	)
);

/*
 #Header Section
*/
$manager->add_section( 'bpt_social',array(
	'title'      => esc_html__( 'Social', 'rabin-resume-vcard' ),
	'priority'   => 120,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
));
	$manager->add_setting('fb_link', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('fb_link', array(
		'label'      => esc_html__( 'Facebook', 'rabin-resume-vcard' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('tw_link', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('tw_link', array(
		'label'      => esc_html__( 'Twitter', 'rabin-resume-vcard' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('google_plus', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('google_plus', array(
		'label'      => esc_html__( 'Google Plus', 'rabin-resume-vcard' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('linkedin', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('linkedin', array(
		'label'      => esc_html__( 'Linkedin', 'rabin-resume-vcard' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('youtube', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('youtube', array(
		'label'      => esc_html__( 'Youtube', 'rabin-resume-vcard' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('instagram', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('instagram', array(
		'label'      => esc_html__( 'Instagram', 'rabin-resume-vcard' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));

