<?php

function vp_enqueue_scripts() {
    $authURLs = json_encode([
        'signup' => esc_url_raw(rest_url('vp/v1/signup'))
    ]);

    wp_add_inline_script( 
        'veci-plus-auth-modal-script',
        "const vp_auth_rest = {$authURLs}", 
        'before' // or after
    ); 
}