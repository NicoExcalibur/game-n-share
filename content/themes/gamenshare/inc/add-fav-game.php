<?php
add_action('wp_ajax_add_fav_game', 'gamenshare_add_fav_game');

function gamenshare_add_fav_game()
{
    global $wpdb;

    $userid = get_current_user_id(); // User id
    $postid = $_POST['postid'];

     // Check entry within table
     $count = $wpdb->get_var("SELECT COUNT(*) AS cntpost FROM {$wpdb->prefix}favorites WHERE post_id={$postid} and user_id={$userid}");

     if ($count == '0') {

        $wpdb->insert(
            'wp_favorites', //table
            array(   //datas
                'user_id' => $userid,
                'post_id' => $postid
            ),
            array(  //format
                '%d',   // integer
                '%d'    // integer
            )
        );
    } else {
        $wpdb->delete(
            'wp_favorites', //table
            array(   //where
                'user_id' => $userid,
                'post_id' => $postid
            )
        );
    }
	wp_die();

}