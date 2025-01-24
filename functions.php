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
// Função para enfileirar estilos e scripts do tema e do modal
function hello_elementor_child_scripts_styles() {
	// Enfileira o estilo principal do tema filho
	wp_enqueue_style(
			'hello-elementor-child-style',
			get_stylesheet_directory_uri() . '/style.css',
			['hello-elementor-theme-style'],
			HELLO_ELEMENTOR_CHILD_VERSION
	);

	// Enfileira o CSS do rodapé
	wp_enqueue_style(
			'sv-footer-style',
			get_stylesheet_directory_uri() . '/assets/css/sv-footer.css',
			[],
			HELLO_ELEMENTOR_CHILD_VERSION
	);

	// Enfileira o CSS de variáveis
	wp_enqueue_style(
			'sv-variables-style',
			get_stylesheet_directory_uri() . '/assets/css/sv-variables.css',
			[],
			HELLO_ELEMENTOR_CHILD_VERSION
	);
}

add_action('wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20);

/**
 * Registra os menus de navegação
 *
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */

 add_filter( 'hello_elementor_register_menus', '__return_false' );

 register_nav_menus( [
		 'primary-header-menu' => esc_html__( 'Header Menu', 'textdomain' ),
		 'primary-footer-menu' => esc_html__( 'Footer Menu', 'textdomain' ),
 ] );
 
/**
 * Adiciona a descrição aos itens do menu, se disponível.
 *
 * @param array    $items Array de itens do menu.
 * @param stdClass $args Configurações do menu.
 * @return array Itens do menu modificados.
 */
function add_menu_description_to_items($items, $args) {
	if (empty($items)) {
		return $items;
	}

	foreach ($items as &$item) {
		if (!empty($item->description)) {
			$item->title .= ' <span class="menu-item-description">' . esc_html($item->description) . '</span>';
		}
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'add_menu_description_to_items', 10, 2);