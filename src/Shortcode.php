<?php
/**
 * @package   dan0sz/posts-by-tag
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2020 - 2025 Daan van den Bergh. All Rights Reserved.
 */

namespace Daan\PostsByTag;

class Shortcode {
	/**
	 * Build class.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Action & Filter hooks.
	 *
	 * @return void
	 */
	private function init() {
		// Register shortcode
		add_shortcode( 'posts-by-tag', [ $this, 'render' ] );
	}

	/**
	 * Render the shortcode.
	 *
	 * @param $atts
	 *
	 * @return string
	 */
	public function render( $atts ) {
		// Default attributes
		$atts = shortcode_atts(
			[
				'tags'     => '',        // Tag slug
				'number'   => 5,         // Number of posts
				'order_by' => 'date',    // Sorting parameter (date, title, etc.)
				'order'    => 'DESC',    // Sorting direction (ASC or DESC)
			],
			$atts,
			'posts-by-tag' // Shortcode name
		);

		// Prepare query arguments
		$args = [
			'posts_per_page' => intval( $atts[ 'count' ] ),
			'tag'            => sanitize_text_field( $atts[ 'tag' ] ),
			'post_status'    => 'publish',
			'orderby'        => sanitize_text_field( $atts[ 'orderby' ] ),
			'order'          => strtoupper( $atts[ 'order' ] ) === 'ASC' ? 'ASC' : 'DESC',
		];

		$query = new \WP_Query( $args );

		// Build output
		$output = '<ul class="cpls-post-list">';

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
			}
		} else {
			$output .= '<li>No posts found.</li>';
		}

		$output .= '</ul>';

		// Reset postdata
		wp_reset_postdata();

		return $output;
	}
}
