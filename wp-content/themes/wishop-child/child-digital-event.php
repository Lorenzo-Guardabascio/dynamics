<?php
/**
 * Template Name: Digital event
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
			<h1 class="entry-title ">
				<?php echo get_the_title( $post->post_parent ); ?>
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

					<?php /* Start the Loop */ ?>
					<?php if ( !is_user_logged_in() ) {
            echo '<h2 class="text-center no-acces">Per accedere a questi contenuti devi essere registrato al sito ed esserti connesso con i tuoi dati di accesso
           				<br> <a class="cursor-grabbing archive-links" data-toggle="modal" data-target="#account">Accedi o registrati adesso ></a></h2>';
       		 }else{?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'loop-templates/content', 'page-child' ); ?>
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>
					<?php $wcatTerms = get_terms('digital_categories', array('hide_empty' => 0)); 
						foreach($wcatTerms as $wcatTerm) : 
						?>

							<?php 
						/* Fine loop categorie */
								if(!$id){
									$id = get_the_ID();
								}

								$category = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_category_in_page', true ));
								$tag = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_tag_in_page', true ));

								$args = array(
									'post_type' => 'digital_event',
									$wcatTerm->taxonomy=> [$wcatTerm->slug] ,
									 'orderby' => 'menu_order',
									'order' => 'ASC',
									'posts_per_page'=>-1,
								);
								$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

								$child_query = new WP_Query( $args );
								$temp_query = $wp_query;
								$wp_query   = NULL;
								$wp_query   = $child_query;
								?>
								<?php $custo_tag = get_term_by('slug', $tag, 'digital_categories'); ?>
								<h3 class="red-terms font-weight-bold" style="margin-bottom:2rem; margin-top:2rem;  text-transform: uppercase;"><?php echo $wcatTerm->name?></h3>
										<?php
										while ( $child_query->have_posts() ) : $child_query->the_post();
											get_template_part( 'loop-templates/content', 'event' );
											echo '<br>';
										endwhile; 
										if( !($child_query->have_posts())){
												echo '<h1 class="text-center" >Contenuti prossimamente disponibili </h1>';
										}

										?>

							<?php 
							echo '<hr>';
						endforeach; 
						//End foreach category
						?>

			
					<?php } ?>
			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer();
