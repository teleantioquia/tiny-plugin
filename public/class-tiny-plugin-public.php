<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/teleantioquia/tiny-plugin
 * @since      1.0.0
 *
 * @package    Tiny_Plugin
 * @subpackage Tiny_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tiny_Plugin
 * @subpackage Tiny_Plugin/public
 * @author     Jose Villalobos <jvillalobos@teleantioquia.com.co>
 */
class Tiny_Plugin_Public {

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
		$this->version = $version;

	}

	/**
	 * Enqueue (add) new script to the footer of the site.
	 * this method it's registered to the 'wp_head' action
	 * in the Tiny-Plugin::define_public_hooks() method.
	 */
	public function enqueue_new_scripts() {
		// Excercise 1.1: Import styles and scripts correctly.
		$script_location = plugin_dir_url( __FILE__ ) . 'js/tiny-extra-script.js';
		?>
		<script src="<?php echo esc_url( $script_location ); ?>"></script>
		<?php
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
		 * defined in Tiny_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tiny_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tiny-plugin-public.css', array(), $this->version, 'all' );

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
		 * defined in Tiny_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tiny_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tiny-plugin-public.js', array( 'jquery' ), $this->version, false );

	}

}
