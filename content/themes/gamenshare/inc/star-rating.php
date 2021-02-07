<?php
add_action('wp_ajax_get_star_rating', 'gamesnshare_get_star_rating');
//add_action('wp_ajax_nopriv_get_star_rating', 'gamesnshare_get_star_rating');
function gamesnshare_get_star_rating()
{
    global $wpdb;
    global $post;

    $userid = get_current_user_id(); // User id
    $postid = $_POST['postid'];
    $rating = $_POST['rating'];

    // Check entry within table
    $count = $wpdb->get_var("SELECT COUNT(*) AS cntpost FROM {$wpdb->prefix}rating WHERE post_id={$postid} and user_id={$userid}");
    //var_dump($count);
    if ($count == '0') {

        $wpdb->insert(
            'wp_rating', //table
            array(   //datas
                'user_id' => intval($userid),
                'post_id' => intval($postid),
                'rating' => intval($rating)
            ),
            array(  //format
                '%d',   // integer
                '%d',   // integer
                '%d'    // integer
            )
        );
    } else {
        $wpdb->update(
            'wp_rating',
            array(
                'rating' => intval($rating),
            ),
            array(
                'user_id' => intval($userid),
                'post_id' => intval($postid),
            ), // where 
            array(
                '%d',   // integer
            ),
            array(
                '%d',   // integer
                '%d',   // integer
            )
        );
    }

    // get average
    $averageRating = $wpdb->get_var("SELECT ROUND(AVG(rating),1) as averageRating FROM {$wpdb->prefix}rating WHERE post_id={$postid}");
    $data = array('averageRating' => $averageRating);
    header( "Content-Type: application/json" );

    echo json_encode($data);

    die();
}
