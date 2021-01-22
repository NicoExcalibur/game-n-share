<?php
// Inclusion de nos enqueues
require 'inc/enqueues.php';
require 'inc/theme-setup.php';
require 'inc/menu-class.php';


function gamenshare_pre_get_posts($query){
    if(is_admin() || !is_home()){
        return;
    }
    var_dump($query);
}

add_action('pre_get_posts', 'gamenshare_pre_get_posts');