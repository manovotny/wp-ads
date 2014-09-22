<?php
/**
 * @package WP_Ads
 *
 * @wordpress-plugin
 * Plugin Name: WP Ads
 * Plugin URI: https://github.com/manovotny/wp-ads
 * Description: Ads for WordPress.
 * Version: 1.0.1
 * Author: Michael Novotny
 * Author URI: http://manovotny.com
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /lang
 * Text Domain: wp-ads
 * GitHub Plugin URI: https://github.com/manovotny/wp-ads
 */

/* Access
---------------------------------------------------------------------------------- */

if ( ! defined( 'WPINC' ) ) {

    die;

}

/* Composer
---------------------------------------------------------------------------------- */

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {

    require __DIR__ . '/vendor/autoload.php';

}

/* Initialization
---------------------------------------------------------------------------------- */

add_action( 'widgets_init', create_function( '', 'register_widget( "WP_Ads_Code_Widget" );' ) );