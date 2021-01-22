<section class="content container">
    <h1 class="">Jeux Vidéo</h1>
    <div class="row">
        <div class="filters col-md-3 dropup">
            <button type="button" class="btn button-filter-mobile btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Filtrer
                </button>
            <div class="dropdown-menu">
                <form>
                    <fieldset>
                        <legend>Filter par genres</legend>
    
                        <?php $terms = get_terms( 
                            array(
                                'taxonomy' => 'genre',
                                'hide_empty' => false,
                            ) );

                            foreach($terms as $term) { ?>
                        <div class="form-check">
                            <input type="checkbox" name="genre" id="<?php echo $term->slug ?>" value="<?php echo $term->slug ?>" class="form-check-input"/>
                            <label for="<?php $term->name ?>" class="form-check-label"><?php echo $term->name ?></label>
                        </div>
                        <?php
                        }   
                        ?>
                    </fieldset>
                    <button type="submit">Appliquer les filtres</button>
                </form>
            </div>
            
        </div>
        <div class="games row col-md-9">
            <?php 
            $args = array( 
                'post_type' => 'game', 
                'posts_per_page' => 10,
                'tax_query' => 
                    array(
                    'relation' => 'AND',
                        array(
                            'taxonomy' => 'genre',
                            'field'    => 'slug',
                            'terms'    => 'action',
                        ),
                    )
            );

            $games = new WP_Query ($args);
            if ($games->have_posts()) : while ($games->have_posts()) : $games->the_post(); ?> 
                <div class="col-sm-6 col-md-4">
                    <div class="game">
                        <div class="game__imagecover">
                           <?php if( get_field('game_cover') ): ?>
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