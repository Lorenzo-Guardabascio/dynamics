<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if (!$id) {
	$id = get_the_ID();
}

$ended = htmlspecialchars_decode(get_post_meta($id, 'event_booking_event_end', true)); 
if($ended == "on"){
?>

<article <?php post_class('container'); ?> id="post-<?php the_ID(); ?>">

<div class="row event-booking-loop" >
	<div class="col-12" >
	<style>
	.home-page .news-container .container-news .article-news article a .row .col-12 .entry-meta.digital .posted-on {
			text-align: center;
			padding: 2rem;
	}
	.home-page .news-container .container-news .article-news article a .row .col-12 .entry-meta.digital .posted-on .entry-date{
			color: #fff;
	}
	</style>

	<?php
		$speacker = htmlspecialchars_decode(get_post_meta($id, 'event_booking_event_image', true)); 
		?>
		<div class="entry-meta tab-image-event-booking" style="background-image:url(<?php echo $speacker ?>);"></div><!-- .entry-meta -->

			
			<div class="entry-content entry-content-event-booking" style="height:100%">
					
					<?php 
						$event_date= htmlspecialchars_decode(get_post_meta( $id, 'event_booking_event_time', true ));
						$event_hour= htmlspecialchars_decode(get_post_meta( $id, 'event_booking_event_hour', true )); 
						$event_cf7 =  get_option('wisho_op_theme_reference_cf7'); 
					?>
					<span class="author-span">

							<?php
							echo $event_date;
							echo '&nbsp;|&nbsp;ore ';
							echo $event_hour;
								_e('&nbsp;|&nbsp;30 minuti con ', 'understrap-child');
							$auts = get_the_terms( $post->ID , 'autor_tax' );
							
							if ($auts){
								foreach ( $auts as $aut ) {
									echo '<a href="'. get_tag_link( $aut->term_id ).'" class="red-terms">'. $aut->name.'</a>';
									}
								}?>
						</span>
					<?php 
					/*
						if($post->post_excerpt){
							$estract_content= $post->post_excerpt;
					}else{
							$estract_content= get_the_content();
					} ?>
					< ?php $article_contet= wp_strip_all_tags($estract_content); ? >
					< ?php $article_text= substr($article_contet, 0, 100); ? >
					<p class="entry-title" ><?php echo $article_text ?>...</p>
					<?php */ the_title( '<h1 class="entry-title">', '</h1>' );
					//the_excerpt(); ?>
					<?php echo event_booking_loop_ended(); ?>

			</div><!-- .entry-content -->
	</div>
	
	<div class="w-100"></div>
</div>


</article><!-- #post-## -->
<hr class="hr-booking">
<?php } ?>