<?php
/**
 * Theme basic setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'understrap_setup' );

if ( ! function_exists ( 'understrap_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function understrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on understrap, use a find and replace
		 * to change 'understrap' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'understrap' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo' );
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Check and setup theme default settings.
		understrap_setup_theme_default_settings();

	}
}


add_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );

if ( ! function_exists( 'understrap_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function understrap_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

// add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

// if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
// 	/**
// 	 * Adds a custom read more link to all excerpts, manually or automatically generated
// 	 *
// 	 * @param string $post_excerpt Posts's excerpt.
// 	 *
// 	 * @return string
// 	 */
// 	function understrap_all_excerpts_get_more_link( $post_excerpt ) {
// 		if ( ! is_admin() ) {
// 			$post_excerpt = $post_excerpt . ' <p><a class="btn btn-secondary understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More',
// 			'understrap' ) . '</a></p>';
// 		}
// 		return $post_excerpt;
// 	}
// }

// Register Custom Post Types
function create_service_cpt() {

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
		'has_archive' => false,
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
add_action( 'init', 'create_service_cpt', 0 );