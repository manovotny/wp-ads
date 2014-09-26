<?php

switch ( $visibility ) {

    case 'both':

        echo $code;

        break;

    case 'desktop':

        if ( ! wp_is_mobile() ) {

            echo $code;

        }

        break;

    case 'mobile':

        if ( wp_is_mobile() ) {

            echo $code;

        }

        break;

}