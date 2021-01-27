<?php
// Inclusion de nos enqueues
require 'inc/enqueues.php';
require 'inc/theme-setup.php';
require 'inc/menu-class.php';
require 'inc/filter-games.php';
require 'inc/login.php';

if ( !function_exists( 'wp_star_rating' ) ) { 
    require_once ABSPATH . '/wp-admin/includes/template.php'; 
} 
