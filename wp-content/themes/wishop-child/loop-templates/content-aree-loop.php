<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


?>
<article <?php post_class('col-12 col-md-3'); ?> id="post-<?php the_ID(); ?>">

		<a class="" href=" <?php echo get_permalink() ?> " >
			<div class="loop-imagesection" style=" background-image:url(<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>) " ></div>
	
			<header class="entry-header">
				<h1 class="title" >
					<?php echo get_the_title(); ?>
				</h1>	
			</header><!-- .entry-header -->
		</a>
</article><!-- #post-## -->