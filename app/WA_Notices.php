<?php
namespace WA\Addon;

class WA_Notices {
    function __construct()
    {
        if ( !class_exists( 'Polylang' ) ) {
            add_action( 'admin_notices', [$this,'wolfactive_polylang_notice'] );
        }
    }

    public function wolfactive_polylang_notice() {
        ?>
        <div class="notice notice-error">
            <p><?php _e( 'Polylang plugin is required for Wolfactive Addons. Please install and activate it.', WA_Constants::WOLFACTIVE_ADDONS_TEXT_DOMAIN ); ?></p>
            <p><a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=polylang&tab=search&type=term' ) ); ?>" class="button button-primary"><?php _e( 'Install Polylang', WA_Constants::WOLFACTIVE_ADDONS_TEXT_DOMAIN ); ?></a></p>
        </div>
        <?php
    }
}