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
			<h1 class="entry-title ">
				<?php 
						$title_archive = str_replace("Tipologie: ","", get_the_archive_title());
						$title_archive = str_replace("Tag: ","", $title_archive);
					if($title_archive=="Update"){
						$title_archive= "Approfondimenti";
					}
					echo $title_archive;
				?>
			</h1>
			<h2 class="entry-sub-title"><?php echo htmlspecialchars_decode(get_post_meta( $post->post_parent, '_understrap_show_in_page_sub_title', true ))?></h2>
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

					<header class="page-header">
					<h1 class="page-title mt-3">
						<?php 
						$title_archive = str_replace("Tipologie: ","", get_the_archive_title());
						$title_archive = str_replace("Tag: ","", $title_archive);
							if($title_archive=="Update"){
								$title_archive= "Approfondimenti";
							}
							echo $title_archive;
							
						?>
						
						</h1>
						<?php
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
						<?php 
						if(get_queried_object()->slug == "podcast"){
							?>
							<style>
								.single_loop_post{
									display: flex;

								}
								.single_loop_post .entry-header .entry-title b{color:#961747; }
								.single_loop_post:before{
									content:"";
									display: block;
									aspect-ratio:1;
									width: 78px;
									height:78px;
									background-size: cover;
									background-image:url(<?php echo get_option('wisho_op_theme_d_e_img'); ?>);
									margin-right: 12px;
								}

							</style>
							<?php
						}elseif(get_queried_object()->slug == "slidekit"){
							?>

							<style>
								.single_loop_post{
									display: flex;
								}
								.single_loop_post:before{
									font-size: 50px;
									content: "\e906";
									color:#961747;
									font-family: dynamics;
									margin-right: 20px;
									margin-top: 20px;
								}

							</style>
							<?php
						}
						?>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

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
