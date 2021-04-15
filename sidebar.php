<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Saiful
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-lg-4">
	<?php dynamic_sidebar( 'sidebar-main' ); ?>
</aside><!-- #secondary -->