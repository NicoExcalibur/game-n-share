<?php

function redirect_login_page()
{
  $login_page  = home_url('/login/');
  $page_viewed = basename($_SERVER['REQUEST_URI']);

  if ($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
    wp_redirect($login_page);
    exit;
  }
}

add_action('init', 'redirect_login_page');

function login_failed()
{
  $login_page  = home_url('/login/');
  wp_redirect($login_page . '?login=failed');
  exit;
}

add_action('wp_login_failed', 'login_failed');

function verify_username_password($user, $username, $password)
{
  $login_page  = home_url('/login/');
  if ($username == "" || $password == "") {
    wp_redirect($login_page . "?login=empty");
    exit;
  }
}

add_filter('authenticate', 'verify_username_password', 1, 3);

function logout_page()
{
  $login_page  = home_url('/login/');
  wp_redirect($login_page . "?login=false");
  exit;
}

add_action('wp_logout', 'logout_page');

function login_page()
{
  $login_page  = home_url('/');
  wp_redirect($login_page);
  exit;
}

add_action('wp_login', 'login_page');

function my_custom_redirect()
{
  if (is_page('login') && is_user_logged_in()) {

    $redirect = home_url($path = '/');

    wp_redirect($redirect);
    exit;
  }
}

add_action('template_redirect', 'my_custom_redirect');
