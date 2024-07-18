<?php

function vp_register_blocks(){

    $blocks = [
        [   'name' => 'fancy-header'    ],
        [   'name' => 'search-form'     ]
    ];

    foreach ($blocks as $block) {
        register_block_type(
            VP_PLUGIN_DIR . 'build/blocks/'.$block['name']
        );
    }
    
}