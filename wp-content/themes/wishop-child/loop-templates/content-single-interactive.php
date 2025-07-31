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
			echo '&nbsp;|&nbsp;' ;
			global $post;
					if(!empty($post)){
						$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

						if($pageTemplate == 'case-standard.php' ){
							_e('Caso clinico ', 'understrap-child');
						}
						
						elseif( $pageTemplate=='case-interactive.php'){
							_e('Caso clinico interattivo ', 'understrap-child');
						}
					} ?>
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
							echo '<a href="'.get_tag_link( $aut->term_id ).'"> '.$aut->name.' </a>';
							}
						}else{
						echo get_author_name() ;
						}?>
				</span>
			</div><!-- .entry-meta -->

	</header><!-- .entry-header -->
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

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

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
