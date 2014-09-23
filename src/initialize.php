<?php

add_action( 'widgets_init', create_function( '', 'register_widget( "WP_Ads_Code_Widget" );' ) );