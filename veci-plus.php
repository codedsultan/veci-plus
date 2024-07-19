<?php 

/*
 * Plugin Name:       Veci Plus
 * Plugin URI:        https://vecitechnologies.net/wp-plugins/veci-plus/
 * Description:       A plugin for adding blocks to a theme.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.2
 * Author:            Olusegun Ibraheem
 * Author URI:        https://vecitechnologies.net/olusegun-ibraheem/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       veci-plus
 * Domain Path:       /languages
 */

use function FakerPress\register;

 if(!function_exists('add_action')){
    echo 'seems like you took a wrong turn!';
    exit;
 }

// Setup

 define('VP_PLUGIN_DIR', plugin_dir_path(__FILE__));

//Includes

$rootFiles = glob(VP_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(VP_PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles,$subdirectoryFiles);

foreach($allFiles as $filename){
   include_once($filename);
}
// include(VP_PLUGIN_DIR . 'includes/register-blocks.php');
// include(VP_PLUGIN_DIR . 'includes/blocks/search-form.php');
// include(VP_PLUGIN_DIR . 'includes/blocks/page-header.php');

// Hooks
register_activation_hook(__FILE__, 'vp_activate_plugin'); //runs during plugin activation
add_action('init', 'vp_register_blocks');
add_action('rest_api_init', 'vp_rest_api_init');
add_action('wp_enqueue_scripts', 'vp_enqueue_scripts');
// init custom post type
add_action( 'init', 'vp_recipe_post_type' );
// add custom taxonomy field
add_action('cuisine_add_form_fields', 'vp_cuisine_add_form_fields');
// save term metadata
add_action('create_cuisine', 'vp_save_cuisine_meta');
// edit taxonomy fields
add_action('cuisine_edit_form_fields', 'vp_cuisine_edit_form_fields');
// update taxonony
add_action('edited_cuisine', 'vp_save_cuisine_meta');
// save recipe post
add_action('save_post_recipe', 'vp_save_post_recipe');
