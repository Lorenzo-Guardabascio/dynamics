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

<a href="<?php echo get_permalink() ?>" <?php post_class('single_loop_post'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
	<h2 class="entry-title">
			<?php
			the_title();
			?>
		</h2>
		<?php if ( 'post' == get_post_type() || 'tematic_area' == get_post_type() || 'digital_event'==get_post_type() || 'on_demand'==get_post_type() ) : ?>
			<div class="entry-content">
		<?php if($post->post_excerpt){
				$estract_content= $post->post_excerpt;
			}else{
				$estract_content= get_the_content();
			} ?>
		<p> <?php echo substr(wp_strip_all_tags($estract_content), 0, 346); ?> ...</p> 
		<span class="author-span">
		<?php 
		$auts = get_the_terms( $post->ID , 'autor_tax' );
		
		if ($auts){
			foreach ( $auts as $aut ) {
				echo _e('A cura di ', 'understrap-child') .  $aut->name;
				}
			}else{
			//echo get_author_name() ;
			}?>
	</span>

	</div><!-- .entry-content -->
		<div class="entry-meta">
			<?php 
			$date ="";

			if (!$id) {
				   $id = get_the_ID();
			   }

			if(get_the_terms( $post->ID , 'category' )){
				$terms = get_the_terms( $post->ID , 'category' );
			}elseif(get_the_terms( $post->ID , 'topics' )){
				$terms = get_the_terms( $post->ID , 'topics' );
			}elseif(get_the_terms( $post->ID , 'digital_categories' )){
				$terms = get_the_terms( $post->ID , 'digital_categories' );
			}

			
				$cats = get_the_terms( $post->ID , 'categories_1' );
				
				foreach ( $terms as $term ) {

					echo '<span class="bold ">';
					echo $term->name;
					echo '</span>';
					echo '&nbsp;|&nbsp;' ;
					}
					/*
				if($cats){	
					foreach ( $cats as $cat ) {
						
						echo '<span class="bold">';
						echo $cat->name;
						echo '</span>';
						echo '&nbsp;|&nbsp;' ;
						}
					 }
					 */
					 $date = htmlspecialchars_decode(get_post_meta($id, '_digital_event_date', true));
					 if ($date==""){
							 understrap_posted_on_news();
					 }else{
							 echo '<span class="posted-on"><time class="entry-date published updated" style="white-space:nowrap;">';
							 echo $date;
							 echo '</time></span>';
					 }

					 ?>


					 
		</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content d-none">
		

		<a href="<?php echo get_permalink() ?>">Link</a>

	</div><!-- .entry-content -->


</a><!-- #post-## -->
<hr>