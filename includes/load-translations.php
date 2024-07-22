<?php 

function vp_load_php_translations(){
    load_plugin_textdomain(
        'veci-plus',
        false,
        "veci-plus/languages"
    );
}