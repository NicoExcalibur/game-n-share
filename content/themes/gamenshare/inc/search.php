<?php 

add_filter('pre_get_posts', 'filter_search_cpt_threads');
/** filter search for games & platforms CPT */
function filter_search_cpt_threads($query)
{
    if( $query->is_search ) $query->set('post_type', array('game', 'platform'));

    return $query;
}