<?php

function vp_rest_api_signin_handler($request) {
    $response = ['status' => 1];

    $params = $request->get_json_params();

    if(
        !isset($params['user_login'],$params['password']) ||
        empty($params['user_login']) ||
        empty($params['password'])
    ) {
        return $response;
    }
    $email = sanitize_email($params['user_login']);
    $password = sanitize_text_field($params['password']);

    $user = wp_signon([
        'user_login' => $email,
        'user_password' => $password,
        'remember' => true
    ]);

    if(is_wp_error($user)){
        return $response;
    }
    $response ['status'] = 2;
    return $response;
}