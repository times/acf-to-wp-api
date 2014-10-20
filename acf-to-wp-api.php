<?php
/**
 * Plugin Name: ACF to WP API
 * Description: Puts all ACF fields from posts, pages, custom post types, attachments and taxonomy terms, into the WP-API output under the 'acf' key
 * Author: Chris Hutchinson
 * Author URI: http://www.chrishutchinson.me
 * Version: 1.0.0
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
		$this->plugin->version = '0.0.1';
        $this->plugin->folder = WP_PLUGIN_DIR . '/' . $this->plugin->name;
        $this->plugin->url = WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__), "", plugin_basename(__FILE__));

		// Filters
		add_filter('json_prepare_post', array(&$this, 'addACFDataPost'), 10, 3); // Posts
		add_filter('json_prepare_term', array(&$this, 'addACFDataTerm'), 10, 3); // Taxonomy Terms
		add_filter('json_prepare_user', array(&$this, 'addACFDataUser'), 10, 3); // Users
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

}

$ACFtoWPAPI = new ACFtoWPAPI();