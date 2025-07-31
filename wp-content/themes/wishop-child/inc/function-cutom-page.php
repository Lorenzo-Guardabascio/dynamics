<?php


add_action('init', 'create_on_demand');


function create_on_demand() {
	
	

    $labels = array(
        'name'               => __('On demand' , 'on_demand'),
        'singular_name'      => __('on demand' , 'on_demand'),
        'add_new'            => __('Aggiungi on demand', 'on_demand'),
        'add_new_item'       => __('Aggiungi nuovo on demand' , 'on_demand'),
        'edit_item'          => __('Modifica on demand', 'on_demand'),
        'new_item'           => __('Nuovo on demand', 'on_demand'),
        'all_items'          => __('Tutti gli on demands', 'on_demand'),
        'view_item'          => __('Vedi on demand' , 'on_demand'),
        'search_items'       => __('Cerca on demand' , 'on_demand'),
        'not_found'          => __('Argomenti on demand Non trovato', 'on_demand'),
        'not_found_in_trash' => __('Argomento on demand Non trovato nel cestino', 'on_demand'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array('slug' => 'on_demand'),
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => 22,
        'menu_icon' 		 => 'dashicons-megaphone',
        'show_in_rest'       => true,
        'taxonomies' => array( 'categories_1','topics','post_tag'),
        'supports'           => array(
                                'title',
                                'editor',
                                'author',
                                'thumbnail',
                                'excerpt',
                                'page-attributes' 
                                ),

    );

   register_post_type('on_demand', $args);
}


add_action('init', 'create_tematic_area');


function create_tematic_area() {
	
	

    $labels = array(
        'name'               => __('Argomento aree tematiche' , 'tematic_area'),
        'singular_name'      => __('Aree tematiche' , 'tematic_area'),
        'add_new'            => __('Aggiungi Argomento aree tematiche', 'tematic_area'),
        'add_new_item'       => __('Aggiungi nuovo Argomento aree tematiche' , 'tematic_area'),
        'edit_item'          => __('Modifica Argomento aree tematiche', 'tematic_area'),
        'new_item'           => __('Nuovo argomento aree tematiche', 'tematic_area'),
        'all_items'          => __('Tutti gli argomenti aree tematiches', 'tematic_area'),
        'view_item'          => __('Vedi Argomento aree tematiche' , 'tematic_area'),
        'search_items'       => __('Cerca Argomento aree tematiche' , 'tematic_area'),
        'not_found'          => __('Argomenti aree tematiche Non trovato', 'tematic_area'),
        'not_found_in_trash' => __('Argomento aree tematiche Non trovato nel cestino', 'tematic_area'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array('slug' => 'tematic_area'),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 22,
        'menu_icon' 		 => 'dashicons-welcome-write-blog',
        'show_in_rest'       => true,
        'taxonomies' => array( 'categories_1','topics','post_tag'),
        'supports'           => array(
                                'title',
                                'editor',
                                'author',
                                'thumbnail',
                                'excerpt',
                                'page-attributes' 
                                ),

    );

   register_post_type('tematic_area', $args);
}

add_action('init', 'create_digital_event');


function create_digital_event() {
	
	

    $labels = array(
        'name'               => __('Digital Event' , 'digital_event'),
        'singular_name'      => __('Digital Event' , 'digital_event'),
        'add_new'            => __('Aggiungi Digital event', 'digital_event'),
        'add_new_item'       => __('Aggiungi nuovo Digital event' , 'digital_event'),
        'edit_item'          => __('Modifica Digital event', 'digital_event'),
        'new_item'           => __('Nuovo Digital event', 'digital_event'),
        'all_items'          => __('Tutti i Digital event', 'digital_event'),
        'view_item'          => __('Vedi Digital event' , 'digital_event'),
        'search_items'       => __('Cerca Digital event' , 'digital_event'),
        'not_found'          => __('Digital event Non trovato', 'digital_event'),
        'not_found_in_trash' => __('Digital event Non trovato nel cestino', 'digital_event'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array('slug' => 'digital_event'),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 23,
        'menu_icon' 		 => 'dashicons-welcome-write-blog',
        'show_in_rest'       => true,
        'taxonomies' => array( 'digital_categories','autor_slug','post_tag','topics'),
        'supports'           => array(
                                'title',
                                'editor',
                                'author',
                                'thumbnail',
                                'excerpt',
                                'page-attributes' 
                                ),

    );

   register_post_type('digital_event', $args);
}
add_action( 'init', 'create_digital_categories_category', 0 );
 
function create_digital_categories_category() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Categoria', 'aree general name' ),
    'singular_name' => _x( 'Categoria', 'aree singular name' ),
    'search_items' =>  __( 'Cerca Categoria' ),
    'popular_items' => __( 'Popolari Categoria' ),
    'all_items' => __( 'Tutte le Categoria' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Modifica Categoria' ), 
    'update_item' => __( 'Aggiorna Categoria' ),
    'add_new_item' => __( 'Aggiungi nuova categoria' ),
    'new_item_name' => __( 'Nome nuova categoria' ),
    'separate_items_with_commas' => __( 'Separa le Categoria on la  virgola' ),
    'add_or_remove_items' => __( 'Aggiungi o rimuovi categoria' ),
    'choose_from_most_used' => __( 'Choose from the most used Type' ),
    'menu_name' => __( 'Categoria' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('digital_categories','tematic_area',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'digital_category' ),
  ));
}


// Add the category taxonomy to the page object type
function add_categories_to_pages() {
  register_taxonomy_for_object_type('post_tag', 'page');
  register_taxonomy_for_object_type('autor_slug', 'page');
  register_taxonomy_for_object_type('autor_slug', 'post');

}

// Display categories for pages in WordPress admin
add_action( 'init', 'add_categories_to_pages' );