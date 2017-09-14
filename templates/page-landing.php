<?php
/**
 * Eurostar Theme.
 *
 * This file adds the landing page template to the Eurostar Theme Theme.
 *
 * Template Name: Landing Page
 *
 * @package Eurostar Theme
 * @author  SeoThemes
 * @license GPL-2.0+
 * @link    https://seothemes.com/themes/eurostar
 */

add_filter( 'body_class', 'eurostar_add_body_class' );
/**
 * Add landing page body class to the head.
 *
 * @param  array $classes Array of body classes.
 * @return array $classes Array of body classes.
 */
function eurostar_add_body_class( $classes ) {

	$classes[] = 'landing-page';

	return $classes;

}

add_action( 'wp_enqueue_scripts', 'eurostar_dequeue_skip_links' );
/**
 * Dequeue Skip Links Script.
 *
 * @return void
 */
function eurostar_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}

// Remove Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Remove site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Remove default page header.
remove_action( 'genesis_after_header', 'eurostar_page_header_open', 20 );
remove_action( 'genesis_after_header', 'eurostar_page_header_title', 24 );
remove_action( 'genesis_after_header', 'eurostar_page_header_close', 28 );

// Add title back (removed in /includes/header.php).
add_action( 'genesis_entry_header', 'genesis_do_post_title' );

// Remove navigation.
remove_theme_support( 'genesis-menus' );

// Remove breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Remove footer widgets.
remove_theme_support( 'genesis-footer-widgets' );

// Remove site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

// Run the Genesis loop.
genesis();
