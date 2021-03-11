<?php
add_filter( 'show_admin_bar' , 'gamenshare_admin_bar');

function gamenshare_admin_bar($show_admin_bar) {
    return ( current_user_can( 'administrator' ) ) ? $show_admin_bar : false;
}