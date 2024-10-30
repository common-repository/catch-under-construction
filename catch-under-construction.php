<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.catchplugins.com
 * @since             1.0.0
 * @package           Catch_Under_Construction
 *
 * @wordpress-plugin
 * Plugin Name:       Catch Under Construction
 * Plugin URI:        www.catchplugins.com/plugins/catch-under-construction
 * Description:       Catch Under Construction is a WordPress maintenance mode plugin that helps you display informative under construction page in an elegant manner with numerous customization options integrated into it.
 * Version:           1.4.4
 * Author:            Catch Plugins
 * Author URI:        www.catchplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       catch-under-construction
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
// If this file is called directly, abort.
if ( ! defined( 'CUC_VERSION' ) ) {
	define( 'CUC_VERSION', '1.4.4' );
}

// Define Plugin Name
$pathinfo = pathinfo( dirname( plugin_basename( __FILE__ ) ) );
if ( ! defined( 'CUC_NAME' ) ) {
	define( 'CUC_NAME', $pathinfo['filename'] );
}

// The URL of the directory that contains the plugin
if ( ! defined( 'CUC_URL' ) ) {
	define( 'CUC_URL', plugin_dir_url( __FILE__ ) );
}

// The absolute path of the directory that contains the file
if ( ! defined( 'CUC_PATH' ) ) {
	define( 'CUC_PATH', plugin_dir_path( __FILE__ ) );
}
// Gets the path to a plugin file or directory, relative to the plugins directory, without the leading and trailing slashes.
if ( ! defined( 'CUC_BASENAME' ) ) {
	define( 'CUC_BASENAME', plugin_basename( __FILE__ ) );
}

function catch_under_construction_activate() {
	$required = 'catch-under-construction-pro/catch-under-construction-pro.php';
	if ( is_plugin_active( $required ) ) {
		$message = esc_html__( 'Sorry, Pro plugin is already active. No need to activate Free version. %1$s&laquo; Return to Plugins%2$s.', 'catch-under-construction' );
		$message = sprintf( $message, '<br><a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">', '</a>' );
		wp_die( $message );
	}
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-catch-under-construction-activator.php';
	Catch_Under_Construction_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-catch-under-construction-deactivator.php
 */
function catch_under_construction_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-catch-under-construction-deactivator.php';
	Catch_Under_Construction_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'catch_under_construction_activate' );
register_deactivation_hook( __FILE__, 'catch_under_construction_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-catch-under-construction.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_catch_under_construction() {

	$plugin = new Catch_Under_Construction();
	$plugin->run();

}
run_catch_under_construction();

if ( ! function_exists( 'catch_under_construction_get_options' ) ) :
	function catch_under_construction_get_options() {
		$defaults = catch_under_construction_default_options();
		$options  = get_option( 'catch_under_construction_options', $defaults );
		return wp_parse_args( $options, $defaults );
	}
endif;


if ( ! function_exists( 'catch_under_construction_default_options' ) ) :
	/**
	 * Return array of default options
	 *
	 * @since     1.0
	 * @return    array    default options.
	 */
	function catch_under_construction_default_options( $option = null ) {
		$default_options = array(

			'status'            => 1,
			'enable_title'      => 1,
			'enable_logo'       => 1,
			'enable_timer'      => 1,
			'enable_social'     => 1,
			'enable_background' => 1,
			'enable_contact'    => 1,
			'image'             => esc_url( trailingslashit( plugins_url( 'catch-under-construction' ) ) . 'public/partials/images/background.jpg' ),
			'logo'              => esc_url( trailingslashit( plugins_url( 'catch-under-construction' ) ) . 'public/partials/images/logo.png' ),
			'logo_size'         => '200',
			'background_color'  => '',
			'title'             => esc_html__( 'Catch Under Construction ', 'catch-under-construction' ),
			'footer_text'       => esc_html__( 'Catch Themes @ ', 'catch-under-construction' ) . wp_date( 'Y' ),
			'description'       => '',
			'address'           => esc_html__( '123 Street, City', 'catch-under-construction' ),
			'contact'           => '041-6838292',
			'email'             => 'example@site.com',
			'facebook'          => '#',
			'twitter'           => '#',
			'instagram'         => '#',
			'youtube'           => '#',
		);

		if ( null === $option ) {
			return apply_filters( 'catch_under_construction_default_options', $default_options );
		} else {
			return $default_options[ $option ];
		}
	}
endif;

if ( ! function_exists( 'catch_under_construction_my_page_template_redirect' ) ) :
	function catch_under_construction_my_page_template_redirect() {
		//get status value from option table for enable or disable coming soon page
		$value = catch_under_construction_get_options( 'status' );

		if ( '0' !== $value['status'] ) {
			if ( ! is_feed() ) {
				//if user not login page is redirect on coming soon template page
				if ( ! is_user_logged_in() ) {

					//get path of our coming soon display page and redirecting
					$file = plugin_dir_path( __FILE__ ) . '/public/partials/construction-display.php';
					include( $file );
					exit();
				}
			}
			//if user is log-in then we check role.
			if ( is_user_logged_in() ) {
				//get logined in user role
				global $current_user; /* Global variable already have the current user info so need to call get_currentuserinfo or wp_get_current_user */
				// get_currentuserinfo(); /* Function is deprecated in the version 4.5 and above new function wp_get_current_user added */
				$logged_user = $current_user->ID;
				$user_data   = get_userdata( $logged_user );
				//if user role not 'administrator' redirect him to message page
				if ( 'administrator' !== $user_data->roles[0] ) {
					if ( ! is_feed() ) {
						$file = plugin_dir_path( __FILE__ ) . '/public/partials/construction-display.php';
						include( $file );
						exit();
					}
				}
			}
		}
	}
endif;

if ( ! function_exists( 'catch_under_construction_skip_redirect_on_login' ) ) :
	add_action( 'init', 'catch_under_construction_skip_redirect_on_login' );
	function catch_under_construction_skip_redirect_on_login() {
		global $pagenow;
		if ( 'wp-login.php' === $pagenow ) {
			return;
		} else {
			add_action( 'template_redirect', 'catch_under_construction_my_page_template_redirect' );
		}
	}
endif;

/*
* add action to call function my_page_template_redirect
*/
if ( ( isset( $_GET['catch_under_construction'] ) && 'true' == $_GET['catch_under_construction'] ) ) {
	$file = plugin_dir_path( __FILE__ ) . '/public/partials/construction-display.php';
	include( $file );
	exit();
}

/* CTP tabs removal options */
require plugin_dir_path( __FILE__ ) . '/includes/ctp-tabs-removal.php';

 $ctp_options = ctp_get_options();
if ( 1 == $ctp_options['theme_plugin_tabs'] ) {
	/* Adds Catch Themes tab in Add theme page and Themes by Catch Themes in Customizer's change theme option. */
	if ( ! class_exists( 'CatchThemesThemePlugin' ) && ! function_exists( 'add_our_plugins_tab' ) ) {
		require plugin_dir_path( __FILE__ ) . '/includes/CatchThemesThemePlugin.php';
	}
}
