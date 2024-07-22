<?php 

function vp_save_options() {
    if(!current_user_can('edit_theme_options')){
        wp_die(
            __("You are not allowed to be on this page.", 'veci-plus')
        );
    }

    check_admin_referer('vp_options_verify');

    $options = get_option('vp_options');
    $options['og_title'] = sanitize_text_field($_POST['vp_og_title']);
    $options['og_image'] = sanitize_url($_POST['vp_og_image']);
    $options['og_description'] = sanitize_text_field($_POST['vp_og_description']);
    $options['enable_og'] =  absint($_POST['vp_og_enable']);

    update_option('vp_options',$options);

    wp_redirect(admin_url('admin.php?page=vp-plugin-options&status=1'));
    
}