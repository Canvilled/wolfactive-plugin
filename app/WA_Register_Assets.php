<?php
namespace WA\Addon;

class WA_Register_Assets
{
    function __construct()
    {
        add_action( 'wp_enqueue_scripts', [$this,'wolfactive_enqueue_scripts'] );
        add_action( 'wp_enqueue_scripts', [$this,'wolfactive_enqueue_styles'] );
    }

    public function wolfactive_enqueue_scripts() {
        wp_enqueue_script( 'choices-script', 'https://unpkg.com/slim-select@latest/dist/slimselect.min.js', array(), null, true );
        wp_enqueue_script( 'wolfactive-script', WA_Constants::WOLFACTIVE_ADDONS_PLUGIN_URL_DIR . 'assets/wolfactive-addons.js', array('choices-script'), WA_Constants::WOLFACTIVE_ADDONS_VERSION, true );
    }

    public function wolfactive_enqueue_styles() {
        wp_enqueue_style( 'choices-css', 'https://unpkg.com/slim-select@latest/dist/slimselect.css', array(), null );
        wp_enqueue_style( 'wolfactive-style', WA_Constants::WOLFACTIVE_ADDONS_PLUGIN_URL_DIR . 'assets/wolfactive-addons.css', array('choices-css'), WA_Constants::WOLFACTIVE_ADDONS_VERSION );
    }
}