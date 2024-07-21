<?php 

function vp_generate_daily_recipe(){
    global $wpdb;
    $id = $wpdb;

    // no ned to prepare because it has no user input
    // query dynamic post($wpdb->posts) table name to avoid issues
    // $startTime = microtime(true);
    $id = $wpdb->get_var(
        "SELECT ID from {$wpdb->posts} 
        WHERE post_status='publish' AND post_type='recipe'
        ORDER BY rand() LIMIT 1"
    );
    // $endTime = microtime(true);
    // $SQLExecutionTime = $endTime - $startTime;

    // $startTime = microtime(true);
    // new WP_Query([
    //     'post_type' => 'recipe',
    //     'post_status' => 'publish',
    //     'post_per_page' => 1,
    //     'orderby' => 'rand'
    // ]);
    // $endTime = microtime(true);
    // $WPExecutionTime = $endTime - $startTime;
    // SQL execution Time : 0.00098991394042969 // good
    // WP Execuion Time :0.0035479068756104 // too slow for this operation


    set_transient('vp_daily_recipe_id',$id ,DAY_IN_SECONDS); // use transient to store id temporarily for a day

    return $id;
}