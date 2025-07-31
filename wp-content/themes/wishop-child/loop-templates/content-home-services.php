<?php
/**
 * The template for looping through services's post and displaying their content.
 *
 */

$exclude = array();

// featured pages
$args = array(
        'post_type' => 'page',
        'meta_query' => array(
                array(
                        'key' => '_understrap_show_in_homepage_as_team',
                        'value' => 'on',
                        'compare' => '='
                )
        ),
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => 8,
        'update_post_meta_cache' => false
);

$query = new WP_Query($args);

if( $query->have_posts() ) {
    echo '<div class="team-section row">';
    echo '<div class="container" id="content" tabindex="-1">';
    echo '<h3 class="col-12">IL NOSTRO TEAM</h3>';

    while( $query->have_posts() ) {
        $query->the_post();
        $img_url = get_the_post_thumbnail_url(get_the_ID());
        echo '<div class="col-12 col-md-6 col-lg-3 text-center">';
        echo '<div class="team-img" style="background-image: url('.$img_url.');" > </div>';
        echo '<h5>'. get_the_title() .'</h5>';
        echo '<h6>'. get_post_meta( get_the_ID(), '_understrap_post_spec', true ) .'</h6>';
        echo '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#info'.get_the_ID().'" aria-expanded="false" aria-controls="info'.get_the_ID().'">';
        echo 'Info';
        echo '<img src="'. get_stylesheet_directory_uri() .'/images/team.svg" > ';
        echo '</button>';
        echo '<div class="collapse" id="info'.get_the_ID().'">';
        echo '<div class="team-text">';
        echo '<div>'. get_the_content( get_the_ID()) .'</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
}

wp_reset_query();