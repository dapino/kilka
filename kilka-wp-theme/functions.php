<?php
/**
 *
 * @package WordPress
 * @subpackage Kilka
 * @since Kilka 1.0
 */

if ( ! function_exists( "aa_setup" ) ) {
	function aa_setup() {
		load_theme_textdomain( 'aa', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		));

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 1200, 1200 );

		add_image_size( 'medium-thumb', 600, 400, true );

		add_theme_support( 'customize-selective-refresh-widgets' );


		add_theme_support( 'custom-logo', array(
			'height'      => 46,
			'width'       => 203,
			'flex-height' => false,
			'flex-width'  => false,
			'header-text' => array( 'site-title', 'site-description' )
		) );
  show_admin_bar(false);
		add_action( 'init', 'aa_head_cleanup' );
		add_action( 'wp_loaded', 'aa_protocol_relative', 10, 1 );
		add_action( 'wp_before_admin_bar_render', 'aa_admin_bar_remove_elements', 0 );
		add_action( 'admin_menu','aa_hide_update_nag' );
		add_action( 'admin_menu', 'aa_remove_pages_admin_menu', 999 );
		add_action( 'wp_head','aa_add_generator');
		add_action( 'admin_head', 'aa_hide_help_tabs' );

		add_filter( 'get_custom_logo', 'aa_change_logo_class' );
		add_filter( 'image_send_to_editor', 'aa_remove_thumbnail_dimensions', 10 );
		add_filter( 'mce_buttons_2', 'aa_mce_buttons' );
		add_filter( 'post_thumbnail_html', 'aa_remove_thumbnail_dimensions', 10 );
		add_filter( 'the_generator', 'aa_rss_version' );
		add_filter( 'admin_footer_text', 'aa_admin_footer' );
		add_filter( 'auto_update_theme', '__return_false' );

		remove_filter( 'update_footer', 'core_update_footer' );

		function aa_navigation_menus() {

			$locations = array(
				'header_menu' => __( 'Primary Menu', 'aa' ),
			);
			register_nav_menus( $locations );
		}
		add_action( 'init', 'aa_navigation_menus' );

		if ( ! is_admin() ) {
			add_filter( 'script_loader_src', 'aa_remove_query_strings', 15, 1 );
			add_filter( 'style_loader_src', 'aa_remove_query_strings', 15, 1 );
		}

	}
	add_action( 'after_setup_theme', 'aa_setup' );
}


if ( ! function_exists( "aa_head_cleanup" ) ){
	function aa_head_cleanup() {
		remove_action( 'wp_head', 'feed_links_extra', 3 );					// Category Feeds
		remove_action( 'wp_head', 'feed_links', 2 );						  // Post and Comment Feeds
		remove_action( 'wp_head', 'rsd_link' );							   // EditURI link
		remove_action( 'wp_head', 'wlwmanifest_link' );					   // Windows Live Writer
		remove_action( 'wp_head', 'index_rel_link' );						 // index link
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );			// previous link
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );			 // start link
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
		remove_action( 'wp_head', 'wp_generator' );						   // WP version
	}
}

if ( ! function_exists( "aa_admin_bar_remove_elements" ) ) {
	function aa_admin_bar_remove_elements() {
		global $wp_admin_bar;

		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('updates');
	}
}

if ( ! function_exists( "aa_hide_update_nag" ) ) {
	function aa_hide_update_nag() {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}

if ( ! function_exists( "aa_hide_help_tabs" ) ) {
	function aa_hide_help_tabs() {
		$screen = get_current_screen();
		$screen->remove_help_tabs();
	}
}

if ( ! function_exists( "aa_rss_version" ) ) {
	function aa_rss_version() { return ''; }
}

if ( ! function_exists( "aa_remove_pages_admin_menu" ) ) {
	function aa_remove_pages_admin_menu() {
		// remove_menu_page( 'plugins.php' );
		remove_submenu_page( 'index.php', 'update-core.php' );
		remove_submenu_page( 'themes.php', 'themes.php' );
	}
}

if ( ! function_exists( "aa_main_menu" ) ) {
	function aa_main_menu(){
		wp_nav_menu(
			array(
				'menu'            => 'primary',
				'theme_location'  => 'header_menu',
				'depth'           => 1,
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'fallback_cb'     => '',
				'walker'          => new wp_bootstrap_navwalker()
			)
		);
	}
}


if ( ! function_exists( "aa_logo" ) ) {
	function aa_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
}




require_once get_template_directory() . '/inc/projects-post-type.php';
