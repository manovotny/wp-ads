<?php
/**
 * TODO
 *
 * @package WP_Ads
 * @author Michael Novotny <manovotny@gmail.com>
 * @license GPL-3.0+
 * @link https://github.com/manovotny/wp-ads
 * @copyright 2014 Michael Novotny
 *
 * @wordpress-plugin
 * Plugin Name: WP Ads
 * Plugin URI: https://github.com/manovotny/wp-ads
 * Description: TODO
 * Version: 0.0.0
 * Author: Michael Novotny
 * Author URI: http://manovotny.com
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * GitHub Plugin URI: https://github.com/manovotny/wp-ads
 */

/* Access
---------------------------------------------------------------------------------- */

if ( ! defined( 'WPINC' ) ) {

    die;

}

/* Classes
---------------------------------------------------------------------------------- */

if ( ! class_exists( 'WP_Ads' ) ) {

    require_once __DIR__ . '/classes/class-wp-ads.php';

}

/* Libraries
---------------------------------------------------------------------------------- */

require_once __DIR__ . '/lib/wp-file-util/wp-file-util.php';
require_once __DIR__ . '/lib/wp-url-util/wp-url-util.php';

/* Widgets
---------------------------------------------------------------------------------- */

if ( ! class_exists( 'WP_Ads_Code' ) ) {

    require_once __DIR__ . '/classes/widgets/class-wp-ads-code-widget.php';

    add_action( 'widgets_init', create_function( '', 'register_widget("WP_Ads_Code_Widget");' ) );

}