<?php
/**
* Plugin Name: Event Booking
* Description: Simple Like button plugin for posts, pages, custom post types and WooCommerce products
* Version:     1.1
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

define('EVENT_BOOKING_VER','1.1');
define('EVENT_BOOKING_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
define('EVENT_BOOKING_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

add_action('wp_print_scripts', 'event_booking_register_scripts');
function event_booking_register_scripts() {
	if ( !is_admin() ) {
		wp_register_script('event_booking_script', EVENT_BOOKING_PLUGIN_DIR_URL.'assets/js/event-booking.js','',EVENT_BOOKING_VER,true);
		wp_enqueue_script('event_booking_script');
	}
	if ( is_admin() ) {
		wp_register_script('event_booking_color_script', EVENT_BOOKING_PLUGIN_DIR_URL .'assets/js/jscolor.js','',EVENT_BOOKING_VER,true);
		wp_enqueue_script('event_booking_color_script');
	}
}

add_action( 'admin_enqueue_scripts', 'event_booking_register_styles' );
add_action('wp_print_styles', 'event_booking_register_styles');
function event_booking_register_styles() {
	return;//20240611 remu: inglobato nella header con integrity checksum
	wp_register_style('fa_styles', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');	// register
	wp_enqueue_style('fa_styles');	// enqueue
}

function event_booking_inline_styles() {
	wp_enqueue_style( 'custom-style', plugins_url('assets/css/event-booking.css', __FILE__) );
	//$event_booking_button_color 			= get_option( 'event_booking_button_color', '002e62' );
	//$event_booking_button_hover_color 	= get_option( 'event_booking_button_hover_color', 'd11142' );
	//$event_booking_button_disabled_color 	= get_option( 'event_booking_button_disabled_color', '999999' );
	//$custom_css = '.event_booking_like, .bbp-reply-content .event_booking_like, .bbp-reply-content a.event_booking_like { background:#'.$event_booking_button_color.' !important; }
	//	.event_booking_like:hover, .bbp-reply-content .event_booking_like:hover, .bbp-reply-content a.event_booking_like:hover{ background:#'.$event_booking_button_hover_color.' !important; }
	//	.event_booking_like.disabled, .bbp-reply-content .event_booking_like.disabled, .bbp-reply-content a.event_booking_like.disabled { background:#'.$event_booking_button_disabled_color.' !important; }';
	//wp_add_inline_style( 'custom-style', $custom_css, true );
}
add_action( 'wp_enqueue_scripts', 'event_booking_inline_styles' );


include( EVENT_BOOKING_PLUGIN_DIR_PATH . 'inc/event-booking-functions.php');
include( EVENT_BOOKING_PLUGIN_DIR_PATH . 'inc/template/template-declaration.php');
include( EVENT_BOOKING_PLUGIN_DIR_PATH . 'custom-post-type/custom-post-type.php');
include( EVENT_BOOKING_PLUGIN_DIR_PATH . 'custom-post-type/class-event-booking-metaboxes.php');
include( EVENT_BOOKING_PLUGIN_DIR_PATH . 'custom-post-type/class-event-booking-metaboxes-function.php');


// create option page
function event_booking_admin() {  
    include('event-booking_option.php');  
}
function event_booking_admin_actions() {
	add_options_page('Event Booking', 'Event Booking', 'manage_options', 'event_booking_admin', 'event_booking_admin');
	//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '' );
	add_submenu_page(
        'edit.php?post_type=event_booking',
        'Event Booking',
        'Event Booking Options',
        'manage_options',
        'event_booking_admin',
        'event_booking_admin');
	
}
//add_action('admin_menu', 'event_booking_admin_actions');

function event_booking_admin_action_links($links, $file) {
    static $tb_plugin;
    if (!$tb_plugin) {
        $tb_plugin = plugin_basename(__FILE__);
    }
    if ($file == $tb_plugin) {
        $settings_link = '<a href="options-general.php?page=event_booking_admin">Settings</a>';
        array_unshift($links, $settings_link);
	}
    return $links;
}
add_filter('plugin_action_links', 'event_booking_admin_action_links', 10, 2);


// set default values
function event_booking_set_default_values(){
	if( ! get_option( 'event_booking_button_text' ) )
		update_option( 'event_booking_button_text', 'Like' );
	if( ! get_option( 'event_booking_button_color' ) )
		update_option( 'event_booking_button_color', '002e62' );
	if( ! get_option( 'event_booking_button_hover_color' ) )
		update_option( 'event_booking_button_hover_color', 'd11142' );
	if( ! get_option( 'event_booking_button_disabled_color' ) )
		update_option( 'event_booking_button_disabled_color', '999999' );
	if( ! get_option( 'event_booking_post_types' ) )
		update_option( 'event_booking_post_types', array('post') );
	if( ! get_option( 'event_booking_show_count' ) )
		update_option( 'event_booking_show_count', 'Yes' );
	if( ! get_option( 'event_booking_thumb_icon' ) )
		update_option( 'event_booking_thumb_icon', 'fa-thumbs-up' );
}


// activation hook
register_activation_hook( __FILE__, 'eventbooking_activate' );
function eventbooking_activate() {
	event_booking_set_default_values();
}


// de-activation hook
register_deactivation_hook( __FILE__, 'eventbooking_deactivate' );
function eventbooking_deactivate() {
	// do deactivation stuff here...
}

?>