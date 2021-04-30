<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.tukutoi.com/
 * @since      1.0.0
 *
 * @package    Tw_Rar
 * @subpackage Tw_Rar/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Tw_Rar
 * @subpackage Tw_Rar/includes
 * @author     TukuToi <hello@tukutoi.com>
 */
class Tw_Rar_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		if ( current_user_can( 'activate_plugins' ) && ( !is_plugin_active( 'types/wpcf.php' ) || !is_plugin_active( 'cred-frontend-editor/plugin.php' ) ) ) {
        	// Stop activation redirect and show error
        	wp_die('Sorry, but this plugin requires the Toolset Types and Forms Plugins to be installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
    	}

	}

}
