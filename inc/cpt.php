<?php
/**
 * Understrap modify editor
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Custom Title Placeholders
function understrap_change_title_text( $title ) {

	$screen = get_current_screen();
	if  ( 'testimonial' == $screen->post_type ) {
		$title = 'Name';
	}

	return $title;
}

add_filter( 'enter_title_here', 'understrap_change_title_text' );

// Register Custom Post Types
function understrap_create_service_cpt() {

	// Services
	$labels = array(
		'name' => _x( 'Services', 'Post Type General Name', 'understrap' ),
		'singular_name' => _x( 'Service', 'Post Type Singular Name', 'understrap' ),
		'menu_name' => _x( 'Services', 'Admin Menu text', 'understrap' ),
		'name_admin_bar' => _x( 'Service', 'Add New on Toolbar', 'understrap' ),
		'archives' => __( 'Service Archives', 'understrap' ),
		'attributes' => __( 'Service Attributes', 'understrap' ),
		'parent_item_colon' => __( 'Parent Service:', 'understrap' ),
		'all_items' => __( 'All Services', 'understrap' ),
		'add_new_item' => __( 'Add New Service', 'understrap' ),
		'add_new' => __( 'Add New', 'understrap' ),
		'new_item' => __( 'New Service', 'understrap' ),
		'edit_item' => __( 'Edit Service', 'understrap' ),
		'update_item' => __( 'Update Service', 'understrap' ),
		'view_item' => __( 'View Service', 'understrap' ),
		'view_items' => __( 'View Services', 'understrap' ),
		'search_items' => __( 'Search Service', 'understrap' ),
		'not_found' => __( 'Not found', 'understrap' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'understrap' ),
		'featured_image' => __( 'Featured Image', 'understrap' ),
		'set_featured_image' => __( 'Set featured image', 'understrap' ),
		'remove_featured_image' => __( 'Remove featured image', 'understrap' ),
		'use_featured_image' => __( 'Use as featured image', 'understrap' ),
		'insert_into_item' => __( 'Insert into Service', 'understrap' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service', 'understrap' ),
		'items_list' => __( 'Services list', 'understrap' ),
		'items_list_navigation' => __( 'Services list navigation', 'understrap' ),
		'filter_items_list' => __( 'Filter Services list', 'understrap' ),
	);
	$args = array(
		'label' => __( 'Service', 'understrap' ),
		'description' => __( '', 'understrap' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-tools',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'service', $args );

	// Testimonials
	$labels = array(
		'name' => _x( 'Testimonials', 'Post Type General Name', 'understrap' ),
		'singular_name' => _x( 'Testimonial', 'Post Type Singular Name', 'understrap' ),
		'menu_name' => _x( 'Testimonials', 'Admin Menu text', 'understrap' ),
		'name_admin_bar' => _x( 'Testimonial', 'Add New on Toolbar', 'understrap' ),
		'archives' => __( 'Testimonial Archives', 'understrap' ),
		'attributes' => __( 'Testimonial Attributes', 'understrap' ),
		'parent_item_colon' => __( 'Parent Testimonial:', 'understrap' ),
		'all_items' => __( 'All Testimonials', 'understrap' ),
		'add_new_item' => __( 'Add New Testimonial', 'understrap' ),
		'add_new' => __( 'Add New', 'understrap' ),
		'new_item' => __( 'New Testimonial', 'understrap' ),
		'edit_item' => __( 'Edit Testimonial', 'understrap' ),
		'update_item' => __( 'Update Testimonial', 'understrap' ),
		'view_item' => __( 'View Testimonial', 'understrap' ),
		'view_items' => __( 'View Testimonials', 'understrap' ),
		'search_items' => __( 'Search Testimonial', 'understrap' ),
		'not_found' => __( 'Not found', 'understrap' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'understrap' ),
		'featured_image' => __( 'Featured Image', 'understrap' ),
		'set_featured_image' => __( 'Set featured image', 'understrap' ),
		'remove_featured_image' => __( 'Remove featured image', 'understrap' ),
		'use_featured_image' => __( 'Use as featured image', 'understrap' ),
		'insert_into_item' => __( 'Insert into Testimonial', 'understrap' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'understrap' ),
		'items_list' => __( 'Testimonials list', 'understrap' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'understrap' ),
		'filter_items_list' => __( 'Filter Testimonials list', 'understrap' ),
	);
	$args = array(
		'label' => __( 'Testimonial', 'understrap' ),
		'description' => __( '', 'understrap' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-comments',
		'supports' => array('title','custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'understrap_create_service_cpt', 0 );