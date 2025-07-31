<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
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

		<div class="row">

			<!-- Do the left sidebar check -->

			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>
					<header class="page-header d-none">
					<h1 class="page-title mt-3 mb-3">30 minuti con</h1>
						<?php
						//the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
						<div class="taxonomy-description">Gli Esperti di Dynamics a vostra disposizione «live» ogni mese per 30 minuti per discutere di una tematica di interesse comune.
<br> Prenota la tua partecipazione e invia le tue domande.</div>

					</header><!-- .page-header -->
	
					<br>			
					<div class="d-none">
					<?php /* Start the Loop */
					if ( is_user_logged_in()){
					 ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
							
								get_template_part( 'loop-templates/content', 'event_booking' );
						?>

					<?php endwhile; ?>
					</div>
					<p class="mt-5"></p>
					<header class="page-header">
					<h1 class="page-title mt-3 mb-3">30 minuti con... Replay</h1>
						<?php
						//the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>

					</header><!-- .page-header -->

					<br>
					<?php 
					 while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
							
								get_template_part( 'loop-templates/content', 'event_booking_ended' );
						?>

					<?php endwhile;
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

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer();
