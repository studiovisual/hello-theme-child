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

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '3.0.0' );

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

	// Enfileira o CSS do modal
	wp_enqueue_style(
			'demo-modal-style',
			get_stylesheet_directory_uri() . '/assets/css/partials/demo-modal.css',
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

	wp_enqueue_script(
			'demo-modal-script',
			get_stylesheet_directory_uri() . '/assets/js/partials/demo-modal.js',
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
add_filter( 'hello_elementor_register_menus', function( $register_menus ) {
    if ( $register_menus ) {
        register_nav_menus( [
            'primary-header-menu' => esc_html__( 'Header', 'hello-elementor' ),
            'primary-footer-menu' => esc_html__( 'Footer', 'hello-elementor' ),
        ] );
    }
    return false;
}, 20 );

/**
 * Classe personalizada para gerenciar submenus com título e botão "Voltar".
 */
class Custom_Submenu_Walker extends Walker_Nav_Menu {
	/**
	 * @var string $current_item_title Armazena o título do item atual no nível de profundidade 0.
	 */
	private $current_item_title = '';

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
			$output .= '<img src="' . esc_url( get_stylesheet_directory_uri() ) . '/assets/icons/arrow-back-menu.svg" alt="" width="18" height="18">';
			$output .= '<span>Voltar</span>';
			$output .= '</button>';
			$output .= '</div>';
			$output .= '</li>';

			// Adiciona o título do submenu, se estiver definido.
			if ( ! empty( $this->current_item_title ) ) {
				$output .= '<li class="menu-item menu-item-title">';
				$output .= '<span>' . esc_html( $this->current_item_title ) . '</span>';
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

/**
 * Adiciona um campo de URL de imagem aos itens de menu.
 *
 * @param int $item_id O ID do item de menu.
 * @param WP_Post $item Dados do item de menu.
 * @param int $depth Nível de profundidade do menu.
 * @param object $args Argumentos do menu.
 */
function add_custom_menu_image_field( $item_id, $item, $depth, $args ) {
	$image_url = get_post_meta( $item_id, '_menu_item_image_url', true );
	?>

	<p class="field-menu-item-image-url description description-wide">
			<label for="edit-menu-item-image-url-<?php echo esc_attr( $item_id ); ?>">
					<?php echo esc_html( __( 'Image URL' ) ); ?><br>
					<input
							type="text"
							id="edit-menu-item-image-url-<?php echo esc_attr( $item_id ); ?>"
							class="widefat code edit-menu-item-image-url"
							name="menu-item-image-url[<?php echo esc_attr( $item_id ); ?>]"
							value="<?php echo esc_attr( $image_url ); ?>"
					/>
					<br />
					<small><?php echo esc_html( __( 'Insira o URL da imagem que deseja usar para este item de menu.' ) ); ?></small>
					<br />
					<small><?php echo esc_html( __( 'Obs: Campo ativo apenas para o subitem STRATWS One e subitens de Módulos.' ) ); ?></small>
			</label>
	</p>

	<?php
}
add_filter( 'wp_nav_menu_item_custom_fields', 'add_custom_menu_image_field', 10, 4 );


/**
 * Salva o URL da imagem inserido nos itens de menu.
 *
 * @param int $menu_id O ID do menu.
 * @param int $menu_item_db_id O ID do item de menu no banco de dados.
 * @param object $args Argumentos adicionais para a atualização.
 */
function save_custom_menu_image_field( $menu_id, $menu_item_db_id, $args ) {
	if ( isset( $_POST['menu-item-image-url'][ $menu_item_db_id ] ) ) {
			$image_url = esc_url_raw( $_POST['menu-item-image-url'][ $menu_item_db_id ] );
			update_post_meta( $menu_item_db_id, '_menu_item_image_url', $image_url );
	}
}
add_action( 'wp_update_nav_menu_item', 'save_custom_menu_image_field', 10, 3 );


/**
* Adiciona uma imagem ao item de menu, se houver um URL de imagem.
*
* @param string $item_output O HTML de saída do item de menu.
* @param object $item Dados do item de menu.
* @param object $args Argumentos do menu.
* @param int $depth Nível de profundidade do menu.
* @return string O HTML do item de menu, com a imagem adicionada, se aplicável.
*/
function add_image_to_nav_menu($item_output, $item, $args, $depth) {
	$image_url = get_post_meta($item->ID, '_menu_item_image_url', true);

	if (!empty($image_url)) {
			$item_output = '<a href="' . esc_url($item->url) . '"><img src="' . esc_url($image_url) . '" alt="" class="menu-item-image" /> ' . $item->title . '</a>';
	}

	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_image_to_nav_menu', 10, 4);

/**
 * Gera o botão "Agendar demonstração gratuita" com popup para exibir o formulário apropriado conforme o idioma.
 *
 * @param string $class Classes adicionais para o botão.
 * @return void
 */
function sv_render_menu_button($class = '') {
	$language_code = function_exists('icl_object_id') ? ICL_LANGUAGE_CODE : 'default';
	$text = ($language_code === 'en') ? 'Request a free tryout' : 'Agendar demonstração gratuita';
	$button_class = trim("sv-header__button sv-header__button--hire $class");

	?>
		<a
			href="javascript:void(0);" 
			class="<?php echo esc_attr($button_class); ?>" 
			title="<?php echo esc_attr($text); ?>" 
			onclick="togglePopup()">
			<?php echo esc_html($text); ?>
		</a>
	<?php
}