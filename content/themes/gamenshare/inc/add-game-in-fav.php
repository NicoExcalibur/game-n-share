<?php


function add_favorite_game() {


    global $wpdb;
    $userid = get_current_user_id();
    $postid = $_POST['postid']


    $wpdb->insert(
        'wp_favorites', //table
        array(   //datas
            'user_id' => intval($userid),
            'post_id' => intval($postid),
        ),
        array(  //format
            '%d',   // integer
            '%d',   // integer
        )
    );
}