<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
<?php else : ?>
	<div class="col-4 col-md-3 rt-bar" id="right-sidebar" role="complementary">
<?php endif; ?>
<div class=" collapser-aside d-block d-lg-none text-right"> 
    <button data-toggle="collapse" data-target="#custom_bar_navigation" class="ml-auto navbar-toggler "><span class="navbar-toggler-icon"></span></button>
</div>
<div  id="custom_bar_navigation" class="collapse custom_bar_navigation w-100 mt-0">
<?php dynamic_sidebar( 'right-sidebar-ondem-a' ); ?>
</div>

</div><!-- #right-sidebar -->
