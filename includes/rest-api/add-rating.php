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
    $response ['status'] = 2;
    return $response;
}