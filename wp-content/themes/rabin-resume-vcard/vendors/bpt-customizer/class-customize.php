<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class rabin_resume_vcard_theme_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		locate_template( 'vendors/bpt-customizer/section-pro.php', TRUE, TRUE );

		// theme option.
		require locate_template('vendors/bpt-customizer/theme-option.php');

		// Register custom section types.
		$manager->register_section_type( 'rabin_resume_vcard_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new rabin_resume_vcard_Customize_Section_Pro(
				$manager,
				'bpt-type',
				array(
					'title'    => esc_html__( 'Rabin Resume Vcard Pro', 'rabin-resume-vcard' ),
					'pro_text' => esc_html__( 'Go Pro',         'rabin-resume-vcard' ),
					'pro_url'  => 'https://www.buyprotheme.com/product/rabin-resume-vcard/',
			 		'priority' => 1,
				)
			)
		);

		//select sanitization function
		function slug_sanitize_select( $input, $setting ) {
			$input = sanitize_key( $input );
			$choices = $setting->manager->get_control( $setting->id )->choices;
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
		function sanitize_checkbox( $checked ) {
			// Boolean check.
			return ( ( isset( $checked ) && true == $checked ) ? true : false );
		}
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'rabin-resume-vcard-customize-controls', trailingslashit( get_template_directory_uri() ) . 'vendors/bpt-customizer/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'rabin-resume-vcard-customize-controls', trailingslashit( get_template_directory_uri() ) . 'vendors/bpt-customizer/customize-controls.css' );
	}
}

// Doing this customizer thang!
rabin_resume_vcard_theme_Customize::get_instance();
