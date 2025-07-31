<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
//start new block
if(!$id){
	$id = get_the_ID();
}
?>
<article <?php post_class(); ?> id="post-
<?php the_ID(); ?>">
<header class="entry-header">

<div class="entry-meta">
<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
<?php 

	$terms = get_the_terms( $post->ID , 'topics' );
	$cats = get_the_terms( $post->ID , 'categories_1' );
	
?>
	<span class="author-span d-none">
		<?php _e('A cura di ', 'understrap-child');
		$auts = get_the_terms( $post->ID , 'autor_tax' );
		
		if ($auts){
			foreach ( $auts as $aut ) {
				echo '<a href="'.get_tag_link( $aut->term_id ).'"> '.$aut->name.' </a>';
				}
			}else{
			echo get_author_name() ;
			}?>
	</span>
</div><!-- .entry-meta -->

<div class="entry-meta mb-4 d-flex">
			
<span class="bold">Digital Events </span>&nbsp;|&nbsp; 
<?php 

/*if($terms){
foreach ( $terms as $term ) {
		
			echo '<span class="bold">';
			echo $term->name;
			echo '</span>';
			echo '&nbsp;|&nbsp;' ;
		}
	}

	if($cats){	
		foreach ( $cats as $cat ) {
			echo '<span class="bold"> ';
			echo $cat->name;
			echo ' </span>';
			echo '&nbsp;|&nbsp;' ;
			}
		 }*/
		 $date = htmlspecialchars_decode(get_post_meta($id, '_digital_event_date', true));
			if ($date==""){
					understrap_posted_on_news();
			}else{
					echo '<span class="posted-on"><time class="entry-date published updated" style="white-space:nowrap;    text-transform: uppercase;">';
					$dateresults = explode( " ",$date );
					
							echo $date ;
					
					echo '</time></span>';
			}
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

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
<?php
$de_meta = get_post_meta($id, 'de_meta', true);
if (isset($de_meta) && is_array($de_meta)) {
		$i = 1;
		$output = '';

		foreach ($de_meta as $text) {
			if ( isset($text['is_title']) ){
			$is_title = $text['is_title'];// 'on'
			}else{
				$is_title = '';
			}
			$title = $text['title'];
			$autor = $text['autor'];
			$webcast = $text['webcast'];
			$diapo = $text['diapo'];
			$i++;
			if($is_title !='' && $is_title =='on'){
				echo '<hr><h3 class="red-terms font-weight-bold" style="margin-bottom:2rem; margin-top:2rem;  text-transform: uppercase;">'.$title.' </h3>';
			}else{
			?>


				<article>
				<header class="entry-header">

					<div class="entry-meta d-none">
					</div>

				</header>

					<div class="entry-content">
						<h2 class="entry-title">
							<?php
							echo $title
							?>
						</h2>
						<span class="author-span">
								<?php _e('A cura di ', 'understrap-child');
								echo $autor;
								?>
							</span>
					<br>
						<!---a href="<?php //echo get_permalink() ?>" class="red-terms">Link</-a--->
						<?php
							if($webcast != ''){ ?>
								<a
								class="vid htmlvid red-terms"
								style="color: #961747;cursor: pointer;"
								vidSrc="<?php echo $webcast ?>"
								>Webcast</a>
							<?php }

							if($webcast != '' && $diapo != ''){ ?> - <?php } ?>

						<?php
							if($diapo != '') { ?>
								<a href="<?php echo $diapo?>" class="red-terms">Diapositive</a>
							<?php } ?>

					</div><!-- .entry-content -->
					
				</article><!-- #post-## -->
			<?php 
		}
		?> <br> <?php
		}
	}
		//end new block
?>

