<?php
/*
Plugin Name: Game'n'Share Settings
Description: Réglages de Game'n'share
Author:  Vincent, Nico
Version: 1.0.0
*/

// Plugin security to make sure of wp environnement
if (!defined('WPINC')) {die();}


// Adding the differents class needed 
require plugin_dir_path(__FILE__) . 'inc/game_cpt.php';
require plugin_dir_path(__FILE__) . 'inc/platform_cpt.php';
require plugin_dir_path(__FILE__) . 'inc/add_favorite.php';
require plugin_dir_path(__FILE__) . 'inc/add_collec.php';
require plugin_dir_path(__FILE__) . 'inc/star_rating.php';



// Games cpt
$game_cpt = new Game_cpt();

register_activation_hook(__FILE__, [$game_cpt, 'activation']);
register_deactivation_hook(__FILE__, [$game_cpt, 'deactivation']);

// Platform cpt
$platform_cpt = new Platform_cpt();

register_activation_hook(__FILE__, [$platform_cpt, 'activation']);
register_deactivation_hook(__FILE__, [$platform_cpt, 'deactivation']);

// Create a favorite table + Add a favorite post in DB 
$add_favorite = new Add_favorite();

register_activation_hook( __FILE__,[$add_favorite, 'activation']);
register_deactivation_hook( __FILE__,[$add_favorite, 'deactivation']); 

// Create a rating table + Add a rating post in DB 
$star_rating = new Star_rating();

register_activation_hook( __FILE__,[$star_rating, 'activation']);
register_deactivation_hook( __FILE__,[$star_rating, 'deactivation']);

// Create a collection table + Add a post in cellection in DB 
$add_collec = new Add_collection();

register_activation_hook( __FILE__,[$add_collec, 'activation']);
register_deactivation_hook( __FILE__,[$add_collec, 'deactivation']); 