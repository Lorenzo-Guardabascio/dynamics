<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title"
		content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo get_home_url() ?>">
	<meta property="og:title" content="<?php echo get_bloginfo('name');?>">
	<meta property="og:image" content="<?php echo get_site_icon_url();?>">
	<meta property="og:description" content="<?php echo get_bloginfo('description');?>">
	<meta name="description" content="<?php echo get_bloginfo('description');?>" />
	<!--<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">-->
	<title><?php echo get_bloginfo('name');?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<?php if(get_option('wisho_op_theme_pixel') !='' ){
	echo get_option('wisho_op_theme_pixel');
	}
	if( get_option('wisho_op_theme_google')!=''){
		echo get_option('wisho_op_theme_google');
	} ?>
</head>

<body <?php body_class(); ?>>
<?php if( get_option('wisho_op_theme_google')!=''){
	echo get_option('wisho_op_theme_google');
} ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

			<a class="skip-link sr-only sr-only-focusable" href="#content">
				<?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

			<div class="container header-section-container">
				<!--- Start container --->

				<div class="row">
					<!--- End Row --->
					<div class=" col-12 col-md logo-container">
						<!-- Your site title as branding in the menu -->
						<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="navbar-brand mb-0">
							<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
								title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
								<?php bloginfo( 'name' ); ?></a>
						</h1>

						<?php else : ?>

						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
							<?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>

						<?php } else {
						the_custom_logo();
						} ?>

					<nav class="navbar navbar-expand-lg navbar-dark w-100">
						<div class="button-container">
							<button class="navbar-toggler" type="button" data-toggle="collapse"
								data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
								aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
								<span class="navbar-toggler-icon"></span>
							</button>
						</div>
					</nav>
					</div>
					<!-- end custom logo -->
					<?php echo '<div class="col-12 col-lg-4 nav-left-section">';
						echo '<div class="icon-section">';
						understrap_social_icon();
						echo '</div>'; 
						echo '<div>'; 
						echo '<div class="log-sidebar navbar-expand-lg" >';
						modal_call();
						echo '</div>';
						//echo do_shortcode( '[searchandfilter submit_label="Filter" fields="search,category,tag,topics,categories_1"]' );
						
						echo '</div>';
						echo '</div>'; 
						?>

				</div>
				<!--- End Row --->
			</div>
			<!--- End container --->
			<div class="container header">
			<div class="row">
			<div class="last-section-section-title"></div>
			</div>
			</div>
			<nav class="navbar navbar-expand-lg navbar-dark w-100">

				<?php if ( 'container' == $container ) : ?>
				<div class="container">
					<?php endif; ?>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_Child_WP_Bootstrap_Navwalker(),
					)
				); ?>

					<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>

			</nav><!-- .site-navigation -->


		</div><!-- #wrapper-navbar end -->
<div class="form-anchor">
	<div class="form-container">
		<form class="navbar-form navbar-right navbar-form-search search-form-container container hdn" method="get" id="search-input-container"
		action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

			<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
					<button type="button" class="btn btn-default mt-10" id="hide-search-input-container">x</button>
			<div class="row search-section">

				<div class="src-1">
					<input class="field form-control"  id="s" name="s" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
				</div>
				<div class="src-2">
					<button class="btn btn-outline-ligh" id="search-button" name="submit" type="submit" >Cerca</button>
				</div>
				<div class="src-3 src-3 d-none d-sm-block">
						<button class="btn btn-default" id="searchsubmit" name="submit" type="submit" value="<?php esc_attr_e( 'Ricerca Avanzata', 'understrap' ); ?>">
								<?php esc_attr_e( 'Ricerca Avanzata', 'understrap' ); ?>
						</button>
				</div>

			</div>
		</form>
	</div>
</div>