<div class="comments">
        <h4 class="content-header">Commentaires :</h4>
        <div class="comments_list">
        <ol class="commentlist">
            <?php
            //Gather comments for a specific page/post 
            $comments = get_comments(array(
                'post_id' => $post->ID,
                'status' => 'approve' //Change this to the type of comments to be displayed
            ));
    
            //Display the list of comments
            wp_list_comments(array(
                'per_page' => 10, //Allow comment pagination
                'reverse_top_level' => false //Show the oldest comments at the top of the list
            ), $comments);
            ?>
        </ol>
        </div>
        <div class="input-group my-4">
            <?php 
            comment_form(); ?>
        </div>
    </div>
</div>