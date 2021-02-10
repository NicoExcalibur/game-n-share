<h1><?php wp_title(''); ?> </h1>

<div class="row">
    <div class="platforms row col-md-9" id="response">
        <?php

        $args = array(
            'post_type' => 'platform',
            'posts_per_page' => 10
        );

        $platforms = new WP_Query($args);
        if ($platforms->have_posts()) : while ($platforms->have_posts()) : $platforms->the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="platform">
                        <div class="platform__image">
                            <?php if (get_field('')) : ?>
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
        endif;
        ?>
    </div>

</div>
</section>