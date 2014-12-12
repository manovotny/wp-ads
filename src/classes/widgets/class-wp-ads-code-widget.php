<?php
/**
 * @package WP_Ads
 */

class WP_Ads_Code_Widget extends WP_Widget {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /* Slug
    ---------------------------------------------- */

    /**
     * Slug to reference class.
     *
     * @var string
     */
    protected $slug = 'wp-ads-code-widget';

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

        $view_path = realpath( __DIR__ . '/../../admin/views/wp-ads-code.php' );

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


        $view_path = realpath( __DIR__ . '/../../site/views/wp-ads-code.php' );

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

        $wp_enqueue_util = WP_Enqueue_Util::get_instance();

        $handle = $this->slug . '-admin-styles';
        $relative_path = __DIR__ . '../../admin/css';
        $filename = 'wp-ads-code.min.css';
        $filename_debug = 'wp-ads-code.css';
        $dependencies = array();

        $options = new WP_Enqueue_Options(
            $handle,
            $relative_path,
            $filename,
            $filename_debug,
            $dependencies,
            $this->version
        );

        $wp_enqueue_util->enqueue_style( $options );

    }

}