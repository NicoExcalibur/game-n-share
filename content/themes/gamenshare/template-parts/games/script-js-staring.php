<?php
$userid = get_current_user_id();
$postid = $post->ID;
global $wpdb;

// User rating
$user_rating = $wpdb->get_var("SELECT `rating` FROM {$wpdb->prefix}rating WHERE post_id={$postid} and user_id={$userid}");

// get average
$average = $wpdb->get_var("SELECT ROUND(AVG(rating),1) as averageRating FROM {$wpdb->prefix}rating WHERE post_id={$postid}")
?>
<script type='text/javascript'>
    const $ = jQuery;
    $(document).ready(function() {
        $('#rating_<?php echo $postid; ?>').barrating('set', <?php echo $user_rating; ?>);
    });
</script>