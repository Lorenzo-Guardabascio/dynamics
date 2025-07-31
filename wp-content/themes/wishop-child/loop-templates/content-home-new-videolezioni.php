<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<article <?php post_class('col-12');?> id="post-<?php the_ID();?>">
        <a href="<?php echo the_permalink(); ?>">
                <div class="container">
                        <div class="row">
                                <div class="col-12 col-md-6">
                                <div class="last-content">

<header class="entry-header">
        <?php
        

        $categories = get_the_category();

        if (!empty($categories)) {
        echo esc_html($categories[0]->name);
        }
        ?>

        <h2>
                <?php
                echo substr(get_the_title(), 0, 106);
                echo (strlen(get_the_title()) < 106) ? "" : "...";
                ?>

        </h2>
</header><!-- .entry-content -->

<div class="entry-content">

        <?php
                if ($post->post_excerpt) {
                $estract_content = $post->post_excerpt;
                } else {
                $estract_content = get_the_content();
                }?>


        <p class="entry-title"><?php echo $article_text ?>
                <?php echo substr(wp_strip_all_tags($estract_content), 0, 500); ?> ...
        </p>

</div><!-- .entry-header -->
<footer>

        <span class="author-span">

                <?php
                $auts = get_the_terms($post->ID, 'autor_tax');
                if ($auts) {
                foreach ($auts as $aut) {
                        echo $aut->name;
                }
                } else {
                echo get_author_name();
                }?>
        </span>

        <div class="entry-meta">

                <?php 
                        $terms = get_the_terms($post->ID, 'topics');
                        $cats = get_the_terms($post->ID, 'categories_1');

                        foreach ($terms as $term) {
                        echo '<span class="bold" >';
                        echo $term->name;
                        echo '</span>';
                        echo '&nbsp;|&nbsp;';
                        }
                        /*
                        if ($cats) {
                        foreach ($cats as $cat) {
                                echo '&nbsp;|&nbsp;';
                                echo '<span >';
                                echo $cat->name;
                                echo '</span>';
                        }
                        }*/
                        understrap_posted_on_last();
                        ?>


        </div><!-- .entry-meta -->
</footer>
</div>
                                </div>
                                <div class="col-12 col-md-6"><?php echo get_the_post_thumbnail(); ?></div>
                                
                        </div>
                </div>
        </a>
</article><!-- #post-## -->