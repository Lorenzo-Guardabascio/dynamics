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

<article <?php post_class('col-6 col-md-3'); ?> id="post-<?php the_ID(); ?>" >

        <a href="<?php echo get_the_permalink(); ?>" >
                <?php echo get_the_post_thumbnail( $post->ID); ?>
                
                <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->
                </a>
</article><!-- #post-## -->