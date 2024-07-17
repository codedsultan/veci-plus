<?php

function vp_register_blocks(){
    register_block_type(
        VP_PLUGIN_DIR . 'build/block.json'
    );
}