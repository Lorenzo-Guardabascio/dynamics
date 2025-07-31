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

<article <?php post_class('col-6'); ?> id="post-<?php the_ID(); ?>">

        <a href="<?php echo the_permalink(); ?>">
                <div class="row" >
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
                                <div class="entry-meta digital" style="background-color: #952464; color:#fff !important">
                                                
                                        <?php 
                                         $date ="";

                                         if (!$id) {
                                                $id = get_the_ID();
                                            }

                                        $date = htmlspecialchars_decode(get_post_meta($id, '_digital_event_date', true));
                                        if ($date==""){
                                                understrap_posted_on_news();
                                        }else{
                                                echo '<span class="posted-on"><time class="entry-date published updated" style="white-space:nowrap;    text-transform: uppercase;">';
                                                $dateresults = explode( " ",$date );
                                                foreach ($dateresults as $dateresult ){
                                                        echo "<p style='margin: 0 auto'> $dateresult  </p>";
                                                }
                                                echo '</time></span>';
                                        }
                                        
                                         ?>

                                </div><!-- .entry-meta -->
                                <div class="entry-content" style="background-color: #F2F2F2; height:100%">
                                        <?php 
                                        
                                        $cats = '';
                                        if(get_the_terms( $post->ID , 'digital_categories' )){
                                                $cats = get_the_terms( $post->ID , 'digital_categories' );
                                        }
                                        
                                        foreach ( $cats as $cat ): ?>
                                        <h2 ><?php echo $cat->name; ?></h2>
                                        <?php endforeach;

                
                                        /*
                                         if($post->post_excerpt){
                                                $estract_content= $post->post_excerpt;
                                        }else{
                                                $estract_content= get_the_content();
                                        } ?>
                                        < ?php $article_contet= wp_strip_all_tags($estract_content); ? >
                                        < ?php $article_text= substr($article_contet, 0, 100); ? >
                                        <p class="entry-title" ><?php echo $article_text ?>...</p>
                                        <?php */ the_title( '<h1 class="entry-title mt-4">', '</h1>' );
                                        //the_excerpt(); ?>

                                </div><!-- .entry-content -->
                        </div>
                </div>
        </a>

</article><!-- #post-## -->