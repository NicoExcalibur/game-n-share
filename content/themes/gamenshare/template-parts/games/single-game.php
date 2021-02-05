<div class="main d-flex flex-column">
    <img src="https://source.unsplash.com/1300x300/?videogame" class="img-fluid mx-auto mb-5" alt="...">
    <div class="game_infos row">
        <div class="game_infos_left col-md-8">
            <div class="game_infos_title mb-4"><h1 class="text-start"><?php the_title(); ?></h1></div>
            <div class="game_infos_text"><?php the_content(); ?> </div>
        </div>
        <div class="game_infos_right d-flex col-md-4 flex-column align-items-end">
            <button type="button" class="btn button-red mb-4 pl-2">Ajouter à mes favoris</button>
            <div class="game_infos_details mb-4">
                <h4 class="content-header">Details sur le jeu : </h4>
                <ul class="list-group list-group-flush">
                    <?php $terms = get_the_terms( get_the_ID(), 'genre' ); ?> 

                    <li class="list-group-item"><span class="item-bold">Genre(s) : </span><?php foreach ($terms as $term) {
                        ?> <a href="#"> <?php echo $term->name; ?> </a>        
                        <?php }; ?></li>
                    <li class="list-group-item"><span class="item-bold">Plateforme(s) : </span><?php
                        $featured_posts = get_field('platform');
                        if( $featured_posts ): ?>
                            <ul>
                            <?php foreach( $featured_posts as $featured_post ): 
                                $permalink = get_permalink( $featured_post->ID );
                                $title = get_the_title( $featured_post->ID );
                                $custom_field = get_field( 'platform', $featured_post->ID );
                                ?>
                                <li>
                                    <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
                                    <span<?php echo esc_html( $custom_field ); ?></span>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                    <li class="list-group-item"><span class="item-bold">Sorti le :</span> <?php the_field('date'); ?></li>
                    <li class="list-group-item"><span class="item-bold">Editeur : </span><?php the_field('editor'); ?></li>
                </ul>
            </div>
            <div class="game_infos_rating">
                <h4 class="content-header">Note du jeu :</h4>
                <div class=”rating_stars”>
                    étoile étoile
                </div>
            </div>
        </div>
    </div>
    <?php comments_template('./comments.php', true); ?>
