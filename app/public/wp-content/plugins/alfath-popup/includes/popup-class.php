<?php
namespace Artistudio;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class Popup {
	private static $instance = null;

	public static function get_instance() {
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		// Register Custom Post Type
		add_action('init', [$this, 'register_popup_post_type']);

		// Register API Routes
		add_action('rest_api_init', [$this, 'register_api_routes']);
		add_action('wp_footer', [$this, 'load_popup_template']);

	}

	/**
	 * Register Custom Post Type "popups"
	 */
	public function register_popup_post_type() {
		$labels = [
			'name'               => __('Popups', 'alfath-popup'),
			'singular_name'      => __('Popup', 'alfath-popup'),
			'menu_name'          => __('Popups', 'alfath-popup'),
			'add_new'            => __('Add New Popup', 'alfath-popup'),
			'add_new_item'       => __('Add New Popup', 'alfath-popup'),
			'edit_item'          => __('Edit Popup', 'alfath-popup'),
			'new_item'           => __('New Popup', 'alfath-popup'),
			'view_item'          => __('View Popup', 'alfath-popup'),
			'all_items'          => __('All Popups', 'alfath-popup'),
			'search_items'       => __('Search Popups', 'alfath-popup'),
			'not_found'          => __('No popups found.', 'alfath-popup'),
			'not_found_in_trash' => __('No popups found in Trash.', 'alfath-popup')
		];

		$args = [
			'labels'             => $labels,
			'public'             => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_position'      => 20,
			'menu_icon'          => 'dashicons-format-aside',
			'supports'           => ['title', 'editor'],
			'show_in_rest'       => true, // Enable Gutenberg support
			'capability_type'    => 'post',
			'has_archive'        => false
		];

		register_post_type('popups', $args);
	}

	/**
	 * Register REST API Route
	 */
	public function register_api_routes() {
		register_rest_route(
			'artistudio/v1',
			'/popup',
			[
				'methods'  => 'GET',
				'callback' => [$this, 'get_popups'],
				'permission_callback' => '__return_true', // Akses tanpa autentikasi
			]
		);
	}

	/**
	 * Get Popup Data from CPT
	 */
	public function get_popups() {
		$args = [
			'post_type'      => 'popups',
			'post_status'    => 'publish',
			'numberposts'    => -1
		];

		$popups = get_posts($args);
		$data = [];

		foreach ($popups as $popup) {
			$data[] = [
				'id'          => $popup->ID,
				'title'       => get_the_title($popup->ID),
				'description' => apply_filters('the_content', $popup->post_content),
				'page'        => get_post_meta($popup->ID, 'popup_page', true),
			];
		}

		return rest_ensure_response($data);
	}

	public function load_popup_template() {
		include plugin_dir_path(__FILE__) . 'templates/popup_template.php';
	}

}

// Inisialisasi kelas
Popup::get_instance();
