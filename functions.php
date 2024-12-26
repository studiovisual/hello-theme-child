<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );

function hello_elementor_child_enqueue_styles() {
    // 
    wp_enqueue_style('hello-elementor', get_template_directory_uri() . '/style.css');
    
    // styles footer
    wp_enqueue_style('sv-footer', get_stylesheet_directory_uri() . '/assets/css/sv-footer.css', array(), null);
    
	add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles', 20);

}

add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles');