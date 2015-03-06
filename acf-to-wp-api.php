<?php
/**
 * Plugin Name: ACF to WP API
 * Description: Puts all ACF fields from posts, pages, custom post types, attachments and taxonomy terms, into the WP-API output under the 'acf' key
 * Author: Chris Hutchinson
 * Author URI: http://www.chrishutchinson.me
 * Version: 1.1.0
 * Plugin URI: https://timesdev.tools
 */

class ACFtoWPAPI{

	/**
	 * Constructor
	 */
	function ACFtoWPAPI() {
		// Setup defaults
		$this->plugin = new StdClass;
		$this->plugin->title = 'ACF to WP API';
		$this->plugin->name = 'acf-to-wp-api';
        $this->plugin->folder = WP_PLUGIN_DIR . '/' . $this->plugin->name;
        $this->plugin->url = WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__), "", plugin_basename(__FILE__));
		$this->plugin->version = '1.1.0';

		// Filters
		add_filter('json_prepare_post', array(&$this, 'addACFDataPost'), 10, 3); // Posts
		add_filter('json_prepare_term', array(&$this, 'addACFDataTerm'), 10, 3); // Taxonomy Terms
		add_filter('json_prepare_user', array(&$this, 'addACFDataUser'), 10, 3); // Users
		add_filter('json_prepare_comment', array(&$this, 'addACFDataComment'), 10, 3); // Comments

		// Endpoints
		add_filter('json_endpoints', array(&$this, 'registerRoutes'), 10, 3);
	}

	/**
	 * Users
	 */
	function addACFDataUser($data, $user, $context) {
		$fieldData = get_fields($user);
		$data['acf'] = $fieldData;
		return $data;
	}

	/**
	 * Taxonomy Terms
	 */
	function addACFDataTerm($data, $term, $context = null) {
		$fieldData = get_fields($term);
		$data['acf'] = $fieldData;
		return $data;
	}

	/**
	 * Posts, Custom Post Types, Pages & Attachments
	 */
	function addACFDataPost($data, $post, $context) {
		$fieldData = get_fields($post['ID']);
		$data['acf'] = $fieldData;
		return $data;
	}

	/**
	 * Comments
	 */
	function addACFDataComment($data, $comment, $context) {
		$fieldData = get_fields("comment_{$comment->comment_ID}");
		$data['acf'] = $fieldData;
		return $data;
	}

	/**
	 * Options endpoint
	 */
	function getACFOptions() {
		return get_fields('option');
	}

	/**
	 * Custom routes
	 */
	function registerRoutes( $routes ) {
		$routes['/option'] = array(
			array(array(&$this, 'getACFOptions'), WP_JSON_Server::READABLE)
		);

		return $routes;
	}

}

$ACFtoWPAPI = new ACFtoWPAPI();