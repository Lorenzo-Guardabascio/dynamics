<?php
/**
 * The template for looping through services's post and displaying their content.
 *
 */

wp_reset_query();

$exclude = array();
$args = array(
    'post_type' => get_post_type(),
    'post_parent' => 0,
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => '_' . get_post_type() .'_archive_description',
            'value' => '1',
            'compare' => '!='
        ),
        array(
            'key' => '_' . get_post_type() .'_featured',
            'value' => '1',
            'compare' => '!='
        ),
        array(
            'relation' => 'AND',
            array(
                'key' => '_' . get_post_type() .'_archive_description',
                'compare' => 'NOT EXISTS'
            ),
            array(
                'key' => '_' . get_post_type() .'_featured',
                'compare' => 'NOT EXISTS'
            )
        )
    ),
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => 6,
    'update_post_meta_cache' => false
);
$query = new WP_Query($args);
//echo "Last SQL-Query: {$query->request}";

if( $query->have_posts() ) {
    echo '<div class="separator"></div>';
    echo '<span class=" title-activity text-color">ATTIVITA MEDICA E DIAGNOSTICA</span>';
	echo '<table class="table table-striped table-responsive-sm ">';
    echo '<thead>';
    echo '<tr class="" >';
    echo '<th scope="col" class=" table-bg-color table-border-color">ambulatorio</th>';
    echo '<th scope="col" class=" table-bg-color table-border-color">attività svolta</th>';
    echo '<th scope="col" class=" table-bg-color table-border-color">percorso pubblico</th>';
    echo '<th scope="col" class=" table-bg-color table-border-color">percorso privato</th>';
    echo '<th scope="col" class=" table-bg-color table-border-color">dettagli</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $i=0;
    while( $query->have_posts() ) {
        $query->the_post();
        $class = 'table-bg-color-2';
        if($i%2)
            $class = 'table-bg-color';

        $i++;
        echo '<tr class="'.$class.'">';
        echo '<td scope="row" class=" table-border-color">'. get_the_title() .'</td>';
		echo '<td scope="row" class=" table-border-color">'.'<ul><li>RX Tradizionale</li><li>Ecografie</li></ul></td>';
        echo '<td scope="row" class=" table-border-color">'.'<ul><li>Convenzionato</li></ul></td>';
        echo '<td scope="row" class=" table-border-color">'.'<ul><li>Privato Agevolato</li><li>Libera Professione</li></ul></td>';
        echo '<td scope="row" class=" table-border-color"><a href="' . get_the_permalink() . '"><img class="svg svg-color" src="'. get_stylesheet_directory_uri() .'/images/arrow.svg"/></a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
	echo '</table> <!--- end table --->';

}

wp_reset_query();
