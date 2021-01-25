<h1><?php wp_title(''); ?> </h1>
<div class="row">
    <div class="filters col-md-3 dropup">
        <button type="button" class="btn button-filter-mobile btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Filtrer
        </button>
        <div class="dropfilter">
            
            <form action="<?= site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                <fieldset>
                    <legend class="legend">Filtrez par genres</legend>
                    <?php
                    if ($terms = get_terms(['taxonomy' => 'genre', 'orderby' => 'name'])) :


                        foreach ($terms as $term) :
                            echo '<div class="form-check">';
                            echo '<input type="checkbox" value="' . $term->term_id . '" name="genrefilter[]" id="' . $term->term_id . '" class="form-check-input">';
                            echo '<label for="' . $term->term_id . '" class="form-check-label">' . $term->name . ' ' . '<span class="badge rounded-pill">' . $term->count . '</span>' . '</label>';
                            echo  '</div>';

                        endforeach;

                    endif;
                    ?>



                </fieldset>
                <button>Filtrez</button>
                <input type="hidden" name="action" value="myfilter">

            </form>
        </div>

    </div>
    <div class="games row col-md-9" id="response">
        <?php
        $terms = get_terms('genre');
        $termSlug = wp_list_pluck($terms, 'slug');

        $args = array(
            'post_type' => 'game',
            'posts_per_page' => 10,
            'tax_query' =>
            array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'genre',
                    'field'    => 'slug',
                    'terms'    => $termSlug,
                ),
            )
        );

        $games = new WP_Query($args);
        if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="game">
                        <div class="game__imagecover">
                            <?php if (get_field('game_cover')) : ?>
                                <img class="img-fluid" src="<?php the_field('game_cover'); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="game__info">
                            <h2 class="game__info--title"><?php the_title(); ?></h2>
                            <a href="<?php the_permalink(); ?>" class="btn button button-red">Voir la fiche</a>
                        </div>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>
    </div>

</div>
</section>