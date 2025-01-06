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

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOLFACTIVE_ADDONS_VERSION', '1.0.1' );

if ( !class_exists( 'Polylang' ) ) {
    add_action( 'admin_notices', 'wolfactive_polylang_notice' );
}

function wolfactive_polylang_notice() {
    ?>
    <div class="notice notice-error">
        <p><?php _e( 'Polylang plugin is required for Wolfactive Addons. Please install and activate it.', 'wolfactive-addons' ); ?></p>
        <p><a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=polylang&tab=search&type=term' ) ); ?>" class="button button-primary"><?php _e( 'Install Polylang', 'wolfactive-addons' ); ?></a></p>
    </div>
    <?php
}

// Register and enqueue JavaScript file
add_action( 'wp_enqueue_scripts', 'wolfactive_enqueue_scripts' );

function wolfactive_enqueue_scripts() {
    wp_enqueue_script( 'choices-script', 'https://unpkg.com/slim-select@latest/dist/slimselect.min.js', array(), null, true );
    wp_enqueue_script( 'wolfactive-script', plugin_dir_url( __FILE__ ) . 'assets/wolfactive-addons.js', array('choices-script'), WOLFACTIVE_ADDONS_VERSION, true );
}

// Register and enqueue CSS file
add_action( 'wp_enqueue_scripts', 'wolfactive_enqueue_styles' );

function wolfactive_enqueue_styles() {
    wp_enqueue_style( 'choices-css', 'https://unpkg.com/slim-select@latest/dist/slimselect.css', array(), null );
    wp_enqueue_style( 'wolfactive-style', plugin_dir_url( __FILE__ ) . 'assets/wolfactive-addons.css', array('choices-css'), WOLFACTIVE_ADDONS_VERSION );
}


// Add shortcode for Polylang language switcher
add_shortcode( 'polylang_switcher', 'wolfactive_polylang_switcher' );

function wolfactive_polylang_switcher() {
    if ( function_exists( 'pll_the_languages' ) ) {
        $languages = pll_the_languages([
            "dropdown" => 1,
            "hide_current" => 0,
            "show_flags" => 1,
            "raw" => 1,
            'display_names_as' => 'slug'
        ]);
        $output = '<select class="wolfactive-polylang-switcher">';
        if ($languages) {
            foreach ($languages as $lang) {
                // $url returns the URL of the language, if the page exist in this language.
                if ($lang['current_lang']) {
                    $output .= '<option selected lang="'.$lang['locale'].'" value="' . $lang['url'] . '" class="wolfactive-polylang-switcher__item">' . $lang['name'] . '</option>';
                }else{

                    $output .= '<option lang="'.$lang['locale'].'" value="' . $lang['url'] . '" class="wolfactive-polylang-switcher__item">' . $lang['name'] . '</option>';
                }
            }
        }
        $output .= '</select>';
        return $output;
    } else {
        return __( 'Polylang plugin is not active.', 'wolfactive-addons' );
    }
}
