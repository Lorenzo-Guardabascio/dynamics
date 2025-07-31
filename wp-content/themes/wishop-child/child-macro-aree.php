<?php
/**
 * Template Name: Macro aree
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
		<div <?php post_class( esc_attr( $container )); ?> id="content" tabindex="-1">
			<?php the_title( '<h1 class="entry-title ">', '</h1>' ); ?>
			<h2 class="entry-sub-title">
				<?php echo htmlspecialchars_decode(get_post_meta( $post->ID, '_understrap_show_in_page_sub_title', true ))?>
			</h2>
		</div>
	</div>
	<?php get_breadcrumb() ?>
</header><!-- .entry-header -->
<div class="<?php echo esc_attr( $container ); ?>" >
		<div class="row aside-section">
			<div class="col p-0">
				<div class="wrapper page-standard" id="page-wrapper">
					<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">


						<div class="row">

							<!-- Do the left sidebar check -->
							<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
							<main class="site-main" id="main">
								<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'loop-templates/content', 'page-case' ); ?>
								<?php
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
									?>

								<?php endwhile; // end of the loop. ?>
							</main><!-- #main -->


						</div><!-- Container end -->
							<?php
							$args = array(
								'post_parent' => $post->ID,
								'post_type' => 'page',
								'posts_per_page' => -1,
								'query_label'    => 'ignore_zero_query',
								'orderby' => 'menu_order',
								'order' => 'ASC'
							);
							$child_query = new WP_Query( $args );
								//get_template_part( 'loop-templates/content', 'aree-loop' );
							?>
														<!--Start videolezioni e casi clinici -->
							<div class="  container-new-layout" id="content" tabindex="-1">
								
								<div class="new-section-layout" alt="">
									<div class="<?php echo esc_attr( $container ); ?>">


										<div class="row ">
											<div class="col-12">
												<div class="container">
													<div class="row new-article-last-pub">
														<div class="col-12">
															<h2 class="last-sect page-title">Pubblicazioni</h2>
														</div>
													</div>

													
												</div>
											</div>

											<div class="col-12">
												<div class="container">
													<div class="row new-article-last-pub casi-clinici">

													<?php	
													$cnt = 1;
													while ( $child_query->have_posts() ) : $child_query->the_post();
													
															$declaration = new stdClass();
															$id_title = get_the_ID();
															//if(!$id){
																$id = get_the_ID();
																
															//}
															
															$category = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_category_in_page', true ));
															$tag = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_tag_in_page', true )); 
															
															$declaration->id_title =$id_title;
															$declaration->category =$category;
															$declaration->tag =$tag;
															$declaration->cnt = $cnt;
															
															
															$args = array(
																'post_type' => 'tematic_area',
																'categories_1'=> [$category] ,
																'order' => 'DESC',
																'posts_per_page'=>1,
																'topics'=> [$tag],
															);
															$single_query = new WP_Query( $args );
															
															?>
															<?php
															
																	while ( $single_query->have_posts() ) : $single_query->the_post();
																	
																	$category_update = get_option('wisho_op_theme_option_last_pub_update');
																	$category_slidekit = get_option('wisho_op_theme_option_last_pub_slidekit'); 

																		if($tag == get_option('wisho_op_theme_option_last_pub_update') ){
																			//get_template_part( 'loop-templates/content', 'home-new-last-pub', $declaration );
																		}elseif($tag==get_option('wisho_op_theme_option_last_pub_slidekit') ){
																			//get_template_part( 'loop-templates/content', 'home-new-last-pub', $declaration );
																		}else{
																		get_template_part( 'loop-templates/content', 'home-new-last-pub', $declaration );
																		$cnt ++;
																		}
																	endwhile; 
																	if( !($single_query->have_posts())){
																		
																} 
																	?>


														<?php
															wp_reset_postdata();
															
														//}
														endwhile; ?>

														</div>					
													</div>
											</div>

											<div class="col custom-col-20">
												<div class="container">
													<div class="row ">
														
													</div>
													
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
										<!--end videolezioni e casi clinici -->

							<!-- Do the right sidebar check -->
							<?php get_template_part( 'global-templates/right-sidebar-check' );?>
					</div><!-- .row -->

				</div><!-- Wrapper end -->

			</div>
		<?php
			dynamics_page_bar();
			?>
		</div>
			

</div>

	<!--Start Approfondimenti e slidekit -->
	<div class="  container-new-layout" id="content" tabindex="-1">

		<div class="new-section-layout approfondimenti-slidekit mt-3" alt="">
			<div class="<?php echo esc_attr( $container ); ?>">

				<?php /*publicazioni Standard*/ ?>
				<div class="row ">
				<div class="col-12">
					<h2 class="last-section-section-title"></h2>
				</div>
				<div class="col custom-col-60">
					<div class="container">
						<div class="row approfondimenti new-article-last-pub">

							<?php	while ( $child_query->have_posts() ) : $child_query->the_post();

									$declaration = new stdClass();
									$id_title = get_the_ID();
									//if(!$id){
										$id = get_the_ID();
										
									//}
									
									$category = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_category_in_page', true ));
									$tag = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_tag_in_page', true )); 
									
									$declaration->id_title =$id_title;
									$declaration->category =$category;
									$declaration->tag =$tag;
									
									$args = array(
										'post_type' => 'tematic_area',
										'categories_1'=> [$category] ,
										'order' => 'DESC',
										'posts_per_page'=>1,
										'topics'=> [$tag],
									);
									$single_query = new WP_Query( $args );
									
									?>
									<?php
											while ( $single_query->have_posts() ) : $single_query->the_post();
											
											$category_update = get_option('wisho_op_theme_option_last_pub_update');
											$category_slidekit = get_option('wisho_op_theme_option_last_pub_slidekit');

												if($tag == get_option('wisho_op_theme_option_last_pub_update') ){
													$declaration = new stdClass();
													$declaration->section ='home';
													get_template_part( 'loop-templates/content', 'home-new-last-pub', $declaration );
												}
														
											endwhile; 
											if( !($single_query->have_posts())){
												
										} 
											?>


								<?php
									wp_reset_postdata();
									
								//}
								endwhile; ?>
							<?php

							//}

								?>
							<div class=" col-12">
								<?php $custo_tag = get_option('wisho_op_theme_option_last_pub_update'); ?>
								<a class="archive-links" href="<?php echo get_option('wisho_op_theme_option_last_pub_update'); ?>">
									<?php _e('TUTTI GLI APPROFONDIMENTI ', 'understrap-child' ) ?> >
								</a>
							</div>
						</div>
						
					</div>

				</div>

				<div class="col custom-col-40">
					<div class="container">
		
						<div class="new-article-last-pub slidekit center">
						<div class="row ">

							<?php	while ( $child_query->have_posts() ) : $child_query->the_post();

							$declaration = new stdClass();
							$id_title = get_the_ID();
							//if(!$id){
								$id = get_the_ID();
								
							//}
							
							$category = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_category_in_page', true ));
							$tag = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_tag_in_page', true )); 
							
							$declaration->id_title =$id_title;
							$declaration->category =$category;
							$declaration->tag =$tag;
							
							$args = array(
								'post_type' => 'tematic_area',
								'categories_1'=> [$category] ,
								'order' => 'DESC',
								'posts_per_page'=>1,
								'topics'=> [$tag],
							);
							$single_query = new WP_Query( $args );
							
							?>
							<?php
									while ( $single_query->have_posts() ) : $single_query->the_post();
									
									$category_update = get_option('wisho_op_theme_option_last_pub_update');
									$category_slidekit = get_option('wisho_op_theme_option_last_pub_slidekit');

										if($tag == get_option('wisho_op_theme_option_last_pub_slidekit') ){
											get_template_part( 'loop-templates/content', 'home-new-last-pub' );
										}
												
									endwhile; 
									if( !($single_query->have_posts())){
								} 
									?>


						<?php
							wp_reset_postdata();
							
						//}
						endwhile; ?>
					<?php

								?>
						</div>				
						</div>				
						<div class="row slidekit new-article-last-pub" style="min-height: unset;">
							<div class=" col-12">
								<?php $custo_tag = get_term_by('slug', $category_slidekit, 'topics'); ?>
								<a class="archive-links" href="<?php echo get_option('wisho_op_theme_option_last_pub_slidekit'); ?>">
								<?php _e('TUTTE GLI SLIDEKIT', 'understrap-child' ) ?> >
								</a>
							</div>
						</div>				
					</div>
				</div>

				</div>

			</div>
		</div>
	</div>
	<!--end Approfondimenti e slidekit -->
	<?php
		wp_reset_postdata();
		?>

<?php get_footer(); ?>