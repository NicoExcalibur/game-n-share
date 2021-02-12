<div class="main wrapper">
    <div class="profile-header d-flex flex-row mt-4 flex-wrap">

        <?php
            $userid = wp_get_current_user(); 
            $user = new WP_User( $userid ); ?>

            <?php echo get_avatar( $userid, 250); ?>


        <div class="profile-header-infos col-md-6 col-sm-12 d-flex flex-column">
            <p class="infos-title">Profil de <?php echo $user->display_name; ?></p>
            <ul class="list-group">
                <li class="list-group-item">Rôle : <?php echo $user->roles['0']; ?></li>
                <li class="list-group-item">Nom du compte : <?php echo $user->user_nicename; ?></li>
                <li class="list-group-item">Adresse e-mail : <?php echo $user->user_email; ?></li>
            </ul>
            <div  class="counters d-flex">
                <div>
                    <?php
                    $countgames = $wpdb->get_var(
                        "SELECT COUNT(*) AS cntpost
                        FROM  `{$wpdb->prefix}collection` INNER JOIN  `{$wpdb->prefix}posts` ON  `{$wpdb->prefix}collection`. `post_id` =  `{$wpdb->prefix}posts`. `ID`
                        WHERE `{$wpdb->prefix}collection` . user_id = {$user->ID}
                        AND `{$wpdb->prefix}posts`. `post_type`='game'
                        ");
                
                     ?>
                    <p>Vous possedez <span id="counter"><?php echo $countgames; ?></span>  jeux</p>
                </div>
                <div>
                <?php
                    $countplats = $wpdb->get_var(
                        "SELECT COUNT(*) AS cntpost
                        FROM  `{$wpdb->prefix}collection` INNER JOIN  `{$wpdb->prefix}posts` ON  `{$wpdb->prefix}collection`. `post_id` =  `{$wpdb->prefix}posts`. `ID`
                        WHERE `{$wpdb->prefix}collection` . user_id = {$user->ID}
                        AND `{$wpdb->prefix}posts`. `post_type`='platform'
                        ");
                    ?>
                    <p>Vous possedez <span id="counter"><?php echo $countplats; ?></span> plateformes de jeu</p>
                </div>
            </div>
            <button type="button" class="btn btn-secondary">Supprimer mon compte</button>
        </div>

    </div>
    
    <div class="tabs mt-5">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-games-tab" data-bs-toggle="tab" data-bs-target="#nav-games" type="button" role="tab" aria-controls="nav-games" aria-selected="true">Vos Jeux</button>
            <button class="nav-link" id="nav-platforms-tab" data-bs-toggle="tab" data-bs-target="#nav-platforms" type="button" role="tab" aria-controls="nav-platforms" aria-selected="false">Vos Plateformes</button>
            <button class="nav-link" id="nav-favorites-tab" data-bs-toggle="tab" data-bs-target="#nav-favorites" type="button" role="tab" aria-controls="nav-favorites" aria-selected="false">Vos Favoris</button>
          </div>
        </nav>
        <div class="tab-content rounded" id="nav-tabContent">
            <!-- games panel -->
            <div class="tab-pane fade show active" id="nav-games" role="tabpanel" aria-labelledby="nav-games-tab">
                <?php

                $games = $wpdb->get_results(
                    "SELECT *
                    FROM  `{$wpdb->prefix}collection` INNER JOIN  `{$wpdb->prefix}posts` ON  `{$wpdb->prefix}collection`. `post_id` =  `{$wpdb->prefix}posts`. `ID`
                    WHERE `{$wpdb->prefix}collection` . user_id = {$user->ID}
                    AND `{$wpdb->prefix}posts`. `post_type`='game'
                ");
                // var_dump($games);

                if ($games)
                    foreach ($games as $game) {; ?>
                <div class="col-sm-6 col-md-4">
                    <div class="game">
                        <div class="game__info">
                            <h2 class="game__info--title"><?php echo $game->post_title; ?></h2>
                            <a href="<?php echo $game->guid; ?>" class="btn button button-red">Voir la fiche</a>
                        </div>
                    </div>
                </div>
            <?php }else {
            //nothing displayed
            }
            ?>
            </div>
            <!-- platforms panel -->
            <div class="tab-pane fade" id="nav-platforms" role="tabpanel" aria-labelledby="nav-platforms-tab">
                <?php

                $platforms = $wpdb->get_results(
                    "SELECT *
                    FROM  `{$wpdb->prefix}collection` INNER JOIN  `{$wpdb->prefix}posts` ON  `{$wpdb->prefix}collection`. `post_id` =  `{$wpdb->prefix}posts`. `ID`
                    WHERE `{$wpdb->prefix}collection` . user_id = {$user->ID}
                    AND `{$wpdb->prefix}posts`. `post_type`='platform'
                ");

                if ($platforms)
                    foreach ($platforms as $platform) {; ?>
                <div class="col-sm-6 col-md-4">
                    <div class="game">
                        <div class="game__info">
                            <h2 class="game__info--title"><?php echo $platform->post_title; ?></h2>
                            <a href="<?php echo $platform->guid; ?>" class="btn button button-red">Voir la fiche</a>
                        </div>
                    </div>
                </div>
                <?php }else {
                //nothing displayed
                }
                ?>
            </div>
            <!-- favorites panel -->
            <div class="tab-pane fade" id="nav-favorites" role="tabpanel" aria-labelledby="nav-favorites-tab">
            <?php

            $favorites = $wpdb->get_results(
                "SELECT *
                FROM  `{$wpdb->prefix}favorites` INNER JOIN  `{$wpdb->prefix}posts` ON  `{$wpdb->prefix}favorites`. `post_id` =  `{$wpdb->prefix}posts`. `ID`
                WHERE `{$wpdb->prefix}favorites` . user_id = {$user->ID}
            ");

            if ($favorites)
                foreach ($favorites as $favorite) {; ?>
            <div class="col-sm-6 col-md-4">
                <div class="game">
                    <div class="game__info">
                        <h2 class="game__info--title"><?php echo $favorite->post_title; ?></h2>
                        <a href="<?php echo $favorite->guid; ?>" class="btn button button-red">Voir la fiche</a>
                    </div>
                </div>
            </div>
            <?php }else {
            //nothing displayed
            }
            ?>
            </div>
        </div>
    </div>
</div>