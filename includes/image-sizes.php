<?php 

function vp_custom_image_sizes($sizes){
    return array_merge($sizes,[
        'teamMember' => __('Team Member', 'veci-plus'),
        'opengraph' => __('Open Graph', 'veci-plus')
    ]);
}