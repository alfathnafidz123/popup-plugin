<?php
namespace Artistudio;

class CPT {
	public static function register() {
		register_post_type('popup', [
			'label' => 'Popups',
			'public' => true,
			'supports' => ['title', 'editor'],
			'show_in_rest' => true,
		]);
	}
}
