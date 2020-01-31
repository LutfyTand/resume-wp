<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Rabin_Resume_Vcard
 */

get_header();
?>
<div class="bb-custom-side">
    <div class="bb-custom-side-inner">
        <div class="bb-custom-side-content">

            <!-- Pricing -->
            <div id="home-page-article" class="section-block">
                <div class="clearfix"></div>
                <?php
                if ( have_posts() ){
                    /* Start the Loop */
                    while ( have_posts() ){
                        the_post();
                        get_template_part( 'template-parts/content', 'search' );
                    }
                    the_posts_pagination();
                }else{
                    get_template_part( 'template-parts/content', 'none' );
                }
                ?>
            </div>
            <!-- Pricing end -->

        </div>
    </div>
</div>

</div>
<!-- Home end -->

<?php
get_footer();
