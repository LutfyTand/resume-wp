<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rabin_Resume_Vcard
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>
<a class="skip-link screen-reader-text" href="#book-1"><?php _e( 'Skip to content', 'rabin-resume-vcard' ); ?></a>

<?php get_sidebar();?>
<!-- Loader -->
<div class="loader-wrapper">
    <div class="loader"></div>
</div>

<!-- Site Navigation -->
<nav class="site-nav">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'menu-1',
        'menu_id'        => 'main-nav',
        'container' => false,
    ) );
    ?>
</nav>
<!-- Site Navigation end -->

<!-- Big Book -->
<div class="bb-bigbook-wrapper">
        <div class="bb-bigbook" id="book-1">
            <div class="bb-bookblock">
            	<div class="bb-item">

    <div class="bb-custom-side left-page">
        <div class="bb-custom-side-inner">
            <div class="bb-custom-side-content" style="padding: 0;">

                <!-- Home -->
                <div id="home" class="section-block home-page" style="padding: 0;">
                    <div class="profile-page">
                    	<?php $header_image = get_header_image();?>
                        <div class="page-header header-filter" data-parallax="true" style="background-image:url('<?php echo esc_url($header_image);?>');"></div>
                        <div class="main main-raised">
                            <div class="profile-content">
                                <div class="col-md-12 ml-auto mr-auto">
                                    <div class="myprofile">
                                        <div class="avatar">
											<?php 
												if (has_custom_logo()) {
													the_custom_logo();
												}
											?>
                                        </div>
                                        <div class="name">
											<h1 class='site-title wp-title'><?php bloginfo( 'name' ) ?></h1>
											<?php
												$description = get_bloginfo( 'description' );
												if ( $description ) {
													echo  '<p class="site-description">' . esc_html( $description ) . '</p>' ;
												}
											?>
                                            <!-- Card footer -->
                                            <div class="card-footer">
                                                <nav class="card-nav">
                                                    <ul>
                                                        <?php if(get_theme_mod('fb_link')!=''){?>
                                                            <li><a href="<?php echo esc_url(get_theme_mod('fb_link'));?>" target="_blank"><span class="icon fa fa-facebook"></span></a></li>
                                                        <?php }?>
                                                        <?php if(get_theme_mod('tw_link')!=''){?>
                                                            <li><a href="<?php echo esc_url(get_theme_mod('tw_link'));?>" target="_blank"><span class="icon fa fa-twitter"></span></a></li>
                                                        <?php }?>
                                                        <?php if(get_theme_mod('google_plus')!=''){?>
                                                            <li><a href="<?php echo esc_url(get_theme_mod('google_plus'));?>" target="_blank"><span class="icon fa fa-google-plus"></span></a></li>
                                                        <?php }?>
                                                        <?php if(get_theme_mod('linkedin')!=''){?>
                                                            <li><a href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><span class="icon fa fa-linkedin"></span></a></li>
                                                        <?php }?>
                                                        <?php if(get_theme_mod('youtube')!=''){?>
                                                            <li><a href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><span class="icon fa fa-youtube"></span></a></li>
                                                        <?php }?>
                                                        <?php if(get_theme_mod('instagram')!=''){?>
                                                            <li><a href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><span class="icon fa fa-instagram"></span></a></li>
                                                        <?php }?>
                                                    </ul>
                                                </nav>
                                            </div>

											<div class="site-info">
												<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rabin-resume-vcard' ) ); ?>">
													<?php
													/* translators: %s: CMS name, i.e. WordPress. */
													printf( esc_html__( 'Proudly powered by %s', 'rabin-resume-vcard' ), 'WordPress' );
													?>
												</a>
												<span class="sep"> | </span>
													<?php
													/* translators: 1: Theme name, 2: Theme author. */
													printf( esc_html__( 'Theme: %1$s by %2$s.', 'rabin-resume-vcard' ), 'Rabin Resume Vcard', '<a href="'.esc_url('https://www.buyprotheme.com').'">BuyProTheme</a>' );
													?>
											</div><!-- .site-info -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Home end -->
            </div>
        </div>
    </div>