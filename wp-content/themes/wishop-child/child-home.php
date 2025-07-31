<?php
/**
 * Template Name: Home
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

		<!-- Aree tematiche -->
		<h2 class="home-section-title">AREE TEMATICHE</h2>
		<div class="row article-loop">
			<!-- .row -->
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

			<?php
				while ( $child_query->have_posts() ) : $child_query->the_post();
					 get_template_part( 'loop-templates/content', 'home-areas' );
				endwhile; ?>


			<?php
			wp_reset_postdata();
			?>
		</div>
	</div><!-- Container end -->
	<!--  End Aree tematiche -->

	<!-- Last Pub -->
	<div class=" container-last-pub" id="content" tabindex="-1">
		<h2 class="home-section-title">ULTIME PUBBLICAZIONI</h2>
		<?php 
			$categorys = explode(',',get_option('wisho_op_theme_option_last_pub'));
			$interactivecategorys = explode(',',get_option('wisho_op_theme_option_interactive_last_pub'));
			$interactivecategorys_hl = get_option('wisho_op_theme_option_interactive_last_pub_hl');

		?>
		<div class="last-pub-section" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/images/last_pub.png)" alt="" >
			<div class="<?php echo esc_attr( $container ); ?>" >
		
				<?php /*publicazioni interattive*/ ?>
				<div class="row article-last-pub <?php if(get_option('wisho_op_theme_option_interactive_last_pub') == ''){echo 'd-none';} ?> " >
					<?php
					foreach ($interactivecategorys as $category) {
						$args = array(
							'post_type' => 'tematic_area',
							'posts_per_page'=>1,
							'orderby' => 'date',
							'order' => 'DESC',
							'topics'=> $category,
						);
						$child_query = new WP_Query( $args );

						?>
					<div class="col-12 <?php if(count($interactivecategorys)==1){echo'col-md-6' ;}else{ echo'col-md-4' ; } ?>  single-tab-pub interactive">
						<?php $custo_tag = get_term_by('slug', $category, 'topics'); ?>
						<h3><?php echo $custo_tag->name; ?></h3>
						
							<?php
							while ( $child_query->have_posts() ) : $child_query->the_post();
								get_template_part( 'loop-templates/content', 'home-last-pub' );
							endwhile; 
							?>
							<a class="archive-links" href="<?php echo get_tag_link( $custo_tag->term_id ); ?>"><?php _e('Vedi tutto ', 'understrap-child' ) ?><span
									class="dyn-icona-menu"></span> </a>
					</div>

					<?php
						wp_reset_postdata();
					}
					/*Dynmic HL*/
					?>
					<div class="col-12 <?php if(count($interactivecategorys)==1){echo'col-md-6' ;}else{ echo'col-md-4' ; } ?> single-tab-pub interactive">
						<h3><?php echo get_the_title($interactivecategorys_hl); ?></h3>
							<article <?php post_class(); ?> id="post-<?php the_ID($interactivecategorys_hl); ?>">
								<a href="<?php echo the_permalink($interactivecategorys_hl); ?>">
									<div class="last-content">
											<div class="entry-meta">

													<?php 
													if ( get_post_meta( $interactivecategorys_hl, '_understrap_show_in_homepage_date', true ) != ''){
														echo get_post_meta( $interactivecategorys_hl, '_understrap_show_in_homepage_date', true ); 
													}else{
														understrap_posted_on_last($interactivecategorys_hl);
													}?>

											</div><!-- .entry-meta -->
											<header class="entry-header">

													<?php
											$categories = get_the_category();
							
											if ( ! empty( $categories ) ) {
												echo esc_html( $categories[0]->name );   
											}
											?>
											</header><!-- .entry-content -->

											<div class="entry-content">
											<?php
													echo '<p class="entry-title ">';
													if(get_post($interactivecategorys_hl)->post_excerpt){
															echo get_post($interactivecategorys_hl)->post_excerpt;
													}else{
															echo substr(get_the_title($interactivecategorys_hl), 0, 106);
													} 
													echo '...</p>';
													?>
											</div><!-- .entry-header -->
									</div>
								</a>
							</article><!-- #post-## -->
						<a class="archive-links" href="<?php echo get_permalink( $interactivecategorys_hl ); ?>"><?php _e('Vedi tutto ', 'understrap-child' ) ?><span
									class="dyn-icona-menu"></span> </a>
					</div>

				</div>

				<?php /*publicazioni Standard*/ ?>
				<div class="row article-last-pub">
					<?php
					foreach ($categorys as $category) {
						if ($category== 'casi-clinici' ){
							//$category_casi= ['casi-clinici','casi-clinici-interattivi'];
							$category_casi= ['casi-clinici'];
							$args = array(
								'post_type' => 'tematic_area',
								'posts_per_page'=>2,
								'orderby' => 'date',
								'order' => 'DESC',
								'topics'=> $category_casi,
							);
						}else{
						$args = array(
							'post_type' => 'tematic_area',
							'posts_per_page'=>2,
							'orderby' => 'date',
							'order' => 'DESC',
							'topics'=> $category,
						);
						}
						$child_query = new WP_Query( $args );

						?>
					<div class="col-12 col-md-3 single-tab-pub">
						<?php $custo_tag = get_term_by('slug', $category, 'topics'); ?>
						<h3><?php 
						if($custo_tag->slug== 'update'){
						echo 'Approfondimenti';}
						else{
							echo $custo_tag->name;
						}
						?></h3>
								<?php
								while ( $child_query->have_posts() ) : $child_query->the_post();
									get_template_part( 'loop-templates/content', 'home-last-pub' );
								endwhile; 
								?>
								<a class="archive-links" href="<?php echo get_tag_link( $custo_tag->term_id ); ?>"><?php _e('Vedi tutto ', 'understrap-child' ) ?><span
										class="dyn-icona-menu"></span> </a>

					</div>
					<?php
						wp_reset_postdata();
					}

					$categorys_img = explode(',',get_option('wisho_op_theme_option_img_cat'));
					foreach ($categorys_img as $category_img) {
						$args = array(
							'post_type' => 'tematic_area',
							'posts_per_page'=>1,
							'orderby' => 'date',
							'order' => 'DESC',
							'topics'=> $category_img,
						);

						$child_query_img = new WP_Query( $args );

						?>
					<div class="col-12 col-md-3 single-tab-pub">
						<?php $custo_tag = get_term_by('slug', $category_img, 'topics'); ?>
						<h3><?php
						if($custo_tag->slug== 'immagini'){
							echo 'Immagini commentate';}
							else{
								echo $custo_tag->name;
							}
						?></h3>
								<?php
								while ( $child_query_img->have_posts() ) : $child_query_img->the_post();
									get_template_part( 'loop-templates/content', 'home-image' );
								endwhile; 
								
								?>
								<a class="archive-links" href="<?php echo get_tag_link( $custo_tag->term_id ); ?>"><?php _e('Vedi tutto ', 'understrap-child' ) ?>
									<span class="dyn-icona-menu"></span> </a>

					</div>
					<?php
						wp_reset_postdata();
					}
						?>
				</div>
			</div>
		</div>
	</div>

	
	<?php if(function_exists('output_event_booking')){output_event_booking();} ?>
	
	<!-- MATERIALI DAI WEBINAR -->
	<div class="news-container">
		<div class="<?php echo esc_attr( $container ); ?> container-news" id="content" tabindex="-1">
			<h2 class="home-section-title">MATERIALI DAI WEBINAR</h2>

			<div class="row article-news">
				<!-- .row -->
				<?php
			$args = array(
				'post_type' => 'digital_event',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page'=>2,
			);

			$child_query = new WP_Query( $args );

			?>

				<?php
				while ( $child_query->have_posts() ) : $child_query->the_post();
					 get_template_part( 'loop-templates/content', 'home-digital-event' );
				endwhile; ?>


				<?php
			wp_reset_postdata();
			?>
			</div>
			<a class="archive-links" href="<?php echo get_home_url() ?>/digital_event/"><?php _e('Vedi tutto ', 'understrap-child' ) ?><span class="dyn-icona-menu"></span></a>
		</div>
	</div><!-- Container end -->
	<!--Digital Event -->




	<!-- News -->
	<div class="news-container"
		style="background-image:url(<?php echo get_option('wisho_op_theme_option_image_news') ?>)">
		<div class="<?php echo esc_attr( $container ); ?> container-news" id="content" tabindex="-1">
			<h2 class="home-section-title">NEWS</h2>

			<div class="row article-news">
				<!-- .row -->
				<?php
			$args = array(
				'post_type' => 'post',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page'=>4,
			);

			$child_query = new WP_Query( $args );

			?>

				<?php
				while ( $child_query->have_posts() ) : $child_query->the_post();
					 get_template_part( 'loop-templates/content', 'home-news' );
				endwhile; ?>


				<?php
			wp_reset_postdata();
			?>
			</div>
			<a class="archive-links" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e('ARCHIVIO NEWS ', 'understrap-child' ) ?><span class="dyn-icona-menu"></span></a>
		</div>
	</div><!-- Container end -->
	<!--End News -->

	<!-- Credit -->
	<div class=" container-last-pub <?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<!--- Start credit--->
		<div class="<?php echo esc_attr( $container ); ?> container-credits" id="content" tabindex="-1">
		<div class="row">
		<div class="gray-separator"></div>
			<h2 class="home-credits">Con il patrocinio di</h2>
		<a href="https://www.sibioc.it/" target="_blank" style="text-align: center;display: block;margin: auto;"> <img class="sponsor-image" src="<?php echo get_stylesheet_directory_uri() ?>/images/LOGO_SIBIOC_ridotto.png" alt="" style="height: 13rem;margin-bottom: 3rem;" /></a>
		</div>
		</div>
		<div class="<?php echo esc_attr( $container ); ?> container-credits" id="content" tabindex="-1">
		<div class="row">
		<div class="gray-separator"></div>
			<h2 class="home-credits">Con la sponsorizzazione non condizionante di</h2>
		<img class="sponsor-image" src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-sponsor.jpg" alt="" />
		</div>
		</div>
	</div>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
