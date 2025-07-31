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
        <a href="<?php echo the_permalink(); ?>">
        <div class="last-content">
                <div class="entry-meta">

                        <?php understrap_posted_on_last(); ?>

                </div><!-- .entry-meta -->
                <header class="entry-header">

                        <?php
                $categories = get_the_category();
 
                if ( ! empty( $categories ) ) {
                    echo esc_html( $categories[0]->name );   
                }
                 ?>
                </header><!-- .entry-content -->

                <div class="entry-content">
                
                <?php
                /*
                 if($post->post_excerpt){
                        $estract_content= $post->post_excerpt;
                }else{
                        $estract_content= get_the_content();
                } 
                 $article_contet= wp_strip_all_tags($estract_content); 
                       $article_text= substr($article_contet, 0, 104); ?>
                        <p><?php echo $article_text ?>...</p>
                        <?php */ 
                        echo '<p class="entry-title ">';
                        if($post->post_excerpt){
                                echo $post->post_excerpt;
                        }else{
                                echo substr(get_the_title( ), 0, 106);
                        } 
                        echo '...</p>';
                        ?>



                </div><!-- .entry-header -->
        </div>
        </a>
</article><!-- #post-## -->