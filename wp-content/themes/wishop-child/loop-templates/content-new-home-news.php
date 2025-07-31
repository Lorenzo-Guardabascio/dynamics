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

<article <?php post_class('col-12 '); ?> id="post-<?php the_ID(); ?>">

        <a href="<?php echo the_permalink(); ?>" <?php if($args->section && $args->section == 'd_e'  ){ echo " class='container'"; } ?>>
                <div class="row" >
                        <div class="col-12" >
                                <div class="entry-content">
                                        

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

                                </div><!-- .entry-content -->
                                <div class="entry-meta">
                                <?php 
                                //$cats = get_the_category();
                                //foreach ( $cats as $cat ): 
                                if($args->section && $args->section == 'd_e'  ){
                                        echo '<span class="bold">';
                                        _e('Digital Events', 'Understrap');
                                        echo '</span>&nbsp;|&nbsp;';
                                }else{
                                        echo '<span class="bold">';
                                        _e('News', 'Understrap') ;
                                        echo '</span>&nbsp;|&nbsp;';
                                }
                                ?>
                                
                                <?php //endforeach;
                                 understrap_posted_on_news(); ?>
                                
                                </div><!-- .entry-meta -->
                        </div>
                </div>
        </a>

</article><!-- #post-## -->