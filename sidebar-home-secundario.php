<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Villber
 */

if ( ! is_active_sidebar( 'home-secundario' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
    	<?php dynamic_sidebar( 'home-secundario' ); ?>
</aside><!-- #secondary -->
