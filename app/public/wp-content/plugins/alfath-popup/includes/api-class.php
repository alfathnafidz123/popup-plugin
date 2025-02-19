<?php
namespace Artistudio;

use WP_REST_Controller;

class API extends WP_REST_Controller {
	public function __construct() {
		$this->namespace = 'artistudio/v1';
		$this->rest_base = 'popup';
	}

	public function register_routes() {
		register_rest_route($this->namespace, '/' . $this->rest_base, [
			'methods'  => 'GET',
			'callback' => [$this, 'get_popups'],
			'permission_callback' => function () {
				return is_user_logged_in() && current_user_can('read');
			}
		]);
	}

	public function get_popups() {
		$args = [
			'post_type'      => 'popup',
			'posts_per_page' => -1
		];

		$query = new \WP_Query($args);
		$popups = [];

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$popups[] = [
					'title'       => get_the_title(),
					'description' => apply_filters('the_content', get_the_content()),
					'page'        => get_post_meta(get_the_ID(), 'popup_page', true)
				];
			}
			wp_reset_postdata();
		}

		return rest_ensure_response($popups);
	}
}
