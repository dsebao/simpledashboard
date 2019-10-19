<?php

/**
 * Box Dashboard
 *
 * A flat theme for the WordPress Dashboard
 * The icons are provided by Boxicons https://github.com/atisawd/boxicons
 * @link              https://dsebao.github.io
 * @since             1.0.0
 * @package           Simpledashboard
 *
 * @wordpress-plugin
 * Plugin Name:       SimpleDashboard
 * Description:       A flat theme for the WordPress Dashboard
 * Version:           1.0.0
 * Author:            Sebastian Ortiz
 * Author URI:        https://dsebao.github.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simpledashboard
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
define( 'SIMPLEDASHBOARD_VERSION', '1.0.0' );


function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css',plugin_dir_url( __FILE__ ) . '/css/panel.css');
    wp_enqueue_style( 'custom_wp_admin_css');
}

add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

function login_style() {
    wp_enqueue_style( 'custom_wp_admin_css',plugin_dir_url( __FILE__ ) . '/css/login.css');
}
add_action( 'login_enqueue_scripts', 'login_style' );

/**
 * Register a custom menu page.
 */
function register_skeda_custom_menu_page() {
    add_menu_page(__( 'View Site', 'skeda-business' ),
        __('View Site','skeda-business'),
        'amelia_read_calendar',
        get_bloginfo('url'),
        '',
        "dashicons-admin-site-alt3",
        1
    );
    add_menu_page(__( 'Log out', 'skeda-business' ),
        __('Log Out','skeda-business'),
        'amelia_read_calendar',
        wp_logout_url(),
        '',
        "dashicons-redo",
        140
    );
}
add_action( 'admin_menu', 'register_skeda_custom_menu_page' );

