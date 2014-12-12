<?php
/**
 * @package WP_Ads
 *
 * @wordpress-plugin
 * Plugin Name: WP Ads
 * Plugin URI: https://github.com/manovotny/wp-ads
 * Description: Ads for WordPress.
 * Version: 1.0.7
 * Author: Michael Novotny
 * Author URI: http://manovotny.com
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /lang
 * Text Domain: wp-ads
 * GitHub Plugin URI: https://github.com/manovotny/wp-ads
 */

/* Composer
---------------------------------------------------------------------------------- */

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {

    require_once __DIR__ . '/vendor/autoload.php';

}

/* Initialization
---------------------------------------------------------------------------------- */

require_once __DIR__ . '/src/initialize.php';