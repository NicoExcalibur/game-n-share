<div class="col-md-12">
   
    <form class="form row" name="form" method="post" enctype="multipart/form-data">

        <div class="col-md-8">
            <div class="mb-3">
                <label for="post-title" class="form-label">Saisissez le titre</label>
                <input type="text" class="form-control" name="post-title" id="post-title" placeholder="Saisissez le titre">
            </div>
            <div class="mb-3">
                <label for="post-content" class="form-label">écrivez la description</label>
                <textarea class="form-control" name="post-content" id="post-content" rows="6"></textarea>
            </div>
            <div class="mb-3">
                <label for="post-date" class="form-label">Date de sortie</label>
                <input type="date" name="post-date" class="form-control" id="post-date">
            </div>
            <div class="mb-3">
                <label for="post-cover" class="form-label">Jacquette ou couverture du jeu</label>
                <input class="form-control" name="post-cover" type="file" id="post-cover">
            </div>
            <div class="mb-3">
                <label for="post-screenshot" class="form-label">Image du jeux ou screenshot</label>
                <input class="form-control" name="post-screenshot" type="file" id="post-screenshot">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="post-editor" class="form-label">&Eacute;diteur</label>
                <input type="text" name="post-editor" class="form-control" id="post-editor" placeholder="Saisissez l'éditeur du jeux">
            </div>
            <div class="mb-3">
                <label for="post-genre" class="form-label">Genre</label>
                <select class="form-select" id="post-genre" name="post-genre[]" multiple aria-label="multiple select example">
                    <option selected>Choisissez le ou les genre(s)...</option>
                    <?php


                    $args = [
                        'taxonomy'  => 'genre',
                        'orderby'   => 'name',
                        'hide_empty' => false,
                    ];
                    if ($terms = get_terms($args)) :


                        foreach ($terms as $term) :
                            echo '<option value="' . $term->term_taxonomy_id . '">' . $term->name . '</option>';

                        endforeach;

                    endif;
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="post-plateform" class="form-label">Plateforme</label>
                <select class="form-select" id="post-plateform" name="post-plateform[]" multiple aria-label="multiple select example">
                    <option selected>Choisissez le ou les plateforme(s)...</option>
                    <?php
                    if ($plateforms = get_posts(['post_type' => 'platform', 'orderby' => 'name', 'order' => 'ASC', 'posts_per_page' => 80])) :
                        var_dump($plateforms);

                        foreach ($plateforms as $plateform) :
                            echo '<option value="' . $plateform->ID . '">' . $plateform->post_title . '</option>';

                        endforeach;

                    endif;
                    ?>
                </select>
            </div>

        </div>
        <div class="col-md-12">
            <input type="hidden" name="ispost" value="1" />
            <input type="hidden" name="userid" value="" />
            <?php wp_nonce_field('add_game_action', 'add_game_field'); ?>
            <button type="submit" class="btn button-red">Ajouter un jeu</button>
        </div>

    </form>
 

<?=  do_shortcode( ' [add_game] ' );?>
</div>