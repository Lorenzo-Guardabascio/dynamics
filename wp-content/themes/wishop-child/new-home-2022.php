<?php
/**
 * Template Name: New Home 2022
 * Template Post Type: page
 *
 * @package page child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$videolezioni_link= get_option('wisho_op_theme_videolezioni_link');
$casi_clinici_link= get_option('wisho_op_theme_casi_clinici_link');
$approfondimenti_link= get_option('wisho_op_theme_approfondimenti_link');
$slidekit_link= get_option('wisho_op_theme_slidekit_link');
$podcast_link= get_option('wisho_op_theme_podcast_link');
$webinar_link= get_option('wisho_op_theme_webinar_link');
?>
<?php
	 understrap_print_post_main(); 
	?>
<div class="slider">
	<?php
            echo do_shortcode(get_post_meta( get_the_ID(), '_understrap_show_in_homepage_slider_shortcode', true ));
          ?>


</div>
<div class="home-page wrapper page-standard" id="page-wrapper">
<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

	<div class="row">

		<!-- Do the left sidebar check -->
		<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
		<main class="site-main" id="main">
			<?php while ( have_posts() ) : the_post(); ?>

			<?php 
			get_template_part( 'loop-templates/content', 'page-child' ); 
			?>
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
<!-- Last Pub -->
<div class="  container-new-layout" id="content" tabindex="-1">
	
	<?php 
		$categorys = explode(',',get_option('wisho_op_theme_option_last_pub'));
		$interactivecategorys = explode(',',get_option('wisho_op_theme_option_interactive_last_pub'));
	?>
	<div class="new-section-layout" alt="">
		<div class="<?php echo esc_attr( $container ); ?>">


			<?php /*publicazioni Standard*/ ?>
			<div class="row ">
			<div class="col custom-col-80">
				<div class="container">
					<div class="row new-article-last-pub">
						<div class="col-12">
							<h2 class="last-section-section-title">Ultime pubblicazioni</h2>
						</div>
						<?php
						//foreach ($categorys as $category) {
							$args = array(
								'post_type' => 'tematic_area',
								'posts_per_page'=>4,
								'orderby' => 'date',
								'order' => 'DESC',
								//'topics'=> $category,
							);
							$child_query = new WP_Query( $args );

							?>
							<div class="custom-row slick-point">
							<?php $custo_tag = get_term_by('slug', $category, 'topics'); ?>
							<?php
									while ( $child_query->have_posts() ) : $child_query->the_post();
										get_template_part( 'loop-templates/content', 'home-new-last-pub' );
									endwhile; 
									?>

						<?php
							wp_reset_postdata();
						//}

							?>
							</div>
					</div>
					<div class="col-12 d-none">
						<a class="archive-links" href="<?php echo get_tag_link( $custo_tag->term_id ); ?>">
							<?php _e('Vedi tutto ', 'understrap-child' ) ?>
							
						</a>
					</div>
					
				</div>
			</div>

			<div class="col custom-col-20">
				<div class="container">
					<div class="row new-article-news no-height home">
						<div class=" col-12">
						<h2 class=" last-section-section-title">News</h2>
						</div>
					</div>
					<div class="row new-article-news no-height home slick-mobi">
						<!-- .row -->
						<?php
							$args = array(
								'post_type' => 'post',
								'orderby' => 'date',
								'order' => 'DESC',
								'posts_per_page'=>2,
							);

							$child_query = new WP_Query( $args );

							?>

									<?php
								while ( $child_query->have_posts() ) : $child_query->the_post();
									get_template_part( 'loop-templates/content', 'new-home-news',  );
								endwhile; ?>


									<?php
							wp_reset_postdata();
							?>
						</div>
						<div class="row new-article-news no-height home ">
							<a class="archive-links"
						href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e('TUTTE LE NEWS ', 'understrap-child' ) ?> > </a>
					</div>
					
				</div>

			</div>
			</div>
		</div>
	</div>
</div>
<!-- End Last Pub -->
	<!-- aree tematiche -->
	<div class="  container-new-layout" id="content" tabindex="-1">

		<div class="new-section-layout aree-tematiche home" alt="">
			<div class="<?php echo esc_attr( $container ); ?>">


				<?php /*publicazioni Standard*/ ?>
				<div class="row ">
				<div class="col-12">
					<div class="container">
						<div class="row new-article-last-pub">
							<div class="col-12">
								<h2 class="last-section-section-title">Aree tematiche</h2>
							</div>

							<?php
								$page_areas= explode(',',get_option('wisho_op_theme_option_home_areas'));
								$args = array(
									'post_type' => 'page',
									'post_name__in' => $page_areas,
									'orderby' => 'menu_order',
									'order' => 'ASC'
									
								);
								$child_query = new WP_Query( $args );
								?>
								<?php $custo_tag = get_term_by('slug', $category, 'topics'); ?>
								<?php
									while ( $child_query->have_posts() ) : $child_query->the_post();
									get_template_part( 'loop-templates/content', 'new-home-areas' );
							   endwhile; ?>

							   <article class="col custom-col-20 login-section" >

								<a fref="#" class="access-square" data-toggle="modal" data-target="#account" >
								<span class="dyn-freccia-2"></span>

										<p class="text">
							   				Per accedere ai contenuti registrarsi su AccMed On-Line
										</p>
										<p class="archive-links">
							   				REGISTRATI ORA >
										</p>
										</a>
								</article><!-- #post-## -->
							<?php
								wp_reset_postdata();
								?>
						</div>
									

						
					</div>
				</div>

				</div>
			</div>
		</div>
	</div>
	<!-- end aree tematiche -->

	<!--Start videolezioni e casi clinici -->
	<div class="  container-new-layout" id="content" tabindex="-1">
		
		<?php 
			$category_videolezioni = get_option('wisho_op_theme_option_last_pub_videolezioni');
			$category_casi_clinici = get_option('wisho_op_theme_option_last_pub_casi_clinici');
		?>
		<div class="new-section-layout" alt="">
			<div class="<?php echo esc_attr( $container ); ?>">

				<?php /*publicazioni Standard*/ ?>
				<div class="row mb-60">
					<div class="col-12">
					<div class="container">
						<div class="row new-article-last-pub">
							<div class="col-12">
								<h2 class="last-section-section-title">Videolezioni</h2>
							</div>
						</div>

						
					</div>
				</div>

				<div class="col custom-col-80">
					<div class="container">
						<div class="row new-article-last-pub videolezioni">
							<div class="col-12">
								
							</div>
							<?php
							//foreach ($categorys as $category) {
								$args = array(
									'post_type' => 'tematic_area',
									'posts_per_page'=>1,
									'orderby' => 'date',
									'order' => 'DESC',
									'topics'=> $category_videolezioni,
								);
								$child_query = new WP_Query( $args );

								?>
								
								<?php
										while ( $child_query->have_posts() ) : $child_query->the_post();
											get_template_part( 'loop-templates/content', 'home-new-videolezioni' );
										endwhile; 
										?>

							<?php
								wp_reset_postdata();
							//}

								?>
						</div>				
					</div>
				</div>

				<div class="col custom-col-20">
					<div class="container">
						<div class="row ">
							<div class=" col-12 forced-padding">
							<?php $custo_tag = get_term_by('slug', $category_videolezioni, 'topics'); ?>
							<a class="archive-links" href="<?php
							if($videolezioni_link !=''){
								echo $videolezioni_link;
							}else{ echo get_tag_link( $custo_tag->term_id );} ?>">
								<?php _e('TUTTE LE VIDEOLEZIONI', 'understrap-child' ) ?> >
							</a>
							<div class="bg-dotted" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/images/dotted.png)"></div>
							</div>
						</div>
						
					</div>

				</div>
				</div>

				<div class="row ">
					<div class="col-12">
					<div class="container">
						<div class="row new-article-last-pub">
							<div class="col-12">
								<h2 class="last-section-section-title">Casi clinici</h2>
							</div>
						</div>

						
					</div>
				</div>

				<div class="col custom-col-80">
					<div class="container">
						<div class="row new-article-last-pub casi-clinici slick-point">
							<?php
							//foreach ($categorys as $category) {
								$args = array(
									'post_type' => 'tematic_area',
									'posts_per_page'=>4,
									'orderby' => 'date',
									'order' => 'DESC',
									'topics'=> $category_casi_clinici,
								);
								$child_query = new WP_Query( $args );

								?>
								<?php $custo_tag = get_term_by('slug', $category_casi_clinici, 'topics'); ?>
								<?php
										while ( $child_query->have_posts() ) : $child_query->the_post();
											get_template_part( 'loop-templates/content', 'home-new-last-pub' );
										endwhile; 
										?>

							<?php
								wp_reset_postdata();
							//}

								?>
						</div>					
					</div>
				</div>

				<div class="col custom-col-20">
					<div class="container">
						<div class="row ">
							<div class=" col-12 forced-padding">
							<a class="archive-links" href="<?php 
							if($casi_clinici_link !=''){
								echo $casi_clinici_link;
							}
							else{
								echo get_tag_link( $custo_tag->term_id );
							 } ?>">
								<?php _e('TUTTI I CASI CLINICI', 'understrap-child' ) ?> >
							</a>
							<div class="bg-dotted" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/images/dotted.png)"></div>
							</div>
						</div>
						
					</div>

				</div>
				</div>
			</div>
		</div>
		<div class="separator">	</div>
	</div>
	<!--end videolezioni e casi clinici -->
	
	<!--Start atlante interattivo -->
	<div class="  container-new-layout" id="content" tabindex="-1">
		
		<?php 
			$category_atlante = get_option('wisho_op_theme_option_last_pub_atlante');
		?>
		<div class="new-section-layout atlante-section" alt="">
			<div class="<?php echo esc_attr( $container ); ?>">

				<?php /*publicazioni Standard*/ ?>
				<div class="row ">
					<div class="col-12">
					<div class="container">
						<div class="row new-article-last-pub casi-clinici">
							<div class="col-12">
								<h2 class="last-section-section-title">Atlante interattivo</h2>
							</div>
						</div>

						
					</div>
				</div>
				<div class="col custom-col-40">
					<div class="container">
						<div class="row ">
							<div class=" col-12 atlante-img-section">

							<img src="<?php echo  get_option('wisho_op_theme_option_last_pub_atlante_img')  ?>" alt="Atlante interattivo img">
							</div>

							<div class="col-12 link-section  d-none d-lg-block">
								<div class="container">
									<div class="row  ">
										<div class=" col-12">
										<?php $custo_tag = get_term_by('slug', $category_atlante, 'topics'); ?>
										<?php if(get_option('wisho_op_theme_option_last_pub_atlante_img_link') !=''  ){ $link_img = get_option('wisho_op_theme_option_last_pub_atlante_img_link');  }else{ $link_img = get_tag_link( $custo_tag->term_id );} ?>
										<a class="archive-links" href="<?php echo  $link_img ?>">
											<?php _e('TUTTE LE IMMAGINI', 'understrap-child' ) ?> >
										</a>
										</div>
									</div>
									
								</div>

							</div>
						</div>
						
					</div>

				</div>

				<div class="col custom-col-60">
					<div class="container">
						<div class="row new-article-last-pub casi-clinici atlante">
							<div class="col-12 spacer-casi-clinici-atlante">
								
							</div>
						</div>
						<div class="row new-article-last-pub casi-clinici atlante slick-point">
							<?php
							//foreach ($categorys as $category) {
								$args = array(
									'post_type' => 'tematic_area',
									'posts_per_page'=>3,
									'orderby' => 'date',
									'order' => 'DESC',
									'topics'=> $category_atlante,
								);
								$child_query = new WP_Query( $args );

								?>
								
								<?php
										while ( $child_query->have_posts() ) : $child_query->the_post();
											get_template_part( 'loop-templates/content', 'home-new-last-pub' );
										endwhile; 
										?>

							<?php
								wp_reset_postdata();
							//}

								?>
						</div>
						<div class="col-12 link-section  d-block d-lg-none">
								<div class="container">
									<div class="row  ">
										<div class=" col-12">
										<?php $custo_tag = get_term_by('slug', $category_atlante, 'topics'); ?>
										<?php if(get_option('wisho_op_theme_option_last_pub_atlante_img_link') !=''  ){ $link_img = get_option('wisho_op_theme_option_last_pub_atlante_img_link');  }else{ $link_img = get_tag_link( $custo_tag->term_id );} ?>
										<a class="archive-links" href="<?php echo  $link_img ?>">
											<?php _e('TUTTE LE IMMAGINI', 'understrap-child' ) ?> >
										</a>
										</div>
									</div>
									
								</div>

							</div>				
					</div>
				</div>


				</div>

			</div>
		</div>
	</div>
	<!--end Atlante interattivo -->


	<div class="separator"style="margin-top: -14px; margin-bottom: 60px;">

	</div>

	
	<!--Start Approfondimenti e slidekit -->
	<div class="  container-new-layout" id="content" tabindex="-1">
		
		<?php 
			$category_update = get_option('wisho_op_theme_option_last_pub_update');
			$category_slidekit = get_option('wisho_op_theme_option_last_pub_slidekit');
		?>
		<div class="new-section-layout approfondimenti-slidekit" alt="">
			<div class="<?php echo esc_attr( $container ); ?>">

				<?php /*publicazioni Standard*/ ?>
				<div class="row ">

				<div class="col custom-col-60">
					<div class="container approfondimenti new-article-last-pub">

							<div class="row">
								<div class="col-12">
									<h2 class="last-section-section-title">Approfondimenti</h2>
								</div>
							</div>
							<?php
							//foreach ($categorys as $category) {
								$args = array(
									'post_type' => 'tematic_area',
									'posts_per_page'=>2,
									'orderby' => 'date',
									'order' => 'DESC',
									'topics'=> $category_update,
								);
								$child_query = new WP_Query( $args );

								?>
								<div id="approfondimenti-l" class="new-article-last-pub update left">
									<div class="row">
									<?php
											while ( $child_query->have_posts() ) : $child_query->the_post();
											$declaration = new stdClass();
											$declaration->section ='home';
											get_template_part( 'loop-templates/content', 'home-new-last-pub', $declaration );
											//get_template_part( 'loop-templates/content', 'home-new-last-pub' );
											endwhile; 
											?>
									</div>
								</div>
							<?php
								wp_reset_postdata();
							//}

								?>
							<div class="row">
								<div class=" col-12">
									<?php $custo_tag = get_term_by('slug', $category_update, 'topics'); ?>
									<a class="archive-links mb-40" href="<?php 
									if($approfondimenti_link !=null){
										echo $approfondimenti_link;
									}
									else {echo get_tag_link( $custo_tag->term_id );} ?>">
										<?php _e('TUTTI GLI APPROFONDIMENTI ', 'understrap-child' ) ?> >
									</a>
								</div>
							</div>
					
						
					</div>

				</div>

				<div class="col custom-col-40">
					<div class="container">
						<div class="row slidekit new-article-last-pub"  style="min-height: unset;">
							<div class="col-12">
								<h2 class="last-section-section-title">Slide Kit</h2>
							</div>
						</div>			
						<div id="approfondimenti-r " class="new-article-last-pub slidekit center">	
						<div class="row ">
							<?php
							//foreach ($categorys as $category) {
								$args = array(
									'post_type' => 'tematic_area',
									'posts_per_page'=>2,
									'orderby' => 'date',
									'order' => 'DESC',
									'topics'=> $category_slidekit,
								);
								$child_query = new WP_Query( $args );

								?>
								
								<?php
										while ( $child_query->have_posts() ) : $child_query->the_post();
											
											get_template_part( 'loop-templates/content', 'home-new-last-pub' );

										endwhile; 
										?>
								
							<?php
								wp_reset_postdata();
							//}

								?>
						</div>	
						</div>			
						<div class="row slidekit new-article-last-pub" style="min-height: unset;">
							<div class=" col-12">
								<?php $custo_tag = get_term_by('slug', $category_slidekit, 'topics'); ?>
								<a class="archive-links" href="<?php
								if($slidekit_link != ''){
									echo $slidekit_link;
								} else{
									echo get_tag_link( $custo_tag->term_id );
								} ?>">
								<?php _e('TUTTI GLI SLIDEKIT', 'understrap-child' ) ?> >
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

	<!-- Start 30 minuti con -->
	<div class="  container-new-layout " id="content" tabindex="-1">
		
		<?php 
			$categorys = explode(',',get_option('wisho_op_theme_option_last_pub'));
			$interactivecategorys = explode(',',get_option('wisho_op_theme_option_interactive_last_pub'));
		?>
		<div class="new-section-layout event_booking" alt="">
			<div class="<?php echo esc_attr( $container ); ?>">


				<?php /*publicazioni Standard*/ ?>
				<div class="row ">
				<div class="col custom-col-80">
					<div class="bg-l"> </div>
					<div class="container">
						<div class="row new-article-last-pub">
							<div class="col-12">
								<h2 class="last-section-section-title">30 Minuti con</h2>
								<h4 class="home-section-sub-title">
								Gli Esperti di Dynamics a vostra disposizione «live» ogni mese per 30 minuti per discutere di una tematica di interesse comune.<br>
								Vedi gli incontri programmati, prenota la tua partecipazione e invia le tue domande.
								</h4>
							</div>
							<?php
								$args = array(
									'post_type' => 'event_booking',
									'orderby' => 'date',
									'order' => 'ASC',
									'posts_per_page'=>-1,
								);
								$child_query = new WP_Query( $args );

								?>
								<?php $custo_tag = get_term_by('slug', $category, 'topics'); ?>
								<?php
										$counter = 0;
											while (( $child_query->have_posts() ) &&( $counter <=1 ) ) : $child_query->the_post();
											$ended = htmlspecialchars_decode(get_post_meta(get_the_ID(), 'event_booking_event_end', true)); 
											if($ended != "on"){
												$counter ++;
											get_template_part( 'loop-templates/content', 'home-new-last-event_booking' );
											}
										endwhile; 
										?>

							<?php
								wp_reset_postdata();
							//}

								?>
								<div class="col-12 col-md-6">	<a class="archive-links"
							href="<?php echo  get_option('wisho_op_theme_option_30_link')  ?>"><?php _e('TUTTI I 30 MINUTI CON ', 'understrap-child' ) ?> > </a>
							</div>	
								<div class="col-12 col-md-6">	
									
								<a class="archive-links"
							href="<?php echo  get_option('wisho_op_theme_option_30_link_replay')  ?>"><?php _e('TUTTI I REPLAY ', 'understrap-child' ) ?> > </a>
								</div>	
						</div>

						
					</div>
				</div>

				<div class="col custom-col-20">
				<div class="bg-r"> </div>
					<div class="container">
						<div class="row first">
							<div class="">
								<h2 class=" last-section-section-title">On Demand</h2>
								<p class="forced-padding">
								Il board scientifico di DyNAMICS risponde alle tue domande.<br>
Le risposte di interesse di tutta la community saranno pubblicate in un’area dedicata.
								</p>
							</div>

								<h2 class="last-section-section-title booking-first"></h2>
							<a class="archive-links forced-padding"
							href="<?php echo get_option( 'wisho_op_theme_on_demand_q' ) ; ?>"><?php _e('INVIA UNA DOMANDA ', 'understrap-child' ) ?> > </a>

								<h2 class="last-section-section-title booking"></h2>

							<a class="archive-links forced-padding"
							href="<?php echo  get_option( 'wisho_op_theme_on_demand_a' ) ; ?>"><?php _e('LE RISPOSTE DEL BOARD ', 'understrap-child' ) ?> > </a>

						

							
							
							
						</div>
						
						
					</div>

				</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End 30 minuti con -->


<!-- Start Dynmic HL -->
	<div class="  container-new-layout " id="content" tabindex="-1">
		
		<?php 
			$podcast = explode(',',get_option('wisho_op_theme_option_last_pub__podcast'));
			$categorys = explode(',',get_option('wisho_op_theme_option_last_pub'));
		?>
		<div class="new-section-layout highlights" alt="">
			<div class="<?php echo esc_attr( $container ); ?>">


				<div class="row ">

				<div class="col custom-col-80">
					<div class="container">
						<div class="row ">
							<div class=" col-12">
							<h2 class="last-section-section-title">DyNAMICS Highlights</h2>
							</div>
							<?php $args = array(
									'post_type' => 'tematic_area',
									'posts_per_page'=>1,
									'orderby' => 'date',
									'order' => 'DESC',
									'topics'=> $podcast,
								);
								$child_query = new WP_Query( $args );

								?>
								
								<?php
										while ( $child_query->have_posts() ) : $child_query->the_post();
										//Inizio podcast
										?>
											<article class="col-12" id="post-<?php the_ID(); ?>">
												<a href="<?php echo the_permalink(); ?>">
												<?php /* echo get_the_post_thumbnail();*/ ?>

												<img width="720" height="720" src="<?php echo get_option('wisho_op_theme_d_e_img'); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" decoding="async" loading="lazy"  sizes="(max-width: 720px) 100vw, 720px">
												<!--<img src="<?php echo get_option('wisho_op_theme_d_e_img_mobi'); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image size-post-thumbnail wp-post-image-mobile " alt="" decoding="async" loading="lazy"> -->
													<div class="last-content">
														<div class="entry-content">
															<?php
																		echo '<p class="upper-entry-title ">ULTIMO EPISODIO</p>';
																		echo '<p class="entry-title ">';
																		if(get_post()->post_excerpt){
																				echo get_post()->post_excerpt;
																		}else{
																				echo substr(get_the_title(), 0, 106);
																		} 
																		echo '...</p>';
																		?>
														</div><!-- .entry-header -->

														<div class="entry-content">
															<?php
																	if (get_post()->post_excerpt) {
																	$estract_content = get_post()->post_excerpt;
																	} else {
																	$estract_content = get_the_content();
																	}?>


															<p class=""><?php echo $article_text ?>
																	<?php echo substr(wp_strip_all_tags($estract_content), 0, 400); ?> ...
															</p>

														</div><!-- .entry-header -->

														<footer style="margin-top:auto">
															<span class="author-span">

																	<?php
																	$auts = get_the_terms(get_post()->ID, 'autor_tax');
																	if ($auts) {
																	foreach ($auts as $aut) {
																			echo $aut->name;
																	}
																	} else {
																	echo get_author_name();
																	}?>
															</span>

															<div class="entry-meta">

																	<?php 
																			$terms = get_the_terms(get_post()->ID, 'topics');
																			$cats = get_the_terms(get_post()->ID, 'categories_1');

																			foreach ($terms as $term) {
																			echo '<span class="bold" >';
																			echo $term->name;
																			echo '</span>';
																			echo '&nbsp;|&nbsp;';
																			}
																			/*
																			if ($cats) {
																			foreach ($cats as $cat) {
																					echo '&nbsp;|&nbsp;';
																					echo '<span >';
																					echo $cat->name;
																					echo '</span>';
																			}
																			}*/

																			?>

																			<?php if ( get_post_meta( get_post()->ID, '_understrap_show_in_homepage_date', true ) != ''){
																					echo get_post_meta( get_post()->ID, '_understrap_show_in_homepage_date', true ); 
																				}else{
																					understrap_posted_on_last();
																				}?>
															</div><!-- .entry-meta -->
														</footer>

														


													</div>
												</a>
											</article><!-- #post-## -->
										<?php 
										//fine podcast
										 endwhile; 

								wp_reset_postdata();
										?>
								<div class=" col-12 ">	
									<h2 class="last-section-section-title d-none"></h2>
									<a class="archive-links mb-40" href="<?php
									 if($podcast_link !=''){
										echo $podcast_link;
									 }else{
									 echo get_home_url().'/topic/podcast/';
									 }
									 ?>
									 ">
									 
									 <?php _e('TUTTI I PODCAST ', 'understrap-child' ) ?> ></a>
								</div>	
						</div>
						
					</div>

				</div>					
				<div class="col custom-col-20">
					<div class="container">
						<div class="row new-article-news webinar">
							<div class="col-12">
								<h2 class="last-section-section-title">Dai webinar</h2>
							</div>
							<div class="col-12 forced-padding">

							<?php
								$args = array(
									'post_type' => 'digital_event',
									'orderby' => 'date',
									'order' => 'DESC',
									'posts_per_page'=>1,
								);
								$child_query = new WP_Query( $args );

								?>
								<?php $custo_tag = get_term_by('slug', $category, 'topics'); ?>
								<?php
										while ( $child_query->have_posts() ) : $child_query->the_post();
										$declaration = new stdClass();
										$declaration->section ='d_e';
											get_template_part( 'loop-templates/content', 'new-home-news' ,$declaration);
										endwhile; 
										?>

							<?php
								wp_reset_postdata();
							//}
								?>
								</div>
								<div class="col-12">	
								<h2 class="last-section-section-title d-none"></h2>
								<a class="archive-links"
									href="<?php
									if($webinar_link !=''){
										echo $webinar_link;
									}else{ echo get_home_url().'/digital_event';}
									?>">
									<?php _e('TUTTI I WEBINAR ', 'understrap-child' ) ?> ></a>
								</div>	
						</div>

						
					</div>
				</div>


				</div>
			</div>
		</div>
	</div>
<!-- end Dynmic HL -->



	<!-- Credit -->
	<div class="separator credits-1" style=" margin-top: -25px;"></div>
		<!--- Start credit--->
		<div class="<?php echo esc_attr( $container ); ?> container-credits credits-1" id="content" tabindex="-1">
			<div class="row">
				
				<h2 class="home-credits">Con il patrocinio di</h2>
				<a href="https://www.sibioc.it/" target="_blank"
					style="text-align: center;display: block;margin: auto;"> <img class="sponsor-image"
						src="<?php echo get_stylesheet_directory_uri() ?>/images/LOGO_SIBIOC_ridotto.png" alt=""
						style="margin-bottom: 3rem;" /></a>
			</div>
		</div>

		<div class="separator" style="margin-top: 25px;"></div>

		<div class="<?php echo esc_attr( $container ); ?> container-credits" id="content" tabindex="-1">
			<div class="row">
				
				<h2 class="home-credits">Con la sponsorizzazione non condizionante di</h2>
				<img class="sponsor-image" style="margin-bottom: 35px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-sponsor.jpg"
					alt=""  />
			</div>
		</div>


</div><!-- Wrapper end -->

<?php get_footer(); ?>