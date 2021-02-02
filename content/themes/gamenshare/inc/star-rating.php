<?php

global $wpdb;
$userid = get_current_user_id(); // User id
$postid = $_POST->ID;
$rating = $_POST['rating'];
var_dump($_POST);


// Check entry within table
$count = $wpdb->get_results("SELECT COUNT(*) AS cntpost FROM {$wpdb->prefix}rating WHERE post_id={$postid} and user_id={$userid}");


if($count == 0){
    $wpdb->insert( 
        'wp_rating', 
        array(
            'id'     => $userid,
            'post_id'=> $postid, 
            'rating' => $_POST['rating']
        ), 
        array( 
            '%d',   // integer
            '%d',   // integer
            '%d'    // integer
        ) 
    );
    //$insertquery = "INSERT INTO post_rating(userid,postid,rating) values(".$userid.",".$postid.",".$rating.")";
}else {
    $wpdb->update( 
        'wp_rating', 
        array( 
            'rating' => $_POST['rating'],
        ), 
        array( 
            '%d',   // integer
        )
    );
    // $updatequery = "UPDATE post_rating SET rating=" . $rating . " where userid=" . $userid . " and postid=" . $postid
}

// get average
$averageRating = $wpdb->get_var("SELECT ROUND(AVG(rating),1) as averageRating FROM {$wpdb->prefix}rating WHERE post_id={$_POST->ID}");

$return_arr = array("averageRating"=>$averageRating);

echo json_encode($return_arr);