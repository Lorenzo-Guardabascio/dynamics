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

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php if ( 'post' == get_post_type() || 'digital_event' == get_post_type() || 'tematic_area' == get_post_type() ) : ?>

		<div class="entry-meta d-none">
			<?php understrap_posted_on_last();
			if(get_the_terms( $post->ID , 'digital_categories' )){
				$terms = get_the_terms( $post->ID , 'digital_categories' );
			}				
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
		</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<h2 class="entry-title">
			<?php
			the_title();
			?>
		</h2>
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
<br>
		<!---a href="<?php //echo get_permalink() ?>" class="red-terms">Link</-a--->
		<?php $webcast= htmlspecialchars_decode(get_post_meta( get_the_ID(),'_understrap_link_webcast', true));
			if($webcast != ''){ ?>
				<a
				class="vid htmlvid red-terms" style="cursor: pointer; "
				vidSrc="<?php echo $webcast?>"
				>Webcast</a> -
			<?php } ?>

		<?php $diapositive= htmlspecialchars_decode(get_post_meta( get_the_ID(),'_understrap_link_diapositive', true));
			if($diapositive != '') { ?>
				<a href="<?php echo $diapositive?>" class="red-terms">Diapositive</a>
			<?php } ?>

	</div><!-- .entry-content -->


</article><!-- #post-## -->
