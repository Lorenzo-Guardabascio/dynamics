<?php
/**
 * Template Name: Account page
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

<div class="wrapper page-standard" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">


		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
			<main class="site-main" id="main">
				<?php
				global $current_user;
				get_currentuserinfo();
				$email = (string) $current_user->user_email;
				$url = "https://registrazione.accmed.org/?act=signup";

				$sBrowserAgent = $_SERVER['HTTP_USER_AGENT']; $sKey = sha1($sBrowserAgent .
				substr($sBrowserAgent, 4) . $email); $sSrc = $url . '&email=' . $email .
				'&key=' . $sKey;

				$id_section= $_GET['id_section'];
				switch($id_section){
					case'account':$link_frame=$sSrc; break;
					case'signup':$link_frame='https://registrazione.accmed.org/?act=signup'; break;
					case'link':$link_frame='https://registrazione.accmed.org/?act=link'; break;
					case'username':$link_frame='https://registrazione.accmed.org/?act=username'; break;
					case'password':$link_frame='https://registrazione.accmed.org/?act=password'; break;
					case'':$link_frame='https://registrazione.accmed.org/'; break;

			}
				 ?>
				<iframe src=" <?php echo $link_frame ?> " frameborder="0" style="width: 100%; min-height:50vh;border:none;" ></iframe>
			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		</div><!-- .row -->
	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>