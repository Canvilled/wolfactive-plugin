<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wolfactive.net
 * @since             1.0.0
 * @package           Wolfactive_Addons
 *
 * @wordpress-plugin
 * Plugin Name:       Wolfactive Addons
 * Plugin URI:        https://wolfactive.net
 * Description:       This is plugin support for Wolfactive.net
 * Version:           1.0.1
 * Author:            Huy Nguyen
 * Author URI:        https://wolfactive.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wolfactive-addons
 * Domain Path:       /languages
 */


require 'vendor/autoload.php';

use WA\Addon\Filters\WA_Filter_Navigator;
use WA\Addon\Shortcodes\Polylang_Custom;
use WA\Addon\WA_Notices;
use WA\Addon\WA_Register_Assets;

// Abort if the file is accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

define('WOLFACTIVE_ADDONS_PLUGIN_URL_DIR', plugin_dir_url( __FILE__ ));

/**
 * Initialize required classes for the plugin.
 */
function initialize_plugin_classes(): void
{
    new WA_Notices();
    new WA_Register_Assets();
    new Polylang_Custom();
    new WA_Filter_Navigator();
}

// Run plugin initialization.
initialize_plugin_classes();