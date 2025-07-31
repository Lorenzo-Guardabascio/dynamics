<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer class="site-footer" id="colophon">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="row">
			<?php
                    dynamic_sidebar( 'footer-column-1' );
                    dynamic_sidebar( 'footer-column-2' );
					dynamic_sidebar( 'footer-column-3' );
                    ?>
		</div><!-- row-end -->
		<div class="site-info d-none">
			<?php understrap_site_info(); ?>
		</div><!-- .site-info -->
	</div><!-- container end -->
</footer><!-- #colophon -->

</div><!-- #page we need this extra closing tag here -->
<?php modal_cont(); ?>
<?php modal_reg(); ?>

<?php wp_footer(); ?>

</body>

</html>
