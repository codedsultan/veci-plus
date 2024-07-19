<?php

function vp_activate_plugin() {

    if(version_compare(get_bloginfo('version'),'6.0','<'))
    {
        wp_die(__('You must update WordPress to use this plugin', 'veci-plus'));
    }

    vp_recipe_post_type();

    flush_rewrite_rules(); //to create rewrite rule for new custom post typ
}