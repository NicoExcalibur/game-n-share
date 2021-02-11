<?php  // renommer le fichier avec le nom du CPT /!\ ?>

<div class="main d-flex flex-column mt-3">
    <div class="platform_infos row">
        <div class="platform_infos_left col-md-9">
            <div class="platform_infos_title mb-4">
                <h1 class="text-start"><?php the_title(); ?></h1>
            </div>
            <div class="platform_infos_text"><?php the_content(); ?> </div>
        </div>
        <div class="platform_infos_right  col-md-3">
            <?php
            $userid = get_current_user_id();
            // var_dump($userid);
            $postid = $post->ID;
            global $wpdb;
            
            
            $countcollec = $wpdb->get_var("SELECT COUNT(*) AS cntpost FROM `{$wpdb->prefix}collection` WHERE post_id={$postid} and user_id={$userid}");
            
            if (is_user_logged_in()) {
            
                if ( $countcollec == 0) {
                ?>
                    <button type="button" data-id="add_<?php echo $post->ID ?>" class="btn mb-4 pl-2 collec-button collec-button-add" data-current-state="0">Ajouter à ma collection</button>
                <?php
                } else {
                ?>
                    <button type="button" data-id="add_<?php echo $post->ID ?>" class="btn mb-4 pl-2 collec-button collec-button-delete" data-current-state="1">Retirer de ma collection</button>
                <?php 
                } 
            } else {
            ?>
                <div>
                <p class="small-p connect_for_raiting">
                    <a href="' . home_url('/login/') . '">Connectez-vous pour ajouter cette plateforme à votre collection</a> 
                </p>
            </div>
            <?php
            }
            ?>
                <div class="game_infos_cover rounded mb-4">
                    <?php if (get_field('platform_pic')) : ?>
                        <img class="img-small" src="<?php the_field('platform_pic'); ?>" />
                    <?php endif; ?>
                </div>
   
            <div class="game_infos_details rounded-bottom mb-4">
                <h4 class="content-header">Details sur la plateforme : </h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="item-bold">Constructeur : </span><?php the_field('builder'); ?>
                    </li>
                    <li class="list-group-item">
                        <span class="item-bold">Sorti le :</span> <?php the_field('date'); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php comments_template('/comments.php', true); ?>

