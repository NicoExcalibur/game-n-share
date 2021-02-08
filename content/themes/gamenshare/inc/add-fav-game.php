<?php
add_action('wp_ajax_add_fav_game', 'gamesnshare_add_fav_game');
//add_action('wp_ajax_nopriv_get_star_rating', 'gamesnshare_get_star_rating');
function gamesnshare_add_fav_game()
{
    global $wpdb;
	$whatever = intval( $_POST['whatever'] );
	$whatever += 10;
        echo $whatever;
	wp_die();

}