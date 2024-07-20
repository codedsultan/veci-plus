<?php 

function vp_rest_api_add_rating_handler($request){
    $response = ['status' => 1];
    $params = $request->get_json_params();

    if(
        !isset($params['rating'],$params['postID']) ||
        empty($params['rating']) || empty($params['postID'])
    ){
        return $response;
    }

    $rating = round(floatval($params['rating']),1);
    $postID = absint($params['postID']); //wp function to typcast interger and dissalow -ve numbers
    $userID = get_current_user_id();

    global $wpdb;

    $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}recipe_ratings
        WHERE post_id=%d AND user_id=%d",
        $postID,$userID
    )); // alway prepare query before execution for security reason 
    // placeholders for prepared satements %d-Number,%s-String,%f-Float
    if($wpdb->num_rows > 0){
        return $response;
    }// check if user already rated recipe

    $wpdb->insert(
        "{$wpdb->prefix}recipe_ratings",
        [
            'post_id' => $postID,
            'rating' => $rating,
            'user_id' =>$userID
        ],
        ['%d','%f' ,'%d']
    );// Insert record

    $avgRating = round($wpdb->get_var(
        $wpdb->prepare(
            "SELECT AVG(`rating`) FROM {$wpdb->prefix}recipe_ratings
            WHERE post_id=%d",$postID
        )
    ),1);  // Calculate Rating

    update_post_meta($postID,'recipe_rating' ,$avgRating);// update recipe post meta
    
    do_action('recipe_rated',[
        'postID' => $postID,
        'rating' => $rating,
        'userID' => $userID
    ]); //custom hook //generate event to notify wp and other plugins // Optional 2nd parameter to send data with the event
    //build response
    $response['status'] = 2;
    $response['rating'] = $avgRating;
    return $response;
}