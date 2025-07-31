<?php 
add_action('init', 'events_booking');
function events_booking()
    {
        $args = [
            'label' => esc_html__('Events Booking', 'text-domain'),
            'labels' => [
                'menu_name' => esc_html__('Events Booking', 'event_booking'),
                'name_admin_bar' => esc_html__('Event Booking', 'event_booking'),
                'add_new' => esc_html__('Add Event Booking', 'event_booking'),
                'add_new_item' => esc_html__('Add new Event Booking', 'event_booking'),
                'new_item' => esc_html__('New Event Booking', 'event_booking'),
                'edit_item' => esc_html__('Edit Event Booking', 'event_booking'),
                'view_item' => esc_html__('View Event Booking', 'event_booking'),
                'update_item' => esc_html__('View Event Booking', 'event_booking'),
                'all_items' => esc_html__('All Events Booking', 'event_booking'),
                'search_items' => esc_html__('Search Events Booking', 'event_booking'),
                'parent_item_colon' => esc_html__('Parent Event Booking', 'event_booking'),
                'not_found' => esc_html__('No Events Booking found', 'event_booking'),
                'not_found_in_trash' => esc_html__('No Events Booking found in Trash', 'event_booking'),
                'name' => esc_html__('Events Booking', 'event_booking'),
                'singular_name' => esc_html__('Event Booking', 'event_booking'),
            ],
            'public' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            //'capability_type'     => 'custom',
            'hierarchical' => true,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite_no_front' => false,
            'show_in_menu' => true,
            'menu_position' => 10,
            'menu_icon' => 'dashicons-book',
            'supports' => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'page-attributes',
            ],

            'rewrite' => true,
        ];

        register_post_type('event_booking', $args);
    }
/**
 * Create Tax Products Categories
 */

add_action('init', 'create_class_event_booking');
function create_class_event_booking()
    {

        $labels = array(
            'name' => __('Cartegory', 'event_booking'),
            'singular_name' => __('Cartegory', 'event_booking'),
            'add_new_item' => __('Add category', 'event_booking'),
            'edit_item' => __('Modifica cartegoria', 'event_booking'),
            'new_item_name' => __('Nuovo cartegoria', 'event_booking'),
            'all_items' => __('Tutti i cartegoria', 'event_booking'),
            'search_items' => __('Cerca cartegoria', 'event_booking'),
            'update_item' => __('Agiorna cartegoria', 'event_booking'),
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'query_var' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array('slug' => 'event_booking_category', 'hierarchical' => true), //rewrite the tax permalink structure
        );

        register_taxonomy('event_booking_category', 'event_booking', $args);
    }