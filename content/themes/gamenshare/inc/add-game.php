<?php

if(is_user_logged_in())
{
    if(isset($_POST['ispost'])){
       $current_user = wp_get_current_user();

		$user_login = $current_user->user_login;
		$user_email = $current_user->user_email;
		$user_firstname = $current_user->user_firstname;
		$user_lastname = $current_user->user_lastname;
        $user_id = $current_user->ID;
        
        // post game
        $post_title = $_POST['post-title'];
		$post_content = $_POST['post-content'];
        $post_date = $_POST['post-date'];
        $post_cover = $_FILES['post-cover']['name'];
        $post_editor = $_POST['post-editor'];
		$post_genres = $_POST['post-genre'];
        $post_plateform = $_POST['post-plateform'];
    }
}