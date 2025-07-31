<?php
/**
 * The template for looping through services's post and displaying their content.
 *
 */

wp_reset_query();

//$parent = get_the_post();
// featured pages
$args = array(
    'post_type' => get_post_type(),
    'post_parent' => 0,
    'meta_query' => array(
        array(
            'key' => '_' . get_post_type() .'_featured',
            'value' => '1',
            'compare' => '='
        )
    ),
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => 6,
    'update_post_meta_cache' => false
);

$query = new WP_Query($args);

if( $query->have_posts() ) {
    echo '<div class="separator"></div>';
    echo '<span class="title-feature text-color">ACCESSO RAPIDO</span>';
	echo '<div class="featured">';
    echo '<div class="row row-001">';

    while( $query->have_posts() ) {
        $query->the_post();
        //$img_url = get_the_post_thumbnail_url(get_the_ID(), 'portfolio-thumb');
        $img_url = wp_get_attachment_image_src(get_post_meta(get_the_ID(), '_'. get_post_type() .'_header_image_id', true), 'thumbnail');
        if($img_url !== false)
            $img_url = $img_url[0];
        else
            $img_url = get_the_post_thumbnail_url(get_post(), 'thumbnail');

        $ext = '';
        if($img_url)
            $ext .= pathinfo($img_url, PATHINFO_EXTENSION);

        echo '<div class="col-sm-12 col-md-4">';
        echo '<div class="card ">';
		echo '<div class="card-body">';
        echo '<h5 class="card-title text-center text-color">'. get_the_title() .'</h5>';
        echo '<div class="image"><img class="card-img-top svg-color '. $ext .'" src="'. esc_url($img_url) .'" alt="Card image cap"></div>';
        echo '<p class="card-text ">'.get_post_meta( get_the_ID(), '_'. get_post_type() . '_subtitle', true ).'</p>';
		echo '</div>';
        echo '<div class="card-footer bg-transparent">';
        echo '<a href="'. get_the_permalink() .'" class="btn btn-outline-danger w-100 text-color border-color">'. __('Leggi di più', 'understrap-child' ). '</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div> <!--- end card deck --->';
 	echo '</div> <!--- end container --->';
}

wp_reset_query();
