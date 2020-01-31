<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rabin_Resume_Vcard
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<span class="toggle-button">
     <div class="menu-bar menu-bar-top"></div>
     <div class="menu-bar menu-bar-middle"></div>
     <div class="menu-bar menu-bar-bottom"></div>
</span>
<div class="menu-wrap widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
