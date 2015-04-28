# ACF to WP-API

Contributors: chrishutchinson, kokarn, ramvi   
Tags: acf, api, wp-api   
Requires at least: 3.0.1   
Tested up to: 4.2.1  
Stable tag: 1.2.1
License: MIT   
License URI: http://opensource.org/licenses/MIT

Plugs Advanced Custom Fields (ACF) data into the WordPress JSON API (WP-API).

## Description

Puts all ACF fields from posts, pages, custom post types, comments, attachments and taxonomy terms, into the WP-API output under the 'acf' key. Creates a new `/option` endpoint returning options (requires ACF Options Page plugin).

## Installation

1. Unzip and upload the `acf-to-wp-api` directory to `/wp-content/plugins/`.
2. Activate the plugin through the 'Plugins' menu in WordPress

## Frequently Asked Questions

## Changelog

### 1.2.1

* Tested with WordPress 4.2.1

### 1.2.0

* Added ACF data to comments (Thanks @ramvi).

### 1.1.0

* Add `/option` endpoint for ACF options add-on (Thanks @kokarn).

### 1.0.1

* Fix for addACFDataTerm.

### 1.0.0

* Initial release.