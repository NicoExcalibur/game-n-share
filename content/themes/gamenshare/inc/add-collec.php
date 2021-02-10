<?php
add_action('wp_ajax_add_collection', 'gamenshare_add_collection');

function gamenshare_add_collection() {


    global $wpdb;

    $userid = get_current_user_id(); // User id
    $postid = $_POST['postid'];

    // Check entry within table
    $count = $wpdb->get_var("SELECT COUNT(*) AS cntpost FROM {$wpdb->prefix}`collection` WHERE post_id={$postid} and user_id={$userid}");

    if ($count == '0') {

    $wpdb->insert(
        'wp_collection', //table
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
        'wp_collection', //table
        array(   //where
            'user_id' => $userid,
            'post_id' => $postid
        )
    );
    }
	wp_die();
}