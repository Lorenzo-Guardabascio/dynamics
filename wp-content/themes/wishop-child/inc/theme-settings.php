<?php
/**
 * Check and setup theme's default settings
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists ( 'understrap_child_setup_theme_settings' ) ) {
	function understrap_child_setup_theme_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$understrap_child_posts_index_style = get_theme_mod( 'understrap_child_posts_index_style' );
		if ( '' == $understrap_child_posts_index_style ) {
			set_theme_mod( 'understrap_child_posts_index_style', 'default' );
		}

		// Sidebar position.
		$understrap_child_sidebar_position = get_theme_mod( 'understrap_child_sidebar_position' );
		if ( '' == $understrap_child_sidebar_position ) {
			set_theme_mod( 'understrap_child_sidebar_position', 'right' );
		}

		// Container width.
		$understrap_child_container_type = get_theme_mod( 'understrap_child_container_type' );
		if ( '' == $understrap_child_container_type ) {
			set_theme_mod( 'understrap_child_container_type', 'container' );
			// Facebook
			$understrap_child_facebook_url = get_theme_mod( 'understrap_child_facebook_url' );
		if ( '' == $understrap_child_facebook_url ) {
			set_theme_mod( 'understrap_child_facebook_url', '' );
		}

        // Twitter
        $understrap_child_twitter_url = get_theme_mod( 'understrap_child_twitter_url' );
		if ( '' == $understrap_child_twitter_url ) {
			set_theme_mod( 'understrap_child_twitter_url', '' );
		}

        // LinkedIn
        $understrap_child_linkedin_url = get_theme_mod( 'understrap_child_linkedin_url' );
		if ( '' == $understrap_child_linkedin_url ) {
			set_theme_mod( 'understrap_child_linkedin_url', '' );
		}

        // Youtube
        $understrap_child_youtube_url = get_theme_mod( 'understrap_child_youtube_url' );
		if ( '' == $understrap_child_youtube_url ) {
			set_theme_mod( 'understrap_child_youtube_url', '' );
		}
/*
        // Instagram
        $understrap_child_instagram_url = get_theme_mod( 'understrap_child_instagram_url' );
		if ( '' == $understrap_child_instagram_url ) {
			set_theme_mod( 'understrap_child_instagram_url', '' );
		}

        // Email
        $understrap_child_email = get_theme_mod( 'understrap_child_email' );
		if ( '' == $understrap_child_email ) {
			set_theme_mod( 'understrap_child_email', '' );
		}

        // RSS
        $understrap_child_rss_url = get_theme_mod( 'understrap_child_rss_url' );
		if ( '' == $understrap_child_rss_url ) {
			set_theme_mod( 'understrap_child_rss_url', '' );
		}
		*/
		}
	}
}
