<div class="comments">
        <h4 class="content-header">Commentaires :</h4>
        <div class="comments-list">
            <ol class="comment-list-item my-4">
                <?php
                //Display the list of comments
                wp_list_comments('type=comment&callback=gamenshare_comment');
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
                'class_container'       => 'w-100 border border-primary',
                'class_form'            => 'comment-form border border-danger fs-6',
                'class_submit'          => 'border border-validate',
                // Redefine your own textarea (the comment body).
                'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
            );
            comment_form($comments_args); ?>
        </div>
    </div>
</div>