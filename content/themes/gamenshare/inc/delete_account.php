<?php
//add_action('wp_ajax_delete_account', 'gamenshare_delete_account');
if (is_user_logged_in() && isset($_POST['delete_account_field']) && wp_verify_nonce($_POST['delete_account_field'], 'delete_account_action')) {
add_action( 'init', 'gamenshare_delete_account' );
  }

function gamenshare_delete_account()
{
    $user= wp_get_current_user(); 
    $userID = $user->ID;
    
    $receiveUserID = intval($_POST['userid']);
    require_once( ABSPATH.'wp-admin/includes/user.php' );
        //if ($userID == $receiveUserID) {
        wp_delete_user($userID, 1);
   
        //}
  
// Logout
wp_redirect( home_url() );
exit;
}