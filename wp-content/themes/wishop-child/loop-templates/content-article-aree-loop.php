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

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<p>
			<?php understrap_posted_on_last();

		$terms = get_the_terms( $post->ID , 'topics' );
		$cats = get_the_terms( $post->ID , 'categories_1' );

		foreach ( $terms as $term ) {
			echo '&nbsp;|&nbsp;' ;
			echo '<span class="red-terms">';
			echo $term->name;
			echo '</span>';
			}

			if($cats){	
				foreach ( $cats as $cat ) {
					echo '&nbsp;|&nbsp;' ;
					echo '<span class="red-terms">';
					echo $cat->name;
					echo '</span>';
					}
				 }?>
		</p>

		<h2 class="entry-title">
			<?php
				the_title();  
			?>
		</h2>
		<div class="entry-meta">
			<span class="author-span">
				<?php _e('A cura di ', 'understrap-child');

				$auts = get_the_terms( $post->ID , 'autor_tax' );
				if ($auts){
					foreach ( $auts as $aut ) {
						echo $aut->name;
						}
					}else{
					echo get_author_name() ;
					}?>
			</span>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
		<?php if($post->post_excerpt){
				$estract_content= $post->post_excerpt;
			}else{
				$estract_content= get_the_content();
			} ?>
		<?php /*<p> echo substr(wp_strip_all_tags($estract_content), 0, 346); ...</p> */?>
			<div class="wp-block-button"><a class="wp-block-button__link has-background continue_button"
			href="<?php echo get_permalink() ?>"  style="background-color:#c00000;border-radius:8px">continua</a>
			</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer linear-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->