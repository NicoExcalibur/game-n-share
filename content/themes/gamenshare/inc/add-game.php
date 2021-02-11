<?php
add_action('init', 'gamenshare_insert_game', 20);

function gamenshare_insert_game(){
    if (is_user_logged_in()) {
        //var_dump($_POST['add_game_field']);
        //var_dump(wp_verify_nonce($_POST['add_game_field'], 'add_game_action'));
        //die();
        if (
        isset($_POST['add_game_field'])
        && wp_verify_nonce($_POST['add_game_field'], 'add_game_action')
    ) {
            //$current_user = wp_get_current_user();

            $user_id =  get_current_user_id();
            $user = get_user_by('id', $user_id);
            wp_set_current_user($user_id, $user->user_login);

            // post game
            $post_title = $_POST['post-title'];
            $post_content = $_POST['post-content'];
            $post_date = $_POST['post-date'];
            $post_cover = 'post-cover';
            $post_screenshot = $_FILES['post-screenshot']['name'];
            $post_editor = $_POST['post-editor'];
            $post_genres = $_POST['post-genre'];
            $post_plateform = $_POST['post-plateform'];
            // var_dump($post_title);
            // var_dump($post_content);
            // var_dump($post_date);
            // var_dump($post_cover);
            // var_dump($post_screenshot);
            // var_dump($post_editor);
            //var_dump($post_genres);
            // var_dump($post_plateform);
            //die();
            /*  $post_genres = array_map( 'intval', $post_genres );
            $post_genres = array_unique( $post_genres );
 */
          

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

         $my_tax = wp_set_post_terms($new_post_id, $post_genres, 'genre' );
         //wp_update_attachment_metadata($new_post_id, $_FILES[$post_cover] );
          if( !empty( $_FILES[$post_cover]['name']  )) { //New upload
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
              
              $override = ['test_form' => false];
            $file = wp_handle_upload( $_FILES[$post_cover], $override ); 
            var_dump($file);
            $wp_upload_dir = wp_upload_dir();
            //var_dump($file);
            $args = [
                'guid' =>$wp_upload_dir['url'].'/'. basename($file['file']),
                'post_title' =>  preg_replace( '/\.[^.]+$/', '', basename($file['file']) ),
                'post_mine_type' => $file['type'],
                'post_status' => 'inherit',
                'post_content' => ''
            ];
            //var_dump($args);
           
            $attachement_id = wp_insert_attachment( $args, $file['url']);
            var_dump($attachement_id);
            $imgAcfIds[] = array('game_cover' => $attachement_id);
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata( $attachement_id, $file['url'] );
            var_dump($attachment_data);
            wp_update_attachment_metadata( $attachement_id, $attachment_data );

            }
           update_field('field_6001b14e06e0a', $post_editor, $new_post_id); // editor field
          update_field('field_6001ce0761277', $post_date, $new_post_id); // release date field
          update_field('field_6001d001b889d', $post_plateform, $new_post_id); // plaform field
         
       update_field('field_600585c17d2a7', $imgAcfIds, $new_post_id); // cover field
 
       
        // update_field('field_601d5af05f123', $post_screenshot, $new_post_id); // screenshot field
        }
    }
}
function gamenshare_form_add_game()
{
    echo '<form class="form row" name="form" method="post" enctype="multipart/form-data">

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
            <label for="post-title" class="orm-label">Date de sortie</label>
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
            <input type="text" name="post-editor" class="form-control" id="post-editor" placeholder="Saisissez l\'éditeur du jeux">
        </div>
        <div class="mb-3">
            <label for="post-genre" class="form-label">Genre</label>
            <select class="form-select" id="post-genre" name="post-genre[]" multiple aria-label="multiple select example">
                <option selected>Choisissez le ou les genre(s)...</option>';



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

    echo '</select>
        </div>
        <div class="mb-3">
            <label for="post-plateform" class="form-label">Plateforme</label>
            <select class="form-select" id="post-plateform" name="post-plateform[]" multiple aria-label="multiple select example">
                <option selected>Choisissez le ou les plateforme(s)...</option>';

    if ($plateforms = get_posts(['post_type' => 'platform', 'orderby' => 'name', 'order' => 'ASC', 'posts_per_page' => 80])) :
        var_dump($plateforms);

        foreach ($plateforms as $plateform) :
            echo '<option value="' . $plateform->ID . '">' . $plateform->post_title . '</option>';

        endforeach;

    endif;

    echo '</select>
        </div>

    </div>
    <div class="col-md-12">
        <input type="hidden" name="ispost" value="1" />
        <input type="hidden" name="userid" value="" />';
    wp_nonce_field('add_game_action', 'add_game_field');
    echo '   <button type="submit" class="btn button-red">Ajouter un jeu</button>
    </div>

</form>';
}

function shortcodes_init()
{
    add_shortcode('add_game', 'gamenshare_form_add_game');
}
add_action('init', 'shortcodes_init');
