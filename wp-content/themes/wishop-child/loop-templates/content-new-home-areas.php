<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class('col custom-col-20'); ?> id="post-<?php the_ID(); ?>" >
        <?php
        if(get_post_meta( get_post()->ID, '_understrap_post_alt_image', true) && get_post_meta( get_post()->ID, '_understrap_post_alt_image', true) !='' ){
               /* ?>
                <script>
                        (function ($) {

                                $(document).ready(function(){
                                        if($(window).width() <= 575.98 ) {
                                                $('.post-link-<?php the_ID(); ?> img.wp-post-image').hide();
                                                $('.post-link-<?php the_ID(); ?> img.img-area-mobile').show();
                                        }
                                        $(window).resize(function(){
                                                if($(window).width() <= 575.98) {
                                                        $('.post-link-<?php the_ID(); ?> img.wp-post-image').hide();
                                                        $('.post-link-<?php the_ID(); ?> img.img-area-mobile').show();
                                                }else{
                                                        $('.post-link-<?php the_ID(); ?> img.wp-post-image').show();
                                                        $('.post-link-<?php the_ID(); ?> img.img-area-mobile').hide();
                                                }
                                        });
                                });
                        })(jQuery);

                </script>
                <?php*/
        }
        ?>
        <a href="<?php echo get_the_permalink(); ?>" class="post-link-<?php the_ID(); ?>" >
                <?php echo get_the_post_thumbnail( $post->ID); ?>
                <?php
                if(get_post_meta( get_post()->ID, '_understrap_post_alt_image', true) && get_post_meta( get_post()->ID, '_understrap_post_alt_image', true) !='' ){
                ?>
                        <img src="<?php echo  get_post_meta( get_post()->ID, '_understrap_post_alt_image', true) ?>" alt="" class="img-area-mobile">
                <?php } ?>
                <header class="entry-header d-none">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->
                </a>
</article><!-- #post-## -->