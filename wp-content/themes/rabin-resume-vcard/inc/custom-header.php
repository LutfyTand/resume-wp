<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Rabin_Resume_Vcard
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses rabin_resume_vcard_header_style()
 */
function rabin_resume_vcard_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'rabin_resume_vcard_custom_header_args', array(
			'default-image' => get_template_directory_uri() . '/assets/img/header-img.jpg',
			'width'         => 490,
			'height'        => 235,
			'flex-height'   => false,
			'header-text'   => false,
	) ) );
	
	register_default_headers( array(
		'default-image' => array(
		'url' => '%s/assets/img/header-img.jpg',
		'thumbnail_url' => '%s/assets/img/header-img.jpg',
		'description' => esc_html__( 'Default Header Image', 'rabin-resume-vcard' ),
		),
	));
}
add_action( 'after_setup_theme', 'rabin_resume_vcard_custom_header_setup' );

if ( ! function_exists( 'rabin_resume_vcard_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see rabin_resume_vcard_custom_header_setup().
	 */
	function rabin_resume_vcard_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
