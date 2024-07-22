<?php 

function vp_admin_menus(){
    add_menu_page(
        __('Veci Plus', 'veci-plus'),
        __('Veci Plus', 'veci-plus'),
        'edit_theme_options',
        'vp-plugin-options',
        'vp_plugin_options_page',
        plugins_url('letter-u.svg',VP_PLUGIN_FILE)
    );

    add_submenu_page(
        'vp-plugin-options',
        __('Alt Veci Plus', 'veci-plus'),
        __('Alt Veci Plus', 'veci-plus'),
        'edit_theme_options',
        'vp-plugin-options-alt',
        'vp_plugin_options_alt_page',
    );
}
    
    

