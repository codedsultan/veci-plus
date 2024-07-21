<?php 

function vp_daily_recipe_cb($atts){

    $title = esc_html($atts['title']);
    $id = get_transient('vp_daily_recipe_id');

    if(!$id) {
        $id = vp_generate_daily_recipe();
    }
    // performance test
    // global $wpdb;
    // $startTime = microtime(true);
    // $id = $wpdb->get_var(
    //     "SELECT ID from {$wpdb->posts} 
    //     WHERE post_status='publish' AND post_type='recipe'
    //     ORDER BY rand() LIMIT 1"
    // );
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
    // SQL execution Time : 0.00098991394042969
    // WP Execuion Time :0.0035479068756104
    // end performance test
    ob_start();
    ?>
        <div class="wp-block-veci-plus-daily-recipe">
            <h6><?php echo $title ?></h6>
            <a href="<?php the_permalink($id) ?>">
                <img src="<?php echo get_the_post_thumbnail_url($id ,"full"); ?>">
                <h3><?php echo get_the_title($id) ?></h3>
            </a>
        </div>
    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output; 
}