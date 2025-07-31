<?php
/**
 * Template Name:Sotto sezione on demand
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

<div class="<?php echo esc_attr( $container ); ?>" >
		<div class="row aside-section">
			<?php if ( !is_user_logged_in() ) {
            echo '<h2 class="text-center no-acces">Per accedere a questi contenuti devi essere registrato al sito ed esserti connesso con i tuoi dati di accesso
           				<br> <a class="cursor-grabbing archive-links" data-toggle="modal" data-target="#account" >Accedi o registrati adesso ></a></h2>';
       		 }else{ ?>

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

							<!-- Do the right sidebar check -->
							<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
						</div><!-- .row -->
						<?php
									if(!$id){
										$id = get_the_ID();
									}

									$category = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_category_in_page', true ));
									$tag = htmlspecialchars_decode(get_post_meta( $id, '_understrap_post_tag_in_page', true ));
									$args = array(
										'post_type' => 'on_demand',
										//'categories_1'=> $category ,
										'order' => 'DESC',
										'posts_per_page'=>12,
										//'topics'=> [$tag],
									);
									$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

									$child_query = new WP_Query( $args );
									$temp_query = $wp_query;
									$wp_query   = NULL;
									$wp_query   = $child_query;
									?>
															<?php 
						if($tag == "podcast"){
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
						}elseif($tag == "slidekit"){
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
								<div class="single-tab-pub">

									<?php $custo_tag = get_term_by('slug', $tag, 'topics'); ?>
									
											<?php
											while ( $child_query->have_posts() ) : $child_query->the_post();
												get_template_part( 'loop-templates/content', get_post_format() );
											endwhile; 
											if( !($child_query->have_posts())){
													echo '<h1 class="text-center" >Contenuti prossimamente disponibili </h1>';
											}

											?>

								</div>

					</div><!-- Container end -->
					<?php
					understrap_pagination();
					wp_reset_query() ?>
				</div><!-- Wrapper end -->
			</div>
			
			<?php
			if(get_post_meta( get_the_ID(), '_understrap_sidebar_in_page', true ) && get_post_meta( get_the_ID(), '_understrap_sidebar_in_page', true )=="on"){
				$tag = htmlspecialchars_decode(get_post_meta( get_the_ID(), '_understrap_post_tag_in_page', true ));
				$alternativa_bar = htmlspecialchars_decode(get_post_meta( get_the_ID(), '_understrap_sidebar_in_page', true ));
				dynamics_page_bar_single($tag);
			}else{
				dynamics_page_bar();
			}						
			
		} ?>
		</div>
	</div>
<?php get_footer(); ?>
