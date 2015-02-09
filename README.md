# ACF to WP-API
Contributors: chrishutchinson, kokarn
Tags: acf, api, wp-api
Requires at least: 3.0.1
Tested up to: 4.0
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Puts all ACF fields from posts, pages, custom post types, attachments and taxonomy terms, into the WP-API output under the 'acf' key.

Creates a new `/option` endpoint returning options (requires ACF Options Page plugin).

## Description

Puts all ACF fields from posts, pages, custom post types, attachments and taxonomy terms, into the WP-API output under the 'acf' key.

Creates a new `/option` endpoint returning options (requires ACF Options Page plugin).

## Installation

1. Unzip and upload the `acf-to-wp-api` directory to `/wp-content/plugins/`.
2. Activate the plugin through the 'Plugins' menu in WordPress

## Frequently Asked Questions

## Changelog

### 1.1.0

* Add 'option' endpoint for ACF options add-on (Thanks @kokarn).

### 1.0.1

* Fix for addACFDataTerm.

### 1.0.0

* Initial release.