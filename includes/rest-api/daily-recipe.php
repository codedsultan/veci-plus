<?php 

function vp_rest_api_daily_recipe_handler($request){
    $rseponse = [
        'url' => '',
        'img' => '',
        'title' => '',
    ];

    $id = get_transient('vp_daily_recipe_id'); //get id from transient db

    // ensure there's always an id
    if(!$id){
        $id = vp_generate_daily_recipe();
    }

    //build response
    $rseponse['url'] = get_permalink($id); //function needs id outside loop
    $rseponse['img'] = get_the_post_thumbnail_url($id,'full'); //return original image size url
    $rseponse['title'] = get_the_title($id);

    return $rseponse;

}