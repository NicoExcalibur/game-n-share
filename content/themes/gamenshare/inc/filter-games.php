<?php
add_action('wp_ajax_myfilter', 'gamenshare_filter_games'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'gamenshare_filter_games');

function gamenshare_filter_games()
{
    $args = array(
        'orderby' => 'name', // we will sort posts by date
    );

    $termGenre = [];
    if (isset($_POST['genrefilter'])) {
        $termGenre[] = $_POST['genrefilter'];
    }

    if (!empty($termGenre)) {
        // var_dump($termGenre);
        $args['tax_query'] = [
            [
                'taxonomy' => 'genre',
                'field' => 'id',
                'terms' => $termGenre[0]
            ]
        ];
    } else {
        // get all terms in the taxonomy
        $terms = get_terms('genre');
        // convert array of term objects to array of term IDs
        $term_ids = wp_list_pluck($terms, 'term_id');
        $args['tax_query'] = [
            [
                'taxonomy' => 'genre',
                'field' => 'id',
                'terms' => $term_ids
            ]
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

            echo '<div class="col-sm-6 col-md-4">
                <div class="game">
                <div class="game__imagecover"> <img class="img-fluid" src="' . get_field('game_cover', $query->post->ID) . '" />
                </div>
                <div class="game__info">';
            echo '<h2 class="game__info--title">' . $query->post->post_title . '</h2>';
            echo ' <a href="' . get_permalink($query->post->ID) . '" class="btn button button-red">Voir la fiche</a>';
            echo ' </div>
            </div>
        </div>';

        endwhile;
        wp_reset_postdata();
    else :
        echo 'No posts found';
    endif;

    die();
}
