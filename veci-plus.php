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
add_action( 'init', 'vp_recipe_post_type' );