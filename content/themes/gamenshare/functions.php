<?php
// Inclusion de nos enqueues
require 'inc/enqueues.php';
require 'inc/theme-setup.php';
require 'inc/menu-class.php';
require 'inc/filter-games.php';
require 'inc/login.php';
require 'inc/custom-comment.php';
require 'inc/star-rating.php';
require 'inc/add-fav-game.php';
require 'inc/add-collec.php';
require 'inc/register.php';
require 'inc/search.php';

function css_custom_acf()
{
    echo '<style>
            .editor{
                margin-bottom: 1em!important;
            }
         </style>';
}
add_action('admin_head', 'css_custom_acf');

add_filter('pre_get_posts', 'filter_search_cpt_threads');
/** filter search for threads CPT */
function filter_search_cpt_threads($query)
{
    if( $query->is_search ) $query->set('post_type', array('game', 'platform'));

    return $query;
}