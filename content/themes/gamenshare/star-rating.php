<?php

global $wpdb;
global $post;

$userid = 2; // User id
$postid = $_POST['postid'];
$rating = $_POST['rating'];

var_dump($_POST);

// Check entry within table
$count = $wpdb->get_results("SELECT COUNT(*) AS cntpost FROM {$wpdb->prefix}rating WHERE post_id={$postid} and user_id={$userid}");

if($count == 0){
    $wpdb->insert( 
        'wp_rating', //table
        array(   //datas
            'id'     => $userid,           
            'post_id'=> $postid, 
            'rating' => $rating
        ), 
        array(  //format
            '%d',   // integer
            '%d',   // integer
            '%d'    // integer
        ) 
    );
}else {
    $wpdb->update( 
        'wp_rating', 
        array( 
            'rating' => $_POST['rating'],
        ),
        array( 'id' => $postid ), // where 
        array( 
            '%d',   // integer
        )
    );
}

// get average
$averageRating = $wpdb->get_var("SELECT ROUND(AVG(rating),1) as averageRating FROM {$wpdb->prefix}rating WHERE post_id={$postid}");

$return_arr = array("averageRating"=>$averageRating);

echo json_encode($return_arr);