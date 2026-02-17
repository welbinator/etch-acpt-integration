<?php
/**
 * Plugin Name: Etch ACPT Integration
 * Description: Adds backward compatibility for ACPT's etch/add_dynamic_data filter hook
 * Version: 1.0.1
 * Author: James Welbes
 * Requires Plugins: etch, advanced-custom-post-type
 */

namespace EtchACPT;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Integration {
	
	/**
	 * Initialize the integration
	 */
	public static function init() {
		// Add the legacy filter hook that ACPT expects
		add_filter( 'etch/dynamic_data/post', [ __CLASS__, 'add_legacy_filter_for_posts' ], 5, 2 );
		add_filter( 'etch/dynamic_data/user', [ __CLASS__, 'add_legacy_filter_for_users' ], 5, 2 );
		add_filter( 'etch/dynamic_data/term', [ __CLASS__, 'add_legacy_filter_for_terms' ], 5, 3 );
		add_filter( 'etch/dynamic_data/option', [ __CLASS__, 'add_legacy_filter_for_options' ], 5, 1 );
	}

	/**
	 * Add legacy filter for posts
	 * 
	 * @param array $data    The existing post data
	 * @param int   $post_id The post ID
	 * @return array Modified data
	 */
	public static function add_legacy_filter_for_posts( array $data, int $post_id ): array {
		return apply_filters( 'etch/add_dynamic_data', $data, 'post', $post_id );
	}

	/**
	 * Add legacy filter for users
	 * 
	 * @param array $data    The existing user data
	 * @param int   $user_id The user ID
	 * @return array Modified data
	 */
	public static function add_legacy_filter_for_users( array $data, int $user_id ): array {
		return apply_filters( 'etch/add_dynamic_data', $data, 'user', $user_id );
	}

	/**
	 * Add legacy filter for terms
	 * 
	 * @param array  $data     The existing term data
	 * @param int    $term_id  The term ID
	 * @param string $taxonomy The taxonomy name
	 * @return array Modified data
	 */
	public static function add_legacy_filter_for_terms( array $data, int $term_id, string $taxonomy ): array {
		return apply_filters( 'etch/add_dynamic_data', $data, 'term', $term_id, $taxonomy );
	}

	/**
	 * Add legacy filter for option pages
	 * 
	 * @param array $data The existing option data
	 * @return array Modified data
	 */
	public static function add_legacy_filter_for_options( array $data ): array {
		return apply_filters( 'etch/add_dynamic_data', $data, 'option', 0 );
	}
}

// Initialize the integration at priority 20 (after plugins_loaded:10)
add_action( 'plugins_loaded', [ '\EtchACPT\Integration', 'init' ], 20 );
