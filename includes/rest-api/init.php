<?php 

function vp_rest_api_init(){
    //example.com/wp-json/vp/v1/signup
    register_rest_route('vp/v1','/signup',[
        'methods' => WP_REST_Server::CREATABLE, //'POST',
        'callback' => 'vp_rest_api_signup_handler',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('vp/v1','/signin',[
        'methods' => WP_REST_Server::EDITABLE,//'POST',
        'callback' => 'vp_rest_api_signin_handler',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('vp/v1','/rate',[
        'methods' => WP_REST_Server::CREATABLE, //'POST',
        'callback' => 'vp_rest_api_add_rating_handler',
        'permission_callback' => '__return_true'
    ]);
}