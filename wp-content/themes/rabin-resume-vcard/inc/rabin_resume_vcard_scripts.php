<?php
function rabin_resume_vcard_scripts() {
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style( 'rabin-resume-vcard-google-fonts', 'https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i' );
	wp_enqueue_style( 'Bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, $version, 'all');
	wp_enqueue_style( 'rabin-resume-vcard-bookblock', get_template_directory_uri() . '/assets/css/bookblock.css', false, $version, 'all');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', false, $version, 'all');
	wp_enqueue_style( 'rabin-resume-vcard-theme-style', get_template_directory_uri() . '/assets/css/rabin-resume-vcard-style.css', false, $version, 'all');
	wp_enqueue_style( 'rabin-resume-vcard', get_stylesheet_uri() );
	// js
	wp_enqueue_script( 'rabin-resume-vcard-modernizr', get_template_directory_uri().'/assets/js/modernizr.custom.js', array(), $version, false );
	wp_enqueue_script( 'rabin-resume-vcard-isotope', get_template_directory_uri().'/assets/js/isotope.pkgd.js', array('jquery'), $version, true );
	wp_enqueue_script( 'rabin-resume-vcard-slimscroll', get_template_directory_uri().'/assets/js/jquery.slimscroll.js', array(), $version, true );
	wp_enqueue_script( 'rabin-resume-vcard-localScroll', get_template_directory_uri().'/assets/js/jquery.localScroll.js', array(), $version, true );
	wp_enqueue_script( 'rabin-resume-vcard-bookblock', get_template_directory_uri().'/assets/js/jquery.bookblock.js', array(), $version, true );
	wp_enqueue_script( 'rabin-resume-vcard-theme-scripts', get_template_directory_uri().'/assets/js/rabin-resume-vcard-scripts.js', array(), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rabin_resume_vcard_scripts' );

/**
 * Menu Icon.
 *
 */
function rabin_resume_vcard_icon_stylesheet() {
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
    wp_enqueue_style( 'fontawesome');
}
add_action( 'wp_enqueue_scripts', 'rabin_resume_vcard_icon_stylesheet' );