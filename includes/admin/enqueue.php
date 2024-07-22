<?php 

function vp_admin_enqueue($hook_suffix){
   // echo $hook_suffix; // get plugin option page suffix
   if($hook_suffix === "toplevel_page_vp-plugin-options"){
        wp_enqueue_media();
        wp_enqueue_style('vp_admin');
        wp_enqueue_script('vp_admin');
   }

}