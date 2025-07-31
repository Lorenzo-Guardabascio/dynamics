<?php
/**
 * Template Name: Event booking rep
 * Template Post Type: page
 *
 * @package page child
 */
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<header class="entry-header case">
<div class="case-bg" style="background-image:url(<?php echo get_option('wisho_op_theme_header_background_sub_page') ?>)">
		<div <?php post_class( esc_attr( $container )); ?>  id="content" tabindex="-1">
			<h1 class="entry-title"> 30 MINUTI CON</h1>
			<h2 class="entry-sub-title"></h2>
		</div>
	</div>
	<?php get_breadcrumb() ?>
</header><!-- .entry-header -->

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row aside-section">

			<!-- Do the left sidebar check -->

			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>
					<header class="page-header">
					<h1 class="page-title mt-3 mb-3 d-none">30 minuti con</h1>
						<?php
						//the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
						<div class="taxonomy-description intro">In questa sezione puoi rivedere le registrazioni dei 30 MINUTI CON già realizzati e ascoltare le risposte degli Esperti di Dynamics alle domande che gli sono state poste su varie tematiche di interesse comune.</div>

					</header><!-- .page-header -->
					<br>			
					<?php /* Start the Loop */
					if ( is_user_logged_in()){
						$page_areas= explode(',',get_option('wisho_op_theme_option_home_areas'));
						$args = array(
							'post_type' => 'event_booking',
							'orderby' => 'date',
							'order' => 'DESC'
							
						);

						$child_query = new WP_Query( $args );
					 ?>
					<?php while ( $child_query->have_posts() ) : $child_query->the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
							
								get_template_part( 'loop-templates/content', 'event_booking_ended' );
						?>

					<?php endwhile; ?>
					<p class="mt-5"></p>
					<?php
					}else{
						echo '<h2 class="text-center no-acces">Per accedere a questi contenuti devi essere registrato al sito ed esserti connesso con i tuoi dati di accesso
				   <br> <a class="cursor-grabbing archive-links" data-toggle="modal" data-target="#account" >Accedi o registrati adesso ></a></h2></h2>';
					}
					 ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
			
			<?php get_template_part( 'sidebar-templates/sidebar', 'right-event-rep' ); ?>
		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer();
