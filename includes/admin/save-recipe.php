<?php 

function vp_save_post_recipe($postID) {
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }

    $rating = get_post_meta($postID, 'recipe_rating' , true );
    $rating = empty($rating) ? 0 : floatval($rating);

    update_post_meta($postID, 'recipe_rating' , $rating);
}