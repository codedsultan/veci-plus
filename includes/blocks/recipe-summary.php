<?php 

function vp_recipe_summary_render_cb($atts, $content ,$block){
   $prepTime  = isset($atts['prepTime']) ? esc_html($atts['prepTime']): '' ;
   $cookTime  = isset($atts['cookTime']) ? esc_html($atts['cookTime']): '' ;
   $course  = isset($atts['course']) ? esc_html($atts['course']): '' ;
   
   $postID = $block->context['postId'];
   $postTerms = get_the_terms($postID, 'cuisine');
   $postTerms = is_array($postTerms)? $postTerms : [];
   $cuisines = '';
   $lastKey = array_key_last($postTerms);
   foreach($postTerms as $key => $term) {
        $url = get_term_meta( $term->term_id,'more_info_url', true );
        $comma = $key === $lastKey ? '' : ',';
        $cuisines .= "<a href='{$url}' target='_blank'>{$term->name}</a>{$comma} ";
   }

   $rating = get_post_meta($postID , 'recipe_rating' ,true);
   global $wpdb;
   $userID = get_current_user_id();
   $ratingCount = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM {$wpdb->prefix}recipe_ratings
        WHERE post_id=%d AND user_id=%d",
        $postID,$userID
   )); // aletnative to count with $x= $wpdb->get_results() & $x->num_rows// good for only counts 
    ob_start();
    ?>
        <div class="wp-block-veci-plus-recipe-summary">
        <i class="bi bi-alarm"></i>
        <div class="recipe-columns-2">
            <div class="recipe-metadata">
            <div class="recipe-title">
                <?php _e('Prep Time', 'veci-plus'); ?>
            </div>
            <div class="recipe-data recipe-prep-time">
                <?php echo $prepTime; ?>
            </div>
            </div>
            <div class="recipe-metadata">
            <div class="recipe-title">
                <?php _e('Cook Time', 'veci-plus'); ?>
            </div>
            <div class="recipe-data recipe-cook-time">
                <?php echo $cookTime; ?>
            </div>
            </div>
        </div>
        <div class="recipe-columns-2-alt">
            <div class="recipe-columns-2">
            <div class="recipe-metadata">
                <div class="recipe-title">
                <?php _e('Course', 'veci-plus'); ?>
                </div>
                <div class="recipe-data recipe-course">
                <?php echo $course; ?>
                </div>
            </div>
            <div class="recipe-metadata">
                <div class="recipe-title">
                <?php _e('Cuisine', 'veci-plus'); ?>
                </div>
                <div class="recipe-data recipe-cuisine">
                    <?php echo $cuisines; ?>
                </div>
            </div>
            <i class="bi bi-egg-fried"></i>
            </div>
            <div class="recipe-metadata">
            <div class="recipe-title">
                <?php _e('Rating', 'veci-plus'); ?>
            </div>
            <div class="recipe-data" id="recipe-rating"
                data-post-id="<?php echo $postID;?>"
                data-avg-rating="<?php echo $rating;?>"
                data-logged-in="<?php echo is_user_logged_in();?>"
                data-rating-count="<?php echo $ratingCount;?>"
            >
            </div>
            <i class="bi bi-hand-thumbs-up"></i>
            </div>
        </div>
</div>
    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}