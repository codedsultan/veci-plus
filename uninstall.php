<?php 


if(!defined("WP_UNINSTALL_PLUGIN")){
    exit;
}

delete_option("vp_options"); // delete plugin options


global $wpdb;
$wpdp->query(
    "DROP TABLE IF EXISTS {$wpdb->prefix}recipe_ratings"
); // delete added db table