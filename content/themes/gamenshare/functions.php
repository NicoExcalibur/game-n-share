<?php
// Inclusion de nos enqueues
require 'inc/enqueues.php';

// function gamenshare_pre_get_posts(wp_Query $query) {

    
//     if (is_admin() || !is_home() || $query->is_main_query()){
//         return;
//     }
   
//     if (get_query_var('genre') === $term->slug) {
//         $meta_query = $query->get('meta_query', []);
//         $meta_query[] = [
//             'key' => 'genre',
//             'compare' => 'EXISTS',
//         ];
//         $query->set('meta_query', $meta_query);
//     }
  
// }


// function gamenshare_query_vars($params) {
//     $params[] = 'genre';
//     return $params;
// }

// add_action('pre_get_posts', 'gamenshare_pre_get_posts');
// add_filter('query_vars', 'gamenshare_query_vars');