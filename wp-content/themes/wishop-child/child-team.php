<?php
/**
 * Template Name: Child team
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
<?php understrap_print_post_main()?>

<div class="wrapper page-standard" id="page-wrapper">
    <div class="container-fluid" id="content" tabindex="-1">

        <div class="row">

            <!-- Do the left sidebar check -->
            <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
            <main class="site-main" id="main">
            <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
                <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'loop-templates/content', 'page-team' ); ?>
                </div>
                <?php  get_template_part( 'loop-templates/content', 'home-services' ); ?>
                <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
                <footer class="entry-footer">

                    <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

                </footer><!-- .entry-footer -->
                </div>
                <?php endwhile; // end of the loop. ?>
            </main><!-- #main -->

            <!-- Do the right sidebar check -->
        </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>