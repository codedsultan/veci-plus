<?php

function vp_save_cuisine_meta($termID) {
    if(!isset($_POST['vp_more_info_url'])){
        return;
    }

    // add_term_meta(
    //     $termID,
    //     'more_info_url' ,
    //      sanitize_url($_POST['vp_more_info_url'])
    // );

    // creates and update taxonomy metadata
    update_term_meta(
        $termID,
        'more_info_url' ,
        sanitize_url($_POST['vp_more_info_url'])
    );
}