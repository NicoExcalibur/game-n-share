<?php

add_filter( 'register_url', 'change_my_register_url' );

function change_my_register_url( $url ) {
    if( is_admin() ) {
        return $url;
    }
    return  home_url('/inscription/');
}