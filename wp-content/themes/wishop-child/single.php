<?php
/**
 * The template for displaying all single posts.
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
			<h2 class="entry-title ">
				<?php 
				if($post->post_type == "event_booking"){
					echo " 30 MINUTI CON";
				}elseif(is_single()){
					echo "News";
				}else{
				echo get_the_title( $post->post_parent ); }
				?>
			</h2>

			<h1 class="d-none">
				<?php 
				if(is_single()){
					echo get_the_title(); 
				}
				?>
			</h1>
			<h2 class="entry-sub-title"><?php echo htmlspecialchars_decode(get_post_meta( $post->post_parent, '_understrap_show_in_page_sub_title', true ))?></h2>
		</div>
	</div>
	<?php get_breadcrumb() ?>
</header><!-- .entry-header -->
<div class="wrapper" id="single-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

	
		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-templates/content', 'single' ); ?>

				<ul class="share-buttons">
					<li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Floclhost.dynamics&quote="
							title="Share on Facebook" target="_blank"
							onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;"><img
								alt="Share on Facebook" src="<?php echo get_stylesheet_directory_uri() ?>/images/Facebook.svg" /></a>
					</li>
					<li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Floclhost.dynamics&text=:%20http%3A%2F%2Floclhost.dynamics"
							target="_blank" title="Tweet"
							onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img
								alt="Tweet" src="<?php echo get_stylesheet_directory_uri() ?>/images/Twitter.svg" /></a></li>
					<li><a href="https://plus.google.com/share?url=http%3A%2F%2Floclhost.dynamics" target="_blank"
							title="Share on Google+"
							onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img
								alt="Share on Google+" src="<?php echo get_stylesheet_directory_uri() ?>/images/Google+.svg" /></a>
					</li>
					<li><a href="mailto:?subject=&body=:%20http%3A%2F%2Floclhost.dynamics" target="_blank"
							title="Send email"
							onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><img
								alt="Send email" src="<?php echo get_stylesheet_directory_uri() ?>/images/Email.svg" /></a></li>
				</ul>

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

<?php get_footer();