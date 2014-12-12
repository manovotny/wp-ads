<?php
/**
 * @package WP_Ads
 */

class WP_Ads {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /* Instance
    ---------------------------------------------- */

    /**
     * Instance of the class.
     *
     * @var WP_Ads
     */
    protected static $instance = null;

    /**
     * Get accessor method for instance property.
     *
     * @return WP_Ads Instance of the class.
     */
    public static function get_instance() {

        if ( null == self::$instance ) {

            self::$instance = new self;

        }

        return self::$instance;

    }

    /* Version
    ---------------------------------------------- */

    /**
     * Version, used for cache-busting of style and script file references.
     *
     * @var string
     */
    protected $version = '1.0.7';

    /**
     * Getter method for version.
     *
     * @return string Plugin version.
     */
    public function get_version() {

        return $this->version;

    }

}
