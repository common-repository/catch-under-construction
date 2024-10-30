<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.catchplugins.com
 * @since      1.0.0
 *
 * @package    Catch_Under_Construction
 * @subpackage Catch_Under_Construction/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Catch_Under_Construction
 * @subpackage Catch_Under_Construction/admin
 * @author     Catch Plugins <www.catchplugins.com>
 */
class Catch_Under_Construction_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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
		if ( isset( $_GET['page'] ) && 'catch-under-construction' == $_GET['page'] ) {
			wp_enqueue_style( $this->plugin_name . '-display-dashboard', plugin_dir_url( __FILE__ ) . 'css/catch-under-construction-admin.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
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

		if ( isset( $_GET['page'] ) && 'catch-under-construction' == $_GET['page'] ) {
			$defaults = catch_under_construction_default_options();
			//print_r($defaults);
			wp_enqueue_script( 'matchHeight', plugin_dir_url( __FILE__ ) . 'js/jquery-matchHeight.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/catch-under-construction-admin.js', array( 'jquery', 'matchHeight', 'jquery-ui-tooltip' ), $this->version, false );
			wp_enqueue_script( 'catch-under-construction-color-picker', plugin_dir_url( __FILE__ ) . 'js/wp-color-picker.js', array( 'wp-color-picker', 'jquery' ), $this->version, false );
			wp_localize_script( $this->plugin_name, 'default_options', $defaults );

			wp_enqueue_script( $this->plugin_name );
			wp_enqueue_media();
		}

	}
	public function action_links( $links, $file ) {
		if ( $file === $this->plugin_name . '/' . $this->plugin_name . '.php' ) {
			$settings_link = '<a href="' . esc_url( admin_url( 'admin.php?page=catch-under-construction' ) ) . '">' . esc_html__( 'Settings', 'catch-under-construction' ) . '</a>';

			array_unshift( $links, $settings_link );
		}
		return $links;
	}
	public function add_plugin_settings_menu() {
		add_menu_page(
			esc_html__( 'Catch Under Construction', 'catch-under-construction' ), // $page_title.
			esc_html__( 'Catch Under Construction', 'catch-under-construction' ), // $menu_title.
			'manage_options', // $capability.
			'catch-under-construction', // $menu_slug.
			array( $this, 'settings_page' ), // $callback_function.
			'dashicons-admin-tools', // $icon_url.
			'99.01564' // $position.
		);
		add_submenu_page(
			'catch-under-construction', // $parent_slug.
			esc_html__( 'Catch Under Construction', 'catch-under-construction' ), // $page_title.
			esc_html__( 'Settings', 'catch-under-construction' ), // $menu_title.
			'manage_options', // $capability.
			'catch-under-construction', // $menu_slug.
			array( $this, 'settings_page' ) // $callback_function.
		);
	}

	public function settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'catch-under-construction' ) );
		}
			require plugin_dir_path( __FILE__ ) . 'partials/catch-under-construction-admin-display.php';
	}
	public function register_settings() {
		register_setting(
			'catch-under-construction-group',
			'catch_under_construction_options',
			array( $this, 'sanitize_callback' )
		);
	}
	public function sanitize_callback( $input ) {
		if ( isset( $input['reset'] ) && $input['reset'] ) {
			//If reset, restore defaults
			return catch_under_construction_default_options();
		}
		$message = null;
		$type    = null;

		// Verify the nonce before proceeding.
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		|| ( ! isset( $_POST['catch_under_construction_nounce'] )
		|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['catch_under_construction_nounce'] ) ), basename( __FILE__ ) ) )
		|| ( ! check_admin_referer( basename( __FILE__ ), 'catch_under_construction_nounce' ) ) ) {

			$input['status']            = ( isset( $input['status'] ) && 'on' == $input['status'] ) ? '1' : '0';
			$input['enable_title']      = ( isset( $input['enable_title'] ) && 'on' == $input['enable_title'] ) ? '1' : '0';
			$input['enable_logo']       = ( isset( $input['enable_logo'] ) && 'on' == $input['enable_logo'] ) ? '1' : '0';
			$input['enable_social']     = ( isset( $input['enable_social'] ) && 'on' == $input['enable_social'] ) ? '1' : '0';
			$input['enable_contact']    = ( isset( $input['enable_contact'] ) && 'on' == $input['enable_contact'] ) ? '1' : '0';
			$input['enable_background'] = ( isset( $input['enable_background'] ) && 'on' == $input['enable_background'] ) ? '1' : '0';

			if ( isset( $input['title'] ) ) {
				$input['title'] = sanitize_text_field( $input['title'] );
			}

			if ( isset( $input['description'] ) ) {
				$input['description'] = sanitize_text_field( $input['description'] );
			}

			if ( isset( $input['footer_text'] ) ) {
				$input['footer_text'] = sanitize_text_field( $input['footer_text'] );
			}
			if ( isset( $input['background_color'] ) && $input['background_color'] ) {
				$input['background_color'] = sanitize_hex_color( $input['background_color'] );
			}

			if ( isset( $input['logo_size'] ) && $input['logo_size'] ) {
				$input['logo_size'] = intval( $input['logo_size'] );
			}

			if ( isset( $input['facebook'] ) ) {
				$input['facebook'] = sanitize_text_field( $input['facebook'] );
			}

			if ( isset( $input['twitter'] ) ) {
				$input['twitter'] = sanitize_text_field( $input['twitter'] );
			}

			if ( isset( $input['instagram'] ) ) {
				$input['instagram'] = sanitize_text_field( $input['instagram'] );
			}

			if ( isset( $input['address'] ) ) {
				$input['address'] = sanitize_text_field( $input['address'] );
			}
			if ( isset( $input['contact'] ) ) {
				$input['contact'] = sanitize_text_field( $input['contact'] );
			}
			if ( isset( $input['email'] ) ) {
				$input['email'] = sanitize_text_field( $input['email'] );
			}

				return $input;
		}
		return 'Invalid Nonce';
	}

	function my_page_template_redirect() {
		//get status value from option table for enable or disable coming soon page
		$value = catch_under_construction_get_options( 'status' );

		//condition matching if status is not disable for coming soon then page is redirect
		if ( $value['status'] !== '0' ) {
			print_r( 'asdf' );
			die();
			if ( ! is_feed() ) {
				//if user not login page is redirect on coming soon template page
				if ( ! is_user_logged_in() ) {
					//get path of our coming soon display page and redirecting
					$file = plugin_dir_path( __FILE__ ) . 'construction_display.php';
					include( $file );
					exit();
				}
			}
			//if user is log-in then we check role.
			if ( is_user_logged_in() ) {
				//get logined in user role
				global $current_user; /* Global variable already have the current user info so need to call get_currentuserinfo or wp_get_current_user */
				// get_currentuserinfo(); /* Function is deprecated in the version 4.5 and above new function wp_get_current_user added */
				$LoggedInUserID = $current_user->ID;
				$UserData       = get_userdata( $LoggedInUserID );
				//if user role not 'administrator' redirect him to message page
				if ( $UserData->roles[0] != 'administrator' ) {
					if ( ! is_feed() ) {
						$file = plugin_dir_path( __FILE__ ) . 'construction_display.php';
						include( $file );
						exit();
					}
				}
			}
		}
		/*
		* add action to call function my_page_template_redirect
		*/
		if ( ( isset( $_GET['plugin_name'] ) && $_GET['plugin_name'] == 'true' ) ) {
			$file = plugin_dir_path( __FILE__ ) . 'construction_display.php';
			include( $file );
			exit();
		}
	}

	function add_plugin_meta_links( $meta_fields, $file ) {
		if ( CUC_BASENAME == $file ) {
			$meta_fields[] = "<a href='https://catchplugins.com/support-forum/forum/catch-under-construction/' target='_blank'>Support Forum</a>";
			$meta_fields[] = "<a href='https://wordpress.org/support/plugin/catch-under-construction/reviews#new-post' target='_blank' title='Rate'>
			        <i class='ct-rate-stars'>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			  . '</i></a>';

			$stars_color = '#ffb900';

			echo '<style>'
				. '.ct-rate-stars{display:inline-block;color:' . $stars_color . ';position:relative;top:3px;}'
				. '.ct-rate-stars svg{fill:' . $stars_color . ';}'
				. '.ct-rate-stars svg:hover{fill:' . $stars_color . '}'
				. '.ct-rate-stars svg:hover ~ svg{fill:none;}'
				. '</style>';
		}

		return $meta_fields;
	}
}



