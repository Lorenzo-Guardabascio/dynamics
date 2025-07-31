<?php
/*
Plugin Name: Wish-Op AccMed OpenID Connect
Plugin URI:
Description: AccMed Openid Connect for User Login
Version: 0.0.2
Author: Emilio (FEj) Frusciante, Lorenzo.G
Author URI: http://www.wish-op.com
Author Email: support@wish-op.com
License:   
*/

if (!class_exists('AccMedOpenIDConnectPlugin')):
    require('lib/helper/MY_Plugin.php');

    class AccMedOpenIDConnectPlugin extends MY_Plugin {

        /**
         * Initializes the plugin by setting localization, filters, and administration functions.
         */
        function __construct() {

            // Call the parent constructor
            parent::__construct(dirname(__FILE__));

            /**
             * Register settings options
             */
            add_action('admin_init', array($this, 'register_plugin_settings_api_init'));
            add_action('admin_menu', array($this, 'register_plugin_admin_add_page'));

            /**
             * Custom Login page
             */
            add_filter('authenticate', array($this,'verify_user_pass'), 1, 3);

            /**
             * Add a plugin settings link on the plugins page
             */
            $plugin = plugin_basename(__FILE__);
            add_filter("plugin_action_links_$plugin", function ($links) {
                $settings_link = '<a href="options-general.php?page=openid-connect">Settings</a>';
                array_unshift($links, $settings_link);
                return $links;
            });

        } // end constructor

        /* Where to go if any of the fields were empty */
        function verify_user_pass($user, $username, $password) {
            if($user == null) {
                $data = [
                    "username" => $username,
                    "password" => $password
                ];
                $authBase64 = base64_encode ( $this->get_option('openid_client_id') .':'. $this->get_option('openid_client_secret') );
                $auth = array('Authorization: Basic '. $authBase64);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $auth);
                curl_setopt($ch, CURLOPT_URL, $this->get_option('openid_server_url'));
                $json = curl_exec($ch);
                curl_close($ch);

                if(!empty($json)) {
                    $json_decode = json_decode($json);
                    if($json_decode->login > 0) {
                        $email = $json_decode->email;
                        $name = $json_decode->nome;
                        $surname = $json_decode->cognome;

                        $user = get_user_by('email', $email);
                        $wp_uid = null;

                        if ($user) {
                            // user already exists
                            $wp_uid = $user->ID;
                        } else {
                            // User must have an e-mail address to register
                            $wp_uid = wp_insert_user(array(
                                'user_login' => $username,
                                'user_pass' => wp_generate_password(12, true),
                                'user_email' => $email,
                                'first_name' => $name,
                                'last_name' => $surname
                            ));
                        }

                        $user = wp_set_current_user($wp_uid, $username);
                        wp_set_auth_cookie($wp_uid);
                        do_action('wp_login', $username);

                    } elseif ($json_decode->login < 0 ) {
                        $login_page = get_option('wisho_op_theme_link_account');
                         wp_redirect( $login_page . "?login=unauthorized" );
                         exit;
                        //$user = new WP_Error( 'unauthorized_login', sprintf( __( '<strong>ERROR</strong>: La sezione riservata di questo sito è accessibile ai soli operatori sanitari. Per informazioni e assistenza potete scrivere a <a href="mailto:assistenza@accmed.org">assistenza@accmed.org</a>' ) ) );
                    }
                }
            }

            return $user;
        }

        /**
         *
         */
        public function register_plugin_settings_api_init() {

            register_setting($this->get_option_name(), $this->get_option_name());

            add_settings_section('openid_connect_client', 'Main Settings', function () {
                echo "<p>These settings are required for the plugin to work properly.</p>";
            }, 'openid-connect');

            // Add a Server URL setting
            $this->add_settings_field('openid_server_url', 'openid-connect', 'openid_connect_client');
            // Add a Client ID setting
            $this->add_settings_field('openid_client_id', 'openid-connect', 'openid_connect_client');
            // Add a Client Secret setting
            $this->add_settings_field('openid_client_secret', 'openid-connect', 'openid_connect_client');


        }

        /**
         *
         */
        public function register_plugin_admin_add_page() {

            $self = $this;
            add_options_page('AccMed OpenID Connect Login Page', 'AccMed OpenID Connect', 'manage_options', 'openid-connect', function () use ($self) {
                $self->load_view('settings', null);
            });
        }


    } // end class

// Init plugin
$plugin_name = new AccMedOpenIDConnectPlugin();

endif;