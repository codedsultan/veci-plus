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
}
    
    

