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

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.4' );

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

	// Enfileira o CSS do cabeçalho
	wp_enqueue_style(
			'sv-header-style',
			get_stylesheet_directory_uri() . '/assets/css/sv-header.css',
			[],
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

	// Enfileira os scripts JavaScript
	wp_enqueue_script(
			'sv-header-script',
			get_stylesheet_directory_uri() . '/assets/js/sv-header.js',
			[],
			HELLO_ELEMENTOR_CHILD_VERSION,
			true
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
		 'primary-header-menu' => esc_html__( 'Header Menu', 'hello-elementor' ),
		 'primary-footer-menu' => esc_html__( 'Footer Menu', 'hello-elementor' ),
 ] );
 

/**
 * Classe personalizada para gerenciar submenus com título e botão "Voltar".
 */
class Custom_Submenu_Walker extends Walker_Nav_Menu {
	/**
	 * @var string $current_item_title Armazena o título do item atual no nível de profundidade 0.
	 */
	private $current_item_title = '';

		/**
	 * @var string $current_item_link Armazena o link do item atual no nível de profundidade 0.
	 */
	 private $current_item_link = '';

	/**
	 * Inicia o nível do submenu.
	 *
	 * @param string   $output HTML do menu que será gerado.
	 * @param int      $depth Nível de profundidade atual.
	 * @param stdClass $args Configurações do menu.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( $depth === 0 ) {
			$output .= '<ul class="sub-menu">';

			// Adiciona o botão "Voltar".
			$output .= '<li class="menu-item menu-item-btn">';
			$output .= '<div class="sv-header__back-menu-container">';
			$output .= '<button id="sv-header__back-menu" class="sv-header__back-button" aria-label="Voltar ao Menu Principal">';
			$output .= '<span>Voltar</span>';
			$output .= '</button>';
			$output .= '</div>';
			$output .= '</li>';

			// Adiciona o título do submenu, se estiver definido.
			if ( ! empty( $this->current_item_title ) ) {
				$output .= '<li class="menu-item menu-item-title">';
				$output .= '<a href="' . esc_url( $this->current_item_link ) . '" title="' . esc_attr( $this->current_item_title ) . '">';
				$output .= esc_html( $this->current_item_title );
				$output .= '</a>';
				$output .= '</li>';
			}
		} else {
				// Para outros níveis de profundidade, mantém a estrutura padrão.
				$output .= '<ul>';
		}
	}

	/**
	 * Renderiza cada item do menu.
	 *
	 * @param string   $output HTML do menu que será gerado.
	 * @param WP_Post  $item Dados do item atual do menu.
	 * @param int      $depth Nível de profundidade atual.
	 * @param stdClass $args Configurações do menu.
	 * @param int      $id ID do item atual.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		if ( $depth === 0 ) {
			// Armazena o título do item para ser usado no submenu, apenas no nível 0.
			$this->current_item_title = $item->title;
			$this->current_item_link  = $item->url;
		}

		// Usa o método padrão do Walker_Nav_Menu para a estrutura do item.
		parent::start_el( $output, $item, $depth, $args, $id );
	}
}

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