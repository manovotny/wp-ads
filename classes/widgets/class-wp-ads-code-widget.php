<?php
/**
 * @package WP_Ads
 */

class WP_Ads_Code_Widget extends WP_Widget {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /* File Util
    ---------------------------------------------- */

    /**
     * Instance of the WP File Util class.
     *
     * @var WP_File_Util
     */
    private $file_util;

    /* Slug
    ---------------------------------------------- */

    /**
     * Slug to reference class.
     *
     * @var string
     */
    protected $slug = 'wp-ads-code-widget';

    /* Url Util
    ---------------------------------------------- */

    /**
     * Instance of the WP Url Util class.
     *
     * @var WP_Url_Util
     */
    private $url_util;

    /* Version
    ---------------------------------------------- */

    /**
     * Version, used for cache-busting of style and script file references.
     *
     * @var string
     */
    private $version;

    /* Constructor
    ---------------------------------------------------------------------------------- */

    /**
     * Initializes class.
     */
    public function __construct() {

        $this->file_util = WP_File_Util::get_instance();
        $this->url_util = WP_Url_Util::get_instance();
        $this->version = WP_Ads::get_instance()->get_version();

        parent::__construct(
            $this->slug,
            __( 'Ad Code', $this->slug ),
            array(
                'classname'  => $this->slug,
                'description' => __( 'A widget for displaying ads with code.', $this->slug )
            )
        );

        add_action( 'admin_print_styles', array( $this, 'register_admin_styles' ) );

    }

    /* Widget
    ---------------------------------------------------------------------------------- */

    /* Admin
    ---------------------------------------------- */

    /**
     * Admin widget display.
     *
     * @param array $instance Instance of the widget.
     * @return void Returns admin display
     */
    public function form( $instance ) {

        $instance = wp_parse_args(
            (array)$instance,
            array(
                'title' => '',
                'visibility' => 'both',
                'code'   => ''
            )
        );

        $title = stripslashes( strip_tags( $instance[ 'title' ] ) );
        $visibility = stripslashes( strip_tags( $instance[ 'visibility' ] ) );
        $code = stripslashes( $instance[ 'code' ] );

        $view_path = $this->file_util->get_absolute_path( __DIR__, '../../admin/views/wp-ads-code.php' );

        include $view_path;

    }

    /**
     * Saves admin widget options.
     *
     * @param array $new_instance New instance of the widget.
     * @param array $old_instance Old instance of the widget.
     * @return array Updated instance of the widget.
     */
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance[ 'title' ] = strip_tags( stripslashes( $new_instance[ 'title' ] ) );
        $instance[ 'visibility' ] = strip_tags( stripslashes( $new_instance[ 'visibility' ] ) );
        $instance[ 'code' ] =  stripslashes( $new_instance[ 'code' ] );

        return $instance;

    }

    /* Widget
    ---------------------------------------------- */

    /**
     * Frontend widget display.
     *
     * @param array $args Widget arguments.
     * @param array $instance Instance of the widget.
     * @return void Exists early if widget has been cached.
     */
    public function widget( $args, $instance ) {

        $cache = wp_cache_get( $this->slug, 'widget' );

        if ( !is_array( $cache ) ) {

            $cache = array();

        }

        if ( ! isset ( $args[ 'widget_id' ] ) ) {

            $args[ 'widget_id' ] = $this->id;

        }

        if ( isset ( $cache[ $args[ 'widget_id' ] ] ) ) {

            print $cache[ $args[ 'widget_id' ] ];

            return;

        }

        /*
         * Code above this is necessary, all the time, widget stuff,
         * and should probably be moved to a utility library.
         */

        /* ============================================================ */


        $view_path = $this->file_util->get_absolute_path( __DIR__, '../../views/wp-ads-code.php' );

        $visibility = stripslashes( strip_tags( $instance[ 'visibility' ] ) );
        $code = stripslashes( $instance[ 'code' ] );

        extract( $args, EXTR_SKIP );

        $widget_string = $before_widget;

        ob_start();

        include $view_path;

        $widget_string .= ob_get_clean();
        $widget_string .= $after_widget;


        /* ============================================================ */

        /*
         * Code below this is necessary, all the time, widget stuff,
         * and should probably be moved to a utility library.
         */

        $cache[ $args[ 'widget_id' ] ] = $widget_string;

        wp_cache_set( $this->slug, $cache, 'widget' );

        print $widget_string;

    }

    /* Hooks
    ---------------------------------------------------------------------------------- */

    /* Admin
    ---------------------------------------------- */

    /**
     * Registers admin styles.
     */
    public function register_admin_styles() {

        $path = $this->file_util->get_absolute_path( __DIR__, '../../admin/css/wp-ads-code.min.css' );
        $url = $this->url_util->convert_path_to_url( $path );

        wp_enqueue_style( $this->slug . '-admin-styles', $url, null, $this->version );

    }

}