<?php
add_action('init', 'gamenshare_insert_game', 20);
//add_action('wp_ajax_insert_game', 'gamesnshare_insert_game');
function gamenshare_insert_game()
{
    if (is_user_logged_in()) {

        if (
            isset($_POST['add_game_field'])
            && wp_verify_nonce($_POST['add_game_field'], 'add_game_action')
        ) {
            //$current_user = wp_get_current_user();
           
            $user_id =  get_current_user_id();
            $user = get_user_by('id', $user_id);
            wp_set_current_user($user_id, $user->user_login);

            // post game
            $post_title =  sanitize_title($_POST['post-title']);
            $post_content =  sanitize_textarea_field($_POST['post-content']);
            $post_date = $_POST['post-date'];
            $post_cover = 'post-cover';
            $post_screenshot = 'post-screenshot';
            $post_editor = $_POST['post-editor'];
            $post_genres = isset($_POST['post-genre']) ? sanitize_term($_POST['post-genre'], 'genre') : 'Choisissez le ou les plateforme(s)...' ; 
            $post_plateform = isset($_POST['post-plateform']) ? $_POST['post-plateform'] : 'Choisissez le ou les plateforme(s)...' ;
            $errors = [];
            if (!isset($post_title)) {
                $errors['post-title'] = true;
            }
            if (!isset($post_content)) {
                $errors['post-content'] = true;
            }
            if (!isset($post_date)) {
                $errors['post-date'] = true;
            }
            if (!isset($post_editor)) {
                $errors['post-editor'] = true;
            }
            if (!isset($post_genres)) {
                $errors['post-genre'] = true;
            }
            if (!isset($post_plateform)) {
                $errors['post-platorm'] = true;
            }
            //var_dump($errors);
            if(empty($errors)){

                $new_post = [
                    'post_title' => $post_title,
                    'post_content' => $post_content,
                    'post_status' => 'publish',
                    'post_type' => 'game',
                ];
    
                $new_post_id = wp_insert_post($new_post, true);
                if ($user) {
                    wp_set_current_user($user_id, $user->user_login);
                }
    
                $my_tax = wp_set_post_terms($new_post_id, $post_genres, 'genre');
                if (!function_exists('media_handle_upload')) {
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    require_once(ABSPATH . 'wp-admin/includes/file.php');
                    require_once(ABSPATH . 'wp-admin/includes/media.php');
                }
                if (!empty($_FILES[$post_cover]) || !empty($_FILES[$post_screenshot])) { //New upload
                    
                    $cover = media_handle_upload($post_cover, $new_post_id);
                    $screenshot = media_handle_upload($post_screenshot, $new_post_id);
                }
                update_field('field_6001b14e06e0a', $post_editor, $new_post_id); // editor field
                update_field('field_6001ce0761277', $post_date, $new_post_id); // release date field
                update_field('field_6001d001b889d', $post_plateform, $new_post_id); // plaform field
    
                update_field('field_600585c17d2a7', $cover, $new_post_id); // cover field       
                update_field('field_601d5af05f123', $screenshot, $new_post_id); // screenshot field
               // return wp_redirect(home_url());
            }
            if ( $new_post_id != 0 )  {
                $results = '*Post Added';
            }
            else {
                $results = '*Error occurred while adding the post';
            }
            $data = array('results' => $results);
         
           
            $post_link = get_post_permalink($new_post_id);
            wp_safe_redirect( $post_link );
           
            exit;
            
        }
    } else {
      // return $errors;
    }
}
function sample_admin_notice__success() {
    ?>
    <div  class="alert alert-success" role="alert">
        <p><?php _e( 'Done!', 'sample-text-domain' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'sample_admin_notice__success' );
function gamenshare_form_add_game()
{

    ob_start(); ?>
    
    <form id="addpost" class="form row needs-validation" name="form" method="post" enctype="multipart/form-data" novalidate>

    <div class="col-md-8">
        <div class="mb-3">
            <label for="post-title" class="form-label">Saisissez le titre</label>
            <input type="text" class="form-control" name="post-title" id="post-title" placeholder="Saisissez le titre" required>
            <div class="invalid-feedback">
                Veuillez mettre un titre
          </div>
        </div>
        <div class="mb-3">
            <label for="post-content" class="form-label">écrivez la description</label>
            <textarea class="form-control" name="post-content" id="post-content" rows="6" required></textarea>
            <div class="invalid-feedback">
                Veuillez mettre une description
            </div>
        </div>
        <div class="mb-3">
            <label for="post-date" class="orm-label">Date de sortie</label>
            <input type="date" name="post-date" class="form-control" id="post-date" required>
            <div class="invalid-feedback">
                Veuillez mettre une date de sortie
            </div>
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
            <input type="text" name="post-editor" class="form-control" id="post-editor" placeholder="Saisissez l\'éditeur du jeux" required>
            <div class="invalid-feedback">
                Veuillez mettre un éditeur
            </div>
        </div>
        <div class="mb-3">
            <label for="post-genre" class="form-label">Genre</label>
            <select class="form-select" id="post-genre" name="post-genre[]" multiple aria-label="multiple select" required>
                <option disabled value="">Choisissez le ou les genre(s)...</option>

                <?php

                    $args = [
                        'taxonomy'  => 'genre',
                        'orderby'   => 'name',
                        'hide_empty' => false,
                    ];
                    if ($terms = get_terms($args)) :


                        foreach ($terms as $term) :
                            echo '<option value="' . $term->term_taxonomy_id  . '">' . $term->name . '</option>';
                        endforeach;

                    endif;
                    ?>
                    </select>
                    <div class="invalid-feedback">
                        Veuillez choisir au moins un genre
                    </div>
        </div>
        <div class="mb-3">
            <label for="post-plateform" class="form-label">Plateforme</label>
            <select class="form-select" id="post-plateform" name="post-plateform[]" multiple aria-label="multiple select" required >
                <option disabled >Choisissez le ou les plateforme(s)...</option>';
                    <?php
                if ($plateforms = get_posts(['post_type' => 'platform', 'orderby' => 'name', 'order' => 'ASC', 'posts_per_page' => 80])) :
                    var_dump($plateforms);

                    foreach ($plateforms as $plateform) :
                        echo '<option value="' . $plateform->ID . '">' . $plateform->post_title . '</option>';

                    endforeach;

                endif;
              ?>
                </select>
                <div class="invalid-feedback">
                    Veuillez choisir au moins une plateforme
                </div>
        </div>

    </div>
    <div class="col-md-12">
        <input type="hidden" name="ispost" value="1" />
        <input type="hidden" name="userid" value="" />
   <?php wp_nonce_field('add_game_action', 'add_game_field'); ?>
      <button type="submit" class="btn button-red">Ajouter un jeu</button>
    </div>

</form>
<?php
$html = ob_get_clean();
return $html;
}

function shortcodes_init()
{
    add_shortcode('add_game', 'gamenshare_form_add_game');
}
add_action('init', 'shortcodes_init');
