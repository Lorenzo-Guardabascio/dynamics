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

<div class="entry-meta">
<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
<?php 

$terms = get_the_terms( $post->ID , 'topics' );
$cats = get_the_terms( $post->ID , 'categories_1' );
$category= get_the_terms($post->ID, 'category');
?>

</div><!-- .entry-meta -->

<div class="entry-meta mb-4 d-flex">
<?php 

if($terms){
	foreach ( $terms as $term ) {
			
				echo '<span class="bold">';
				echo $term->name;
				echo '</span>';
				echo '&nbsp;|&nbsp;' ;
			}
		}

		if($category && get_post_type()=="post" ){	
			foreach ( $category as $cat ) {
				echo '<span class="bold"> ';
				echo $cat->name;
				echo ' </span>';
				echo '&nbsp;|&nbsp;' ;
				}
			 }
			
	 understrap_posted_on_last();
	?>
	
	<?php 	$print_enable = htmlspecialchars_decode(get_post_meta( $post->ID, '_understrap_printable_page', true ));
				$downloadpdf_page = htmlspecialchars_decode(get_post_meta( $post->ID, '_understrap_download_page_pdf', true )); 
				$downloadppt_page = htmlspecialchars_decode(get_post_meta( $post->ID, '_understrap_download_page_ppt', true )); 
				$downloadppt1_page = htmlspecialchars_decode(get_post_meta( $id, '_understrap_download_1', true )); 
				if ( is_user_logged_in() ){
				if ( $downloadpdf_page != '' || $downloadppt_page != '' || $downloadppt1_page != '' ){ ?>
				<span class="ml-auto"></span>
					<?php if ( $downloadpdf_page != '' ){ ?>
						<a class="print-button" href="<?php  echo $downloadpdf_page ?>" download>Download PDF ></i></a>
					<?php } ?>

					<?php if (  $downloadpdf_page != '' &&( $downloadppt_page != '' || $downloadppt1_page != '') ){ ?>
						<a class="print-button">&nbsp;|&nbsp;</i></a>
					<?php } ?>
					<?php if ( $downloadppt_page != ''){ ?>
						<a class="print-button" href="<?php  echo $downloadppt_page ?>" download>Download PPT ></i></a>
					<?php } ?>
					<?php if ( $downloadppt1_page != '' ){ ?>
						<a class="print-button" href="<?php  echo $downloadppt1_page ?>" download>Download PPT ></i></a>
					<?php } ?>
			<?php 
				}elseif( $print_enable == 'on' ){ ?>

				<a class="ml-auto print-button" href="javascript:window.print()" rel="nofollow" style="color:red;" >Download PDF ></i></a>
				<?php }
				} ?>
	</div>
	<div id="single_post_tag" class="single-post-tag">
		<?php
		$posttags = get_the_tags($post->ID);
		if ($posttags) {
		  foreach($posttags as $tag) { ?>
			  
			<a href="<?php echo get_tag_link( $tag->term_id ) ?>" ><?php echo $tag->name ?></a>
			<?php 
		  }
		}
		 ?>
</div><!-- .entry-meta -->

</header><!-- .entry-header -->



	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( 
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		 );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
