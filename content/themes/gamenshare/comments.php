<div class="comments">
        <h4 class="content-header">Commentaires :</h4>
        <div class="comments-list">
            <ol class="comment-list-item">
                <?php
                //Gather comments for a specific page/post 
                $comments = get_comments(array(
                    'post_id' => $post->ID,
                    'style'     => 'div',
                    'status'  => 'approve' //Change this to the type of comments to be displayed
                ));
        
                //Display the list of comments
                wp_list_comments(array(
                    'per_page'          => 5, //Allow comment pagination
                    'reverse_top_level' => false, //Show the oldest comments at the top of the list
                    'avatar_size'       => 50
                ), $comments);
                ?>
            </ol>
        </div>
        <div class="input-group my-4">
            <?php 
            $comments_args = array(
                // Change the title of send button 
                'label_submit'          => __( 'Envoyer', 'textdomain' ),
                // Change the title of the reply section
                'title_reply'           => __( 'Laissez un commentaire', 'textdomain' ),
                // Remove "Text or HTML to be displayed after the set of comment fields".
                'comment_notes_after'   => '',
                'comment_notes_before'  => '',
                //Message Before Comment
                'comment_notes_before' => __('Vous devez être connectés pour commenter'),
                'cancel_reply_link'     => __('Annuler'),
                'cancel_reply_before'   => ' <small>',
                'cancel_reply_after'    => '</small>',
                'title_reply_to'        => __( 'Leave a Reply to %s' ),
                // Redefine your own textarea (the comment body).
                'comment_field' => '<p class="comment-form-comment"><label for="comment"></label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
            );
            comment_form($comments_args); ?>
        </div>
    </div>
</div>