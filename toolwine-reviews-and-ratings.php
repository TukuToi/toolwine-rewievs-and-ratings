<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.tukutoi.com/
 * @since             1.0.0
 * @package           Tw_Rar
 *
 * @wordpress-plugin
 * Plugin Name:       ToolWine Reviews & Ratings
 * Plugin URI:        https://www.tukutoi.com/program/toolwine-reviews-and-ratings
 * Description:       Toolset Add-On to easily manage Reviews and Ratings.
 * Version:           1.0.0
 * Author:            TukuToi
 * Author URI:        https://www.tukutoi.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tw_rar
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
define( 'TW_RAR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tw-rar-activator.php
 */
function activate_tw_rar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tw-rar-activator.php';
	Tw_Rar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tw-rar-deactivator.php
 */
function deactivate_tw_rar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tw-rar-deactivator.php';
	Tw_Rar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tw_rar' );
register_deactivation_hook( __FILE__, 'deactivate_tw_rar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tw-rar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tw_rar() {

	$plugin = new Tw_Rar();
	$plugin->run();

}
run_tw_rar();
