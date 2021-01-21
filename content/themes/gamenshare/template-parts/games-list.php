<section class="content container">
    <h1 class="">Jeux Vidéo</h1>
    <div class="row">
        <div class="filters col-md-3 dropup">
            <button type="button" class="btn button-filter-mobile btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Filtrer
                </button>
            <div class="dropdown-menu">
                <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                    <fieldset>
                        <legend>Filter par genres</legend>
                        <?php $terms = get_terms( 
                            array(
                                'taxonomy' => 'genre',
                                'hide_empty' => false,
                            ) );

                            foreach($terms as $term) { ?>
                        <div class="form-check">
                            <input type="checkbox" name="<?php echo $term->name ?>" id="<?php echo $term->slug ?>" class="form-check-input" onchange="change()">
                            <label for="<?php $term->name ?>" class="form-check-label"><?php echo $term->name ?></label>
                        </div>
                        <?php 
                        }   
                        ?>
                    </fieldset>
                </form>
            </div>
            
        </div>
        <div class="games row col-md-9">
            <?php 
            $args = array( 'post_type' => 'game', 'posts_per_page' => 10 );
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