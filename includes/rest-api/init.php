<?php 

function vp_rest_api_init(){
    //example.com/wp-json/vp/v1/signup
    register_rest_route('vp/v1','/signup',[
        'methods' => 'POST',
        'callback' => 'vp_rest_api_signup_handler',
        'permission_callback' => '__return_true'
    ]);
}