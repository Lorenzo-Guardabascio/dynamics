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
				$id_action= $_GET['action'];
				if($id_section=='account'){
					if(is_user_logged_in() ){
						$link_frame=$sSrc; 
					}else{
						$link_frame=$url; 
					}
					echo '<iframe src="'. $link_frame .'" frameborder="0" style="width: 100%; min-height:50vh;border:none;" ></iframe>';
				}
				elseif($id_section=='signup'){
					$link_frame='https://registrazione.accmed.org/?act=signup';
					echo '<iframe src="'. $link_frame .'" frameborder="0" style="width: 100%; min-height:50vh;border:none;" ></iframe>';
				}
				elseif($id_section=='link'){
					$link_frame='https://registrazione.accmed.org/?act=link';
					echo '<iframe src="'. $link_frame .'" frameborder="0" style="width: 100%; min-height:50vh;border:none;" ></iframe>';
				}
				elseif($id_section=='username'){
					$link_frame='https://registrazione.accmed.org/?act=username';
					echo '<iframe src="'. $link_frame .'" frameborder="0" style="width: 100%; min-height:50vh;border:none;" ></iframe>';
				}
				elseif($id_section=='password'){
					$link_frame='https://registrazione.accmed.org/?act=password';
					echo '<iframe src="'. $link_frame .'" frameborder="0" style="width: 100%; min-height:50vh;border:none;" ></iframe>';
				}
				elseif(($id_section=='' && !is_user_logged_in() )|| (!is_user_logged_in() && $$id_action=='failed') || !is_user_logged_in() ){
					$page_id = "";
					$product_pages_args = array(
					'meta_key' => '_wp_page_template',
					'meta_value' => 'login.php'
					);
					
					$product_pages = get_pages( $product_pages_args );
					foreach ( $product_pages as $product_page ) {
					$page_id.= $product_page->ID;
					}
					
					/*function goto_login_page() {
					global $page_id;
					$login_page = home_url( '/?page_id='. $page_id. '/' );
					$page = basename($_SERVER['REQUEST_URI']);
					
					if( $page == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
					wp_redirect($login_page);
					exit;
					}
					}
					add_action('init','goto_login_page');
					*/
					
					//echo $login_page = $page_path ;
					
					function logout_page() {
					global $page_id;
					$login_page = home_url( '/?page_id='. $page_id. '/' );
					wp_redirect( $login_page . "&login=false" );
					exit;
					}
					add_action('wp_logout', 'logout_page');
					
					$page_showing = basename($_SERVER['REQUEST_URI']);
					
					if (strpos($page_showing, 'unauthorized') !== false) {
					echo '<p class="text-center color-red  error-msg"><strong>ERROR</strong>: La sezione riservata di questo sito è accessibile ai soli operatori sanitari. Per informazioni e assistenza potete scrivere a <a href="mailto:assistenza@accmed.org">assistenza@accmed.org</a></p>';

					}
					
					if (strpos($page_showing, 'failed') !== false) {
					echo '<p class="text-center color-red  error-msg"><strong>ERROR:</strong> Username e/o password errati.</p>';

					}
					elseif (strpos($page_showing, 'blank') !== false ) {
					echo '<p class="text-center color-red error-msg"><strong>ERROR:</strong> Username e/o Password sono vuoti.</p>';
					}
					echo'      <div  class="modal-body">';
    				wp_login_form();
    				echo'<div id="loginform">';
					echo'<a style="width: 100%; display: block;" data-toggle="modal" data-target="#avviso">Registrati</a>';
					echo'<a style="width: 100%; display: block;" href="'. get_option('wisho_op_theme_link_account').'?id_section=link" > Non hai ricevuto il link di attivazione? </a>';
					echo'<a style="width: 100%; display: block;" href="'. get_option('wisho_op_theme_link_account').'?id_section=username" > Username dimenticato </a>';
    				echo'<a style="width: 100%; display: block;" href="'. get_option('wisho_op_theme_link_account').'?id_section=password" > Password dimenticata </a>';
    				echo'</div>';
					echo'</div>';

				}
				elseif(is_user_logged_in() ){
					$link_frame=$sSrc; 
					echo '<iframe src="'. $link_frame .'" frameborder="0" style="width: 100%; min-height:50vh;border:none;" ></iframe>';
				}

				 ?>
			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		</div><!-- .row -->
	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>