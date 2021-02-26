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
    
    wp_localize_script( 
      'app',
      'frontendajax', 
      ['ajaxurl' => admin_url( 'admin-ajax.php' )]
    );
    
    wp_localize_script( 
      'app',
      'ajaxobject',
      ['ajaxurl' => admin_url( 'admin-ajax.php' )] 
    );
    
    wp_localize_script( 
      'app',
      'ajaxadd',
      ['ajaxurl' => admin_url( 'admin-ajax.php' )] 
    ); 
    wp_localize_script( 
      'app',
      'ajaxaddpost',
      ['ajaxurl' => admin_url( 'admin-ajax.php' )] 
    ); 
  }
}

add_action('wp_enqueue_scripts', 'gamesnshare_enqueue');
