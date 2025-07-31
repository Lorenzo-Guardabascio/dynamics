<?php

/**
 * Create the Page meta boxes
 */

add_action('add_meta_boxes', 'understrap_metabox_pages');
function understrap_metabox_pages()
{
    $meta_box = array(
        'id' => 'understrap-metabox-page-template-template-home',
        'title' => __('Home Page Settings', 'understrap'),
        'description' => __('This info will appear in the "Additional Details" section of the home page', 'understrap'),
        'page' => ['page', 'tematic_area', 'post'],
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(),
    );

    global $post;
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

    if ($pageTemplate == 'child-home.php') {
        $meta_box['fields'] = array_merge($meta_box['fields'], add_home_meta());
    }

    if ($pageTemplate == 'child-sub-macro-aree.php' || $pageTemplate == 'child-sub-macro-aree-img.php'|| $pageTemplate == 'child-sub-macro-aree-ondem.php') {
        $meta_box['fields'] = array_merge($meta_box['fields'], add_sub_macro_meta());
    }

    if ($post->post_type != 'post' || $post->post_type != 'digital_event') {

        $meta_box['fields'] = array_merge($meta_box['fields'], understrap_number_home_page_template());
    }

    if ($post->post_type == 'tematic_area') {

        $meta_box['fields'] = array_merge($meta_box['fields'], add_tematic_area_meta());
    }

    if ($post->post_type == 'tematic_area' || $post->post_type == 'post' || $post->post_type == 'page') {

        $meta_box['fields'] = array_merge($meta_box['fields'], download_meta_pdf());
    }

    if ($post->post_type == 'tematic_area' || $post->post_type == 'post' || $post->post_type == 'page') {

        $meta_box['fields'] = array_merge($meta_box['fields'], left_navigation_bar());
    }
    /*
    if ($post->post_type == 'digital_event') {

        $meta_box['fields'] = array_merge($meta_box['fields'], digital_event_meta());
    }*/

    understrap_add_meta_box($meta_box);
}

add_action('add_meta_boxes', 'understrap_metabox_de');
function understrap_metabox_de()
{
    $meta_box = array(
        'id' => 'understrap-metabox-page-template-template-home',
        'title' => __('Data digital event', 'understrap'),
        'description' => __('data di riferimento', 'understrap'),
        'page' => ['digital_event'],
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(),
    );

    global $post;
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

    
    if ($post->post_type == 'digital_event') {

        $meta_box['fields'] = array_merge($meta_box['fields'], digital_event_meta());
    }

    understrap_add_meta_box($meta_box);
}

function understrap_number_home_page_template()
{
    return array(
        array(
            'name' => __('Immagine alternativa home', 'understrap'),
            'id' => '_understrap_post_alt_image',
            'type' => 'file',
            'std' => '',
        ),
        array(
            'name' => __('Data in front-end', 'understrap'),
            'desc' => __('Insert the shortcode for show the slider in homepage.', 'understrap'),
            'id' => '_understrap_show_in_homepage_date',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Title front-end', 'understrap'),
            'desc' => __('Insert the shortcode for show the slider in homepage.', 'understrap'),
            'id' => '_understrap_show_in_homepage_title',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Slider Shortcode', 'understrap'),
            'desc' => __('Insert the shortcode for show the slider in homepage.', 'understrap'),
            'id' => '_understrap_show_in_homepage_slider_shortcode',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Sottotitolo', 'understrap'),
            'desc' => __('Insert subtitle of page', 'understrap'),
            'id' => '_understrap_show_in_page_sub_title',
            'type' => 'text',
            'std' => '',
        ),
    );

}

function add_home_meta()
{
    return array(
        array(
            'name' => __('Testo in header', 'understrap'),
            'id' => '_understrap_post_header_text',
            'type' => 'textarea',
            'std' => '',
        ),
        array(
            'name' => __('Titolo in header', 'understrap'),
            'id' => '_understrap_post_header_title',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Sottotitolo in header', 'understrap'),
            'id' => '_understrap_post_header_subtitle',
            'type' => 'text',
            'std' => '',
        ),

    );
}
function add_sub_macro_meta()
{
    return array(
        array(
            'name' => __('Barra laterale', 'understrap'),
            'desc' => __('Inserire lo slug della categoria.', 'understrap'),
            'id' => '_understrap_sidebar_in_page',
            'type' => 'checkbox',
            'std' => '',
        ),
        array(
            'name' => __('Categoria genitore', 'understrap'),
            'desc' => __('Inserire lo slug della categoria.', 'understrap'),
            'id' => '_understrap_post_category_in_page',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Tag degli argomenti', 'understrap'),
            'desc' => __('Inserire lo slug del tag.', 'understrap'),
            'id' => '_understrap_post_tag_in_page',
            'type' => 'text',
            'std' => '',
        ),

    );
}

function add_tematic_area_meta()
{
    return array(
        array(
            'name' => __('File 1', 'understrap'),
            'desc' => __('File pdf', 'understrap'),
            'id' => '_understrap_download_1',
            'type' => 'file',
            'std' => '',
        ),
        array(
            'name' => __('File 2', 'understrap'),
            'desc' => __('File PPT', 'understrap'),
            'id' => '_understrap_download_2',
            'type' => 'file',
            'std' => '',
        ),

    );
}
function download_meta_pdf()
{
    return array(
        array(
            'name' => __('Abilitare la stampa generata automaticamente dal browser', 'understrap'),
            'desc' => __('Stampabile', 'understrap'),
            'id' => '_understrap_printable_page',
            'type' => 'checkbox',
            'std' => '',
        ),
        array(
            'name' => __('File da allegare per la stampa', 'understrap'),
            'desc' => __('File pdf', 'understrap'),
            'id' => '_understrap_download_page_pdf',
            'type' => 'file',
            'std' => '',
        ),
        array(
            'name' => __('File ppt da allegare per la stampa', 'understrap'),
            'desc' => __('File ppt', 'understrap'),
            'id' => '_understrap_download_page_ppt',
            'type' => 'file',
            'std' => '',
        ),

    );
}
function digital_event_meta()
{
    return array(
        array(
            'name' => __('Data', 'understrap'),
            'desc' => __('Link Webcast', 'understrap'),
            'id' => '_digital_event_date',
            'type' => 'text',
            'std' => '',
        ),
    );
}

function left_navigation_bar()
{
    return array(
        array(
            'name' => __('Pagina Patologie', 'understrap'),
            'desc' => __('Nome pagina', 'understrap'),
            'id' => '_left_navigation_bar_patologie',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Link Patologie', 'understrap'),
            'desc' => __('Link', 'understrap'),
            'id' => '_left_navigation_bar_patologie_link',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Pagina Medicina di Laboratorio', 'understrap'),
            'desc' => __('Nome pagina', 'understrap'),
            'id' => '_left_navigation_bar_medicine',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Link Medicina di Laboratorio', 'understrap'),
            'desc' => __('Link', 'understrap'),
            'id' => '_left_navigation_bar_medicine_link',
            'type' => 'text',
            'std' => '',
        ),

        array(
            'name' => __('Pagina casi clinici', 'understrap'),
            'desc' => __('Nome pagina', 'understrap'),
            'id' => '_left_navigation_bar_casi',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Link casi clinici', 'understrap'),
            'desc' => __('Link', 'understrap'),
            'id' => '_left_navigation_bar_casi_link',
            'type' => 'text',
            'std' => '',
        ),

        array(
            'name' => __('Pagina Immagini Commentate', 'understrap'),
            'desc' => __('Nome pagina', 'understrap'),
            'id' => '_left_navigation_bar_immagini',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Link Immagini Commentate', 'understrap'),
            'desc' => __('Link', 'understrap'),
            'id' => '_left_navigation_bar_immagini_link',
            'type' => 'text',
            'std' => '',
        ),

        array(
            'name' => __('Pagina Hot Topics', 'understrap'),
            'desc' => __('Nome pagina', 'understrap'),
            'id' => '_left_navigation_bar_topic',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Link Hot Topics', 'understrap'),
            'desc' => __('Link', 'understrap'),
            'id' => '_left_navigation_bar_topic_link',
            'type' => 'text',
            'std' => '',
        ),
        
        array(
            'name' => __('Pagina Interattività', 'understrap'),
            'desc' => __('Nome pagina', 'understrap'),
            'id' => '_left_navigation_bar_interactivity',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Interattività', 'understrap'),
            'desc' => __('Link', 'understrap'),
            'id' => '_left_navigation_bar_interactivity_link',
            'type' => 'text',
            'std' => '',
        ),
        //new
                
        array(
            'name' => __('Pagina update', 'understrap'),
            'desc' => __('Nome pagina', 'understrap'),
            'id' => '_left_navigation_bar_update',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Update', 'understrap'),
            'desc' => __('Link', 'understrap'),
            'id' => '_left_navigation_bar_update_link',
            'type' => 'text',
            'std' => '',
        ),
                
        array(
            'name' => __('Pagina Slidekit', 'understrap'),
            'desc' => __('Nome pagina', 'understrap'),
            'id' => '_left_navigation_bar_slidekit',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Slidekit', 'understrap'),
            'desc' => __('Link', 'understrap'),
            'id' => '_left_navigation_bar_slidekit_link',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Pagina Podcast', 'understrap'),
            'desc' => __('Nome pagina', 'understrap'),
            'id' => '_left_navigation_bar_podcast',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => __('Podcast', 'understrap'),
            'desc' => __('Link', 'understrap'),
            'id' => '_left_navigation_bar_podcast_link',
            'type' => 'text',
            'std' => '',
        ),
    );
}
