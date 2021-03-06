<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/teleantioquia/tiny-plugin
 * @since      1.0.0
 *
 * @package    Tiny_Plugin
 * @subpackage Tiny_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tiny_Plugin
 * @subpackage Tiny_Plugin/admin
 * @author     Jose Villalobos <jvillalobos@teleantioquia.com.co>
 */
class Tiny_Plugin_Admin {

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
		$this->version = $version;

	}

	public function register_menu()
	{
		add_menu_page(
			'Tiny Plugin',
			'Tiny Plugin',
			'manage_options',
			'tiny-plugin',
			array( $this, 'main_menu_content' ),
			'dashicons-video-alt2'
		);

		// Excercise 4.1: Add [submenu page](https://developer.wordpress.org/reference/functions/add_submenu_page/) to the menu **Tiny Plugin**.
	}

	public function main_menu_content() {
		?>
		<div class="wrap">
			<h1>Tiny Plugin</h1>
			<div>Bienvenido a tiny plugin.</div>
		</div>
		<?php
	}

	// Excercise 4.2: Show a hello world in the previously added submenu when its page get opened.

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
		 * defined in Tiny_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tiny_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tiny-plugin-admin.css', array(), $this->version, 'all' );

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
		 * defined in Tiny_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tiny_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tiny-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

}
