<?php

function gamenshare_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body d-flex flex-row justify-content-around mb-2 rounded" ><?php
    } ?>
        <div class="comment-author vcard d-flex flex-column align-self-center"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, 80, '', '', array('class' => 'rounded-circle border border-4') ); 
            } 
            printf( __( '<cite class="fn text-center mt-2">%s</cite>' ), get_comment_author() ); ?>
        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>
        <div class="d-flex flex-column w-50">
            <div class="comment-meta commentmetadata">
                <p>Posté le
                    <span><?php
                        comment_date();
                    ?></span>
                </p>
            </div>
            <?php comment_text(); ?>
        </div>
 
        <div class="reply">
            <?php
            edit_comment_link( __( 'Edit' ), '  ', '' ); ?>
            <br>
            <br>
            <?php 
            comment_reply_link( 
                array_merge( 
                    $args, 
                    array( 
                        'add_below' => $add_below, 
                        'depth'     => $depth, 
                        'max_depth' => $args['max_depth'] 
                    ) 
                ) 
            ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}

add_filter('login_url','gamenshare_login_url');

function gamenshare_login_url($login_url) {

    return home_url('/login/');
}