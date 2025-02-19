<?php
/**
 * Plugin Name:     Alfath Popup
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     alfath-popup
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Alfath_Popup
 */

if (!defined('ABSPATH')) {
	exit;
}

// Autoload class
require_once plugin_dir_path(__FILE__) . 'includes/popup-class.php';
require_once plugin_dir_path(__FILE__) . 'includes/api-class.php';


// Inisialisasi plugin
function run_alfath_popup() {
	new Artistudio\Popup();
	new Artistudio\API();
}
add_action('plugins_loaded', 'run_alfath_popup');

function alfath_popup_template() {
	echo '<div id="popup-container"></div>';
}
add_action('wp_footer', 'alfath_popup_template');


function alfath_enqueue_scripts() {
	wp_enqueue_script('vue-js', 'https://unpkg.com/vue@3/dist/vue.global.js', array(), null, true);
	wp_enqueue_script('popup-js', plugin_dir_url(__FILE__) . 'assets/js/popup.js', array('vue-js'), '1.0.0', true);
	wp_enqueue_style('popup-css', plugin_dir_url(__FILE__) . 'assets/css/popup.css', array(), '1.0.0');
	add_filter('script_loader_tag', function ($tag, $handle) {
		if (in_array($handle, ['vue-js', 'popup-js'])) {
			return str_replace(' src', ' defer src', $tag);
		}
		return $tag;
	}, 10, 2);
}

add_action('wp_enqueue_scripts', 'alfath_enqueue_scripts');


