<?php
/**
 * Define a dummy shortcode.
 *
 * @link       https://github.com/teleantioquia/tiny-plugin
 * @since      1.0.0
 *
 * @package    Tiny_Plugin
 * @subpackage Tiny_Plugin/includes
 */

/**
 * Dummy shortcode class.
 *
 * @since      1.0.0
 * @package    Tiny_Plugin
 * @subpackage Tiny_Plugin/includes
 * @author     Jose Villalobos <jvillalobos@teleantioquia.com.co>
 */
class Tiny_Plugin_Shortcode
{

  /**
   * Just the constructor of the class.
   */
  public function __construct()
  { }

  /**
	 * Registers the [dummy-shortcode] shortcode.
	 */
	public function register_shortcode() {

		add_shortcode( 'dummy-shortcode', array( $this, 'shortcode_callback' ) );
	}

  /**
	 * Code for the [dummy-shortcode] shortcode.
	 *
	 * @param array  $atts          Shortcode attributes, are pased as an array, example: [dummy-shortcode title="TItulo Hello"].
	 * @param string $content       The shortcode content or null if not set.
	 * @param string $shortcode_tag The shortcode tag itself eg: noticias-grid.
	 */
	public function shortcode_callback( $atts, $content, $shortcode_tag )
  {
    // Get the shortcode attributes.
		$shortcode_args = shortcode_atts(
			// Default arguments.
      array(
        // Default values for the atts
				'title' => 'Dummy Shortcode Title',
        // Excercise 2.1: Add a new parameter to the shortcode named **subtitle** and let it have the 'Subtitulo por defecto' default value.
			),
			$atts
		);

    // This is just a dumy list of names. Imagine it's fetched from a
    // sql query.
    $names = array(
      'Roberto' => array(
        'age'  => 23,
        'city' => 'Medellin',
      ),
      'Juan' => array(
        'age'  => 32,
        'city' => 'Greenville',
      ),
      'James' => array(
        'age'  => 24,
        'city' => 'Lerna',
      ),
      'Maroni' => array(
        'age'  => 26,
        'city' => 'Hong Kong',
      ),
      'Beccacece' => array(
        'age'  => 37,
        'city' => 'Buffalo',
      ),
      'Paulo' => array(
        'age'  => 73,
        'city' => 'Florencia',
      ),
      'Diaz' => array(
        'age'  => 53,
        'city' => 'Rio de janeiro',
      )
    );

    // Excercise 1.2: Why do we use the `ob_start()`/`ob_get_clean()` pair of functions in the shortcode callback?.
    ob_start();
		?>
    <h2><?php echo esc_html( $shortcode_args['title'] ); ?></h2>
    <!-- Excercise 2.2: Show the **subtitle** attribute below the title wrapped in an h3. -->

    <ul>
      <?php foreach ($names as $name => $data) : ?>
        <li>
          <b><?php echo esc_html( $name ); ?></b>:
          <!-- Excercise 2.3: Show the "age" and "city" related to each "name". -->
          Age: | City: 
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Excercise 2.5: Add a button to the shortcode output HTML. -->

    <?php
    // Excercise 1.2: Why do we use the `ob_start()`/`ob_get_clean()` pair of functions in the shortcode callback?.
    return ob_get_clean();
  }
}