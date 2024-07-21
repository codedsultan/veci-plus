<?php 

function vp_generate_daily_recipe(){
    global $wpdb;
    $id = $wpdb;

    // no ned to prepare because it has no user input
    // query dynamic post($wpdb->posts) table name to avoid issues
    $id = $wpdb->get_var(
        "SELECT ID from {$wpdb->posts} 
        WHERE post_status='publish' AND post_type='recipe'
        ORDER BY rand() LIMIT 1"
    );

    set_transient('vp_daily_recipe_id',$id ,DAY_IN_SECONDS); // use transient to store id temporarily for a day

    return $id;
}