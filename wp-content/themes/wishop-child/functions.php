<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
require get_theme_file_path('inc/libs/admin-metaboxes.php');
require get_theme_file_path('inc/meta/page-metaboxes.php');
require get_theme_file_path('inc/meta/digital_event_metabox.php');
require get_theme_file_path('inc/customizer.php');
require get_theme_file_path('inc/theme-settings.php');
require get_theme_file_path('inc/setup.php');
require get_theme_file_path('inc/function-article.php');
require get_theme_file_path('inc/new-function.php');
require get_theme_file_path('inc/function-modal.php');
require get_theme_file_path('inc/backhand_admin_settings/setting_page.php');
require get_theme_file_path('inc/function-shortcode.php');
require get_theme_file_path('inc/function-cutom-page.php');
require get_theme_file_path('inc/child-wp-bootstrap-navwalker.php');

add_filter('ai1wm_exclude_content_from_export', function($exclude_filters) {
    $exclude_filters[] = 'themes/wishop-child/node_modules';
    return $exclude_filters;
  });

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script('slick-slider-js', get_stylesheet_directory_uri() . '/js/slick.min.js', array('jquery'), '', true );
    wp_enqueue_script('BigPicture', get_stylesheet_directory_uri() . '/js/BigPicture.js', array('jquery'), '', true );
	wp_enqueue_script('CookieCheckRemu', '/_cookie/cookiecheck-noga.js', array(), '1', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

function understrap_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Right Sidebar', 'understrap' ),
            'id'            => 'right-sidebar',
            'description'   => __( 'Right sidebar widget area', 'understrap' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Left Sidebar', 'understrap' ),
            'id'            => 'left-sidebar',
            'description'   => __( 'Left sidebar widget area', 'understrap' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Right menu', 'understrap' ),
            'id'            => 'right-menu',
            'description'   => __( 'Right menu widget area', 'understrap' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    
	register_sidebars(3, array(
		'name' => __('Footer Column %d', 'understrap'),
		'id' => 'footer-column',
		'before_widget' => '<div id="%1$s" class="widget-footer  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="d-none widget-title">',
		'after_title' => '</h3>',
	));
    
    register_sidebar(
        array(
            'name'          => __( 'Right-sidebar-event', 'understrap' ),
            'id'            => 'right-sidebar-event',
            'description'   => __( 'Right menu widget area', 'understrap' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Right-sidebar-event-rep', 'understrap' ),
            'id'            => 'right-sidebar-event-rep',
            'description'   => __( 'Right menu widget area rep', 'understrap' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Right-sidebar-ondem-q', 'understrap' ),
            'id'            => 'right-sidebar-ondem-q',
            'description'   => __( 'Right menu on dem q', 'understrap' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Right-sidebar-ondem-a', 'understrap' ),
            'id'            => 'right-sidebar-ondem-a',
            'description'   => __( 'Right menu on dem a', 'understrap' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Right-sidebar-podcas', 'understrap' ),
            'id'            => 'right-sidebar-podcast',
            'description'   => __( 'Right menu widget area podcast', 'understrap' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Right-sidebar-on dmeand', 'understrap' ),
            'id'            => 'right-sidebar-on-demand',
            'description'   => __( 'Right menu widget area on-demand', 'understrap' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}

function get_archive_post_type() {
    return is_archive() ? get_queried_object()->name : false;
}

function understrap_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'understrap_first_and_last_menu_class');

function understrap_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'understrap_mime_types');

function hex_to_rgb($hex) {
    return sscanf(strtolower(trim($hex)), "#%02x%02x%02x");
}

add_action( 'mb_relationships_init', function() {
    MB_Relationships_API::register( array(
        'id'   => 'isola_tiberina_to_ospedale',
        'from' => 'isola_tiberina',
        'to'   => 'ospedale',
    ) );
} );

//add filter like category


add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, $wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( '_cat__like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.category_name LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}


if ( ! function_exists( 'understrap_change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function understrap_change_logo_class( $html ) {

		$html = str_replace( 'class="custom-logo"', 'class="site-logo"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
		$html = str_replace( 'alt=""', 'title="Home" alt="logo"', $html );

		return $html;
	}
}
//Backhand style settings
add_action('admin_head', 'my_custom_backhand');

function my_custom_backhand() {
  echo '<style>
  .wp-block{
	  max-width:unset;
  }
  .components-responsive-wrapper__content{
	  position :relative;
  }
  #_understrap_post_header_text{
  width:100%;
  }
  .editor-post-featured-image__preview .components-responsive-wrapper>div{
    padding-bottom:0 !important;
}
  </style>';
}
//end custom backhand


//Funzione da disabilitare
// una volta fatto l'upload dei file necessari
define( 'ALLOW_UNFILTERED_UPLOADS', true );

if ( ! function_exists( 'understrap_social_icon' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
function understrap_social_icon() {
		
        // Facebook
        $facebook_url = get_theme_mod('understrap_child_facebook_url', '');
        if( isset($facebook_url) && $facebook_url) {
            echo '<a href="'. filter_var( $facebook_url, FILTER_SANITIZE_URL ) .'" target="_blank" class="facebook" title="Follow on Facebook">';
            echo '<span class="dyn-facebook-square-brands"></span>';
            echo '</a>';
        }
        
        //Twitter
        $twitter_url = get_theme_mod('understrap_child_twitter_url', '');
        if( isset($twitter_url) && $twitter_url) {
            echo '<a href="'. filter_var( $twitter_url, FILTER_SANITIZE_URL ).'" target="_blank" class="twitter" title="Follow on Twitter">';
            echo '<span class="dyn-twitter-square-brands"></span>';
            echo '</a>';
        }
        
        // LinkedIn
        $linkedin_url = get_theme_mod('understrap_child_linkedin_url', '');
        if( isset($linkedin_url) && $linkedin_url) {
            echo '<a href="'. filter_var( $linkedin_url, FILTER_SANITIZE_URL).'" target="_blank" class="linkedin" title="Follow on Linkedin">';
            echo '<span class="dyn-linkedin-brands"></span>';
            echo '</a>';
        }
        
        // Youtube
        $youtube_url = get_theme_mod('understrap_child_youtube_url', '');
        if( isset($youtube_url) && $youtube_url) {
            echo '<a href="'. filter_var( $youtube_url, FILTER_SANITIZE_URL ) .'" target="_blank" class="youtube" title="Follow on Youtube">';
            echo '<span class="dyn-youtube-square-brands"></span>';
            echo '</a>';
        }
        
        // E-Mail
        $mail = get_theme_mod('understrap_child_email', '');
        if( isset($mail) && $mail) {
            echo '<a href="mailto:'. $mail .'" class="mail" title="Send mail">';
            echo '<img src="'. get_stylesheet_directory_uri() .'/images/mail.svg" alt="" />';
            echo '</a>';
        }
        
        // RSS
        $rss_url = get_theme_mod('understrap_child_rss_url', '');
        if( isset($rss_url) && $rss_url) {
            echo '<a href="'. filter_var( $rss_url, FILTER_SANITIZE_URL ) .'" target="_blank" class="rss" title="Follow on Rss">';
            echo '<img src="'. get_stylesheet_directory_uri() .'/images/rss.svg" alt="" />';
            echo '</a>';
        }
	}
}

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_topics_nonhierarchical_taxonomy', 0 );
 
function create_topics_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Tipologia', 'taxonomy general name' ),
    'singular_name' => _x( 'Tipologie', 'taxonomy singular name' ),
    'search_items' =>  __( 'Cerca Tipologie' ),
    'popular_items' => __( 'Popolari Tipologie' ),
    'all_items' => __( 'Tutte le Tipologie' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Modifica tipologie' ), 
    'update_item' => __( 'Aggiorna tipologie' ),
    'add_new_item' => __( 'Aggiungi nuova tipologia' ),
    'new_item_name' => __( 'Nome nuovo tipologia' ),
    'separate_items_with_commas' => __( 'Separate topics with commas' ),
    'add_or_remove_items' => __( 'Aggiungi o rimuovi tipologia' ),
    'choose_from_most_used' => __( 'Choose from the most used Type' ),
    'menu_name' => __( 'Tipologia' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('topics','tematic_area',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'topic' ),
  ));
}

add_action( 'init', 'create_secondary_category', 0 );
 
function create_secondary_category() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Area tematica', 'aree general name' ),
    'singular_name' => _x( 'Aree tematiche', 'aree singular name' ),
    'search_items' =>  __( 'Cerca Aree tematiche' ),
    'popular_items' => __( 'Popolari Aree tematiche' ),
    'all_items' => __( 'Tutte le Aree tematiche' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Modifica aree tematiche' ), 
    'update_item' => __( 'Aggiorna aree tematiche' ),
    'add_new_item' => __( 'Aggiungi nuova area tematica' ),
    'new_item_name' => __( 'Nome nuova area tematica' ),
    'separate_items_with_commas' => __( 'Separa le aree tematiche on la  virgola' ),
    'add_or_remove_items' => __( 'Aggiungi o rimuovi area tematica' ),
    'choose_from_most_used' => __( 'Choose from the most used Type' ),
    'menu_name' => __( 'Area tematica' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('categories_1','tematic_area',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'category_1' ),
  ));
}
//post lock
function tp_stop_guestes( $content ) {
    global $post;
    if(get_option('wisho_op_theme_lock_page')==true){
    if ( $post->post_type == 'tematic_area' && ($post->post_name != get_option('wisho_op_theme_dynamics_highlights') ) ) {
        if ( !is_user_logged_in() && !has_term('podcast','topics') ) {
            $content = '<h2 class="text-center no-acces">Per accedere a questi contenuti devi essere registrato al sito ed esserti connesso con i tuoi dati di accesso
           <br> <a class="cursor-grabbing archive-links" data-toggle="modal" data-target="#account">Accedi o registrati adesso ></a></h2>';
        }
    }}

    return $content;
}

add_filter( 'the_content', 'tp_stop_guestes' );

//filter menu order 0
add_filter('posts_where', function ($where, $query)
{
    global $wpdb;

    $label = $query->query['query_label'] ?? '';

        if ($label === 'ignore_zero_query')
        {   
            $where .= " AND {$wpdb->prefix}posts.menu_order > 0 ";
        }

        if ($label === 'only_zero_query')
        {
            $where .= " AND {$wpdb->prefix}posts.menu_order <= 0 ";
        }

    return $where;

}, 10, 2);

add_action( 'init', 'create_autor_tax', 0 );
 
function create_autor_tax() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Autore', 'Autore' ),
    'singular_name' => _x( 'Autore', 'Autore' ),
    'search_items' =>  __( 'Cerca Autore' ),
    'popular_items' => __( 'Popolari Autori' ),
    'all_items' => __( 'Tutti gli autori' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Modifica autori' ), 
    'update_item' => __( 'Aggiorna autori' ),
    'add_new_item' => __( 'Aggiungi nuovo autore' ),
    'new_item_name' => __( 'Nome nuovo autore' ),
    'separate_items_with_commas' => __( 'Separa gli autori on la  virgola' ),
    'add_or_remove_items' => __( 'Aggiungi o rimuovi autore' ),
    'choose_from_most_used' => __( 'Choose from the most used Type' ),
    'menu_name' => __( 'Autori' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('autor_tax',['tematic_area','post','digital_event','event_booking','page','on_demand'],array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'autor_slug' ),
  ));
}

add_filter( 'gettext', 'cyb_filter_gettext', 10, 3 );
function cyb_filter_gettext( $translated, $original, $domain ) {

    // Use the text string exactly as it is in the translation file
    if ( $translated == "Tutte le categorie" ) {
        $translated = "Categorie News";
    }
    if ( $translated == "All Post Types" ) {
        $translated = "Tutti i tipi di post";
    }

    return $translated;
}
add_action( 'init', 'my_add_shortcodes' );

function my_add_shortcodes() {

	add_shortcode( 'my-login-form', 'my_login_form_shortcode' );
}


if ( current_user_can('subscriber') ) {
    show_admin_bar( false );
}


/**
 * Custom Login Page Actions
 */
// Change the login url sitewide to the custom login page
add_filter( 'login_url', 'custom_login_url', 10, 2 );
// Redirects wp-login to custom login with some custom error query vars when needed
add_action( 'login_head', 'custom_redirect_login', 10, 2 );
// Updates login failed to send user back to the custom form with a query var
add_action( 'wp_login_failed', 'custom_login_failed', 10, 2 );
// Updates authentication to return an error when one field or both are blank
add_filter( 'authenticate', 'custom_authenticate_username_password', 30, 3);


/**
 * Custom Login Page Functions
 */
function custom_login_url( $login_url='', $redirect='' )
{
    $login_url=get_option('wisho_op_theme_link_account');
    $redirect=get_option('wisho_op_theme_link_to_redirect');
    $page = get_page_by_path('login');
    if ( $page )
    {
        $login_url = get_permalink($page->ID);

        if (! empty($redirect) )
            $login_url = add_query_arg('redirect_to', urlencode($redirect), $login_url);
    }
    return $login_url;
}
function custom_redirect_login( $redirect_to='', $request='' )
{
    $redirect_to=get_option('wisho_op_theme_link_to_redirect');
    if ( 'wp-login.php' == $GLOBALS['pagenow'] )
    {
        $redirect_url = custom_login_url();

        if (! empty($_GET['action']) )
        {
            if ( 'lostpassword' == $_GET['action'] )
            {
                return;
            }
            elseif ( 'register' == $_GET['action'] )
            {
                $register_page = get_page_by_path('register');
                $redirect_url = get_permalink($register_page->ID);
            }
        }
        elseif (! empty($_GET['loggedout'])  )
        {
            $redirect_url = add_query_arg('action', 'loggedout', custom_login_url());
        }

        wp_redirect( $redirect_url );
        exit;
    }
}
function custom_login_failed( $username )
{
    $referrer = wp_get_referer();

    if ( $referrer && ! strstr($referrer, 'wp-login') && ! strstr($referrer, 'wp-admin') )
    {
        if ( empty($_GET['loggedout']) )
        wp_redirect( add_query_arg('action', 'failed', custom_login_url()) );
        else
        wp_redirect( add_query_arg('action', 'loggedout', custom_login_url()) );
        exit;
    }
}
function custom_authenticate_username_password( $user, $username, $password )
{
    if ( is_a($user, 'WP_User') ) { return $user; }

    if ( empty($username) || empty($password) )
    {
        $error = new WP_Error();
        $user  = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.'));

        return $error;
    }
}

add_action( 'init', 'blockusers_init' );

function blockusers_init() {
    $user = wp_get_current_user();
    if ( in_array( 'subscriber', (array) $user->roles ) || is_user_logged_in() ) {
        if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
            wp_redirect( get_option('wisho_op_theme_link_to_redirect') );
        }
    }
}
function login_failed() {
    global $page_id;
    $login_page =  get_option('wisho_op_theme_link_account');
    wp_redirect( $login_page . '?login=failed' );
    exit;
    }
    add_action( 'wp_login_failed', 'login_failed' );
    
    function blank_username_password( $user, $username, $password ) {
    global $page_id;
    $login_page = get_option('wisho_op_theme_link_account');
    if( $username == "" || $password == "" ) {
    wp_redirect( $login_page . "?login=blank" );
    exit;
    }
    }
    add_filter( 'authenticate', 'blank_username_password', 1, 3);


    //reverse order
    add_action( 'pre_get_posts', 'custom_reverse_post_order' );
function custom_reverse_post_order( $query ) {

	if ( $query->is_main_query() && is_archive() && ! is_post_type_archive('post_type') && ($query->query_vars['post_type'] == 'event_booking')  ) {
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'ASC' );
	}
}

add_post_type_support( 'page', 'excerpt' );


if( is_admin() ){
    add_action( 'wp_default_scripts', 'wp_default_custom_scripts' );
    function wp_default_custom_scripts( $scripts ){
        $scripts->add( 'wp-color-picker', "/wp-admin/js/color-picker.min.js", array( 'iris' ), false, 1 );
        did_action( 'init' ) && $scripts->localize(
            'wp-color-picker',
            'wpColorPickerL10n',
            array(
                'clear'            => __( 'Clear' ),
                'clearAriaLabel'   => __( 'Clear color' ),
                'defaultString'    => __( 'Default' ),
                'defaultAriaLabel' => __( 'Select default color' ),
                'pick'             => __( 'Select Color' ),
                'defaultLabel'     => __( 'Color value' ),
            )
        );
    }
}

// add tag and category support to pages
function tags_categories_support_all() {
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('topics', 'page');
    register_taxonomy_for_object_type('category', 'page');  
  }
  
  // ensure all tags and categories are included in queries
  function tags_categories_support_query($wp_query) {
    if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
    if ($wp_query->get('topics')) $wp_query->set('post_type', 'any');
    if ($wp_query->get('category_name')) $wp_query->set('post_type', 'any');
  }
  
  // tag and category hooks
  add_action('init', 'tags_categories_support_all');
  add_action('pre_get_posts', 'tags_categories_support_query');