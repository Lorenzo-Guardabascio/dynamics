<?php
/**
 * Template Name: Board
 * Template Post Type: page
 *
 * @package page child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>
<?php
	// understrap_print_post_main(); 
	?>
<header class="entry-header case">
	<div class="case-bg" style="background-image:url(<?php echo get_option('wisho_op_theme_header_background_sub_page') ?>)">
		<div <?php post_class( esc_attr( $container )); ?>  id="content" tabindex="-1">
			<h1 class="entry-title ">
				<?php echo get_the_title( $post->post_parent ); ?>
			</h1>
			<h2 class="entry-sub-title"><?php echo htmlspecialchars_decode(get_post_meta( $post->post_parent, '_understrap_show_in_page_sub_title', true ))?></h2>
		</div>
	</div>
	<?php get_breadcrumb() ?>
</header><!-- .entry-header -->

<div class="wrapper page-board" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">


		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
			<main class="site-main" id="main">
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-templates/content', 'page-child' ); ?>
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>