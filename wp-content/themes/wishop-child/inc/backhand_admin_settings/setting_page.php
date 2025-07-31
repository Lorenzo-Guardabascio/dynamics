<?php
include get_theme_file_path('inc/backhand_admin_settings/tab_option_1.php');
include get_theme_file_path('inc/backhand_admin_settings/tab_option_2.php');
include get_theme_file_path('inc/backhand_admin_settings/tab_option_0.php');



/* ----------------------------------------------------------------------------- */
/* Add Menu Page */
/* ----------------------------------------------------------------------------- */ 

function add_theme_setting() {
    add_menu_page (
        'Page Title', // page title 
        'Theme Settings', // menu title
        'manage_options', // capability
        'theme-setting-slug',  // menu-slug
        'theme_setting_page',   // function that will render its output
		'dashicons-admin-multisite'   // link to the icon that will be displayed in the sidebar
        //$position,    // position of the menu option
    );
}
add_action('admin_menu', 'add_theme_setting');

function theme_setting_page() {
        ?>
<?php  
        if( isset( $_GET[ 'tab' ] ) ) {  
            $active_tab = $_GET[ 'tab' ];  
        } else {
            $active_tab = 'tab_one';
        }
        ?>
<div class="wrap">

    <h2>
        <?php _e('Impostazioni Tema', 'understrap-child'); ?>
    </h2>
    <div class="description">
        <?php _e('Setting del tema', 'understrap-child'); ?></div>
    <?php settings_errors(); ?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=theme-setting-slug&tab=tab_zero"
            class="nav-tab <?php echo $active_tab == 'tab_zero' ? 'nav-tab-active' : ''; ?>">
            Global</a>
        <a href="?page=theme-setting-slug&tab=tab_one"
            class="nav-tab <?php echo $active_tab == 'tab_one' ? 'nav-tab-active' : ''; ?>">
            Homepage</a>
        <a href="?page=theme-setting-slug&tab=tab_two"
            class="nav-tab <?php echo $active_tab == 'tab_two' ? 'nav-tab-active' : ''; ?>">Pagine interne</a>
    </h2>

    <form method="post" action="options.php">
        <?php
                if( $active_tab == 'tab_one' ) {  

                    settings_fields( 'setting-group-1' );
                    do_settings_sections( 'theme-setting-slug-1' );

                } elseif( $active_tab == 'tab_two' )  {

                    settings_fields( 'setting-group-2' );
                    do_settings_sections( 'theme-setting-slug-2' );

                }elseif( $active_tab == 'tab_zero' )  {

                    settings_fields( 'setting-group-0' );
                    do_settings_sections( 'theme-setting-slug-0' );

                }
                //else if foreah tab
            ?>

        <?php submit_button(); ?>
    </form>

</div>
<?php
}



?>