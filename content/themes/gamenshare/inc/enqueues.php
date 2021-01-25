<?php

if (!function_exists('gamesnshare_enqueue')) {
  function gamesnshare_enqueue()
  {
    wp_enqueue_style(
      'main-style',
      get_theme_file_uri('public/app.c3f9f951.css'),
      [],
      '20200609'
    );
    wp_enqueue_script(
      'app',
      get_theme_file_uri('public/app.c3f9f951.js'),
      [],
      '20200609',
      true
    );
   
  }
}

add_action('wp_enqueue_scripts', 'gamesnshare_enqueue');