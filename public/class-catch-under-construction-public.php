<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.catchplugins.com
 * @since      1.0.0
 *
 * @package    Catch_Under_Construction
 * @subpackage Catch_Under_Construction/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Catch_Under_Construction
 * @subpackage Catch_Under_Construction/public
 * @author     Catch Plugins <www.catchplugins.com>
 */
class Catch_Under_Construction_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Catch_Under_Construction_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Under_Construction_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/catch-under-construction-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Catch_Under_Construction_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Under_Construction_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/catch-under-construction-public.js', array( 'jquery' ), $this->version, false );
	}

	function catch_coming_soon_screen_activate() {
		set_transient( '_catch_coming_soon_screen_activation_redirect', true, 30 );
	}

	function catch_coming_soon_screen_do_activation_redirect() {
		// if plugin not activated
		if ( ! get_transient( '_catch_coming_soon_screen_activation_redirect' ) ) {
			return;
		}
		// Delete the redirect transient
		delete_transient( '_catch_coming_soon_screen_activation_redirect' );

		// if activate admin
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}
		// Redirect the plugin main page
	}

	function catch_under_construction_my_custom_menu() {
		global $wp_admin_bar;
		$value = catch_under_construction_get_options( 'status' );
		if ( $value['status'] == '0' ) {
			return;
		}

		$argsParent = array(
			'id'     => 'myCustomMenu',
			'title'  => 'Catch Under Construction Mode Enable',
			'parent' => 'top-secondary',
			'href'   => '?page=catch-under-construction',
			'meta'   => array( 'class' => 'wp-mode-enable' ),
		);
		$wp_admin_bar->add_menu( $argsParent );

	}
}

