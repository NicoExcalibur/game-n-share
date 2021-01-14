<<?php
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
require plugin_dir_path(__FILE__) . 'inc/add_favorite.php';



// Games cpt
$game_cpt = new Game_cpt();

register_activation_hook(__FILE__, [$game_cpt, 'activation']);
register_deactivation_hook(__FILE__, [$game_cpt, 'deactivation']);

// Create a favorite table + Add a favorite post in DB 
$add_favorite = new Add_favorite();

register_activation_hook( __FILE__,[$add_favorite, 'activation']);
register_deactivation_hook( __FILE__,[$add_favorite, 'deactivation']); 