<?php 

function vp_load_php_translations(){
    load_plugin_textdomain(
        'veci-plus',
        false,
        "veci-plus/languages"
    );
}

function vp_load_block_translations() {

    $blocks = [
        'veci-plus-fancy-header-editor-script',
        'veci-plus-advanced-search-editor-script',
        'veci-plus-page-header-editor-script',
        'veci-plus-featured-video-editor-script',
        'veci-plus-header-tools-editor-script',
        'veci-plus-auth-modal-script',
        'veci-plus-auth-modal-editor-script',
        'veci-plus-recipe-summary-script',
        'veci-plus-recipe-summary-editor-script',
        'veci-plus-team-members-group-editor-script',
        'veci-plus-team-member-editor-script',
        'veci-plus-popular-recipes-editor-script',
        'veci-plus-daily-recipe-editor-script'
      ];

      foreach($blocks as $block){
            wp_set_script_translations($block,'veci-plus',VP_PLUGIN_DIR . "languages");
      }
}