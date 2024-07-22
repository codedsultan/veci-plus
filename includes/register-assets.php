<?php 

function vp_register_assets() {
    wp_register_style(
        'vp_admin',
        plugins_url('/build/admin/index.css',VP_PLUGIN_FILE)
    );

    $adminAssets = include(VP_PLUGIN_DIR. 'build/admin/index.asset.php');

    wp_register_script(
        'vp_admin',
        plugins_url('/build/admin/index.js',VP_PLUGIN_FILE),
        $adminAssets['dependencies'],
        $adminAssets['version'],
        true
    );
}