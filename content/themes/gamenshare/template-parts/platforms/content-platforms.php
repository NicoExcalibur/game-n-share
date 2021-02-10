<h1><?php wp_title(''); ?>s </h1>

<div class="row justify-content-center">
    <div class="platforms row col-md-9" id="response">
        <?php

        // pagination param
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        $args = array(
            'post_type'      => 'platform',
            'posts_per_page' => 9,
            'paged'          => $paged //pagination
        );

        $platforms = new WP_Query($args);
        if ($platforms->have_posts()) : while ($platforms->have_posts()) : $platforms->the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="platform">
                        <div class="platform__image">
                            <?php if (get_field('game_cover')) : ?>
                                <img class="img-fluid" src="<?php the_field('game_cover'); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="platform__info">
                            <h2 class="platform__info--title"><?php the_title(); ?></h2>
                            <a href="<?php the_permalink(); ?>" class="btn button button-red">Voir la fiche</a>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
        ?>
            <!-- pagination -->
            <div class="pagination d-flex justify-content-between">
                <div class="btn pagination-next order-2">
                    <?php next_posts_link('Suivant >', $platforms->max_num_pages); ?>
                </div>
                <div class="btn pagination-prev order-1">
                    <?php previous_posts_link('< précédent'); ?>
                </div>
                <?php else : ?>
                <!-- No posts found -->
            </div>
        <?php
        endif;
        ?>
    </div>

</div>
</section>