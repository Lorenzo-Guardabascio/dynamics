<?php
/**
 * Template Name: Pagina master- area
 * Template Post Type: page
 *
 * @package page child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$post_link_cats = get_the_terms( $post->ID , 'categories_1' );

if($post_link_cats){
	foreach ($post_link_cats as $post_cat) {
	$post_link_cat = $post_cat->slug;
	}
}
$parent_id =  get_page_by_path( $post_link_cat )->ID;
?>
<header class="entry-header case">
	<div class="case-bg" style="background-image:url(<?php echo get_option('wisho_op_theme_header_background_sub_page') ?>)">
		<div <?php post_class( esc_attr( $container )); ?>  id="content" tabindex="-1">
			<h1 class="entry-title ">
				<?php 
				echo get_the_title( $post->post_parent );?>
			</h1>
			<h2 class="entry-sub-title"><?php echo htmlspecialchars_decode(get_post_meta( $post->post_parent, '_understrap_show_in_page_sub_title', true ))?></h2>
		</div>
	</div>
	<?php get_breadcrumb() ;

	
	?>
</header><!-- .entry-header -->
<div class="<?php echo esc_attr( $container ); ?>" >
		<div class="row aside-section">
			<div class="col p-0">
<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single-tematic_area' ); ?>

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

	</div><!-- #content -->

</div><!-- #single-wrapper -->

</div>
<?php
			dynamics_page_bar();
			?>
		</div>
	</div>
<?php get_footer(); ?>