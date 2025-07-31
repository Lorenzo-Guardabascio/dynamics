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

<article <?php post_class('col-6 col-md-3 imgage-loop'); ?> id="post-<?php the_ID(); ?>">
<a href="<?php echo get_the_permalink() ?>">
<div class="single-image-loop" style="background-image:url(<?php /*echo get_the_post_thumbnail_url( $post->ID, 'large' );*/ ?>)">
<?php echo  get_the_post_thumbnail($post->ID) ?>
</div>
	<header class="entry-header">
	

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>


	</header><!-- .entry-header -->
	<div class="entry-meta">
		<span class="author-span">
			<?php 
			$auts = get_the_terms( $post->ID , 'autor_tax' );
			if ($auts){
				foreach ( $auts as $aut ) {
					echo $aut->name;
					}
				}else{
				echo get_author_name() ;
				}?>
		</span>
		
			<p>
			<?php

			$terms = get_the_terms( $post->ID , 'topics' );
			$cats = get_the_terms( $post->ID , 'categories_1' );
			foreach ( $terms as $term ) {
				echo '<span class="red-terms">';
				echo $term->name;
				echo '</span>';
				echo '&nbsp;|&nbsp;' ;
				}

				/*
				if($cats){	
					foreach ( $cats as $cat ) {
						echo '<span class="red-terms">';
						echo $cat->name;
						echo '</span>';
						echo '&nbsp;|&nbsp;' ;
						}
					 }*/
					 ?>
					 <?php understrap_posted_on_last();  ?>
			</p>
			
			

		</div><!-- .entry-meta -->
		</a>
</article><!-- #post-## -->