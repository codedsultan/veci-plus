<?php 

function vp_admin_enqueue($hook_suffix){
   // echo $hook_suffix; // get plugin option page suffix
   if($hook_suffix === "toplevel_page_vp-plugin-options"){
        wp_enqueue_media();
   }

}