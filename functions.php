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

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.3' );
define( 'MENU_ITEM_IMAGE_URL_META_KEY', '_menu_item_image_url' );

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
		 'primary-header-menu' => esc_html__( 'Header', 'hello-theme-child' ),
		 'primary-footer-menu' => esc_html__( 'Footer', 'hello-theme-child' ),
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
	 * Inicia o nível do submenu.
	 *
	 * @param string   $output HTML do menu que será gerado.
	 * @param int      $depth Nível de profundidade atual.
	 * @param stdClass $args Configurações do menu.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( $depth === 0 ) {
				// Adiciona a div que encapsula todo o conteúdo do submenu.
				$output .= '<div class="submenu-wrapper">';

				// Adiciona o botão "Voltar".
				$output .= '<button class="sv-header__back-button" aria-label="Voltar ao Menu Principal"><span>Voltar</span></button>';
		}

		// Adiciona a div pai para encapsular o título e o submenu.
		$output .= '<div class="submenu-content">';

		if ( $depth === 0 ) {
				// Adiciona o título do submenu, se estiver definido.
				if ( ! empty( $this->current_item_title ) ) {
						$output .= '<div class="menu-item menu-item-title">';
						$output .= '<span>' . esc_html( $this->current_item_title ) . '</span>';
						$output .= '</div>';
				}
		}

		// Abre o submenu.
		$output .= '<ul class="sub-menu">';
}

public function end_lvl( &$output, $depth = 0, $args = null ) {
		// Fecha o submenu.
		$output .= '</ul>';

		// Fecha .submenu-content
		$output .= '</div>';

		if ( $depth === 0 ) {
				// Fecha .submenu-wrapper
				$output .= '</div>';
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
	$image_url = get_post_meta( $item_id, MENU_ITEM_IMAGE_URL_META_KEY, true );

	if ( empty( $image_url ) ) {
		$image_url = '';
	}
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
					<small><?php echo esc_html( __( 'Obs: Campo ativo apenas para o menu de Marcas.' ) ); ?></small>
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
			update_post_meta( $menu_item_db_id, MENU_ITEM_IMAGE_URL_META_KEY, $image_url );
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
	$image_url = get_post_meta($item->ID, MENU_ITEM_IMAGE_URL_META_KEY, true);

	if (!empty($image_url)) {
    $post_title = get_the_title($item->object_id);

    $item_output = '<a href="' . esc_url($item->url) . '" title="' . esc_attr($post_title) . '">';
		$item_output .= '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($post_title) . '" class="menu-item-image" width="150" height="70" loading="lazy" decoding="async" />';
    $item_output .= $item->title . '</a>';
	}

	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_image_to_nav_menu', 10, 4);


/*
 * Redireciona a página de autor para a página inicial
 */
add_action('template_redirect', function() {
	if (is_author()) {
			wp_redirect(home_url(), 301); // Redireciona para a página inicial
			exit;
	}
});

/*
* Desabilita a API REST para visitantes e usuários logados
*/
add_filter('rest_authentication_errors', function($result) {
	// Permitir acesso à API para administradores apenas
	if (!is_user_logged_in()) {
			return new WP_Error('rest_disabled', 'A API REST está desativada para visitantes.', array('status' => 403));
	}

	// Bloquear até mesmo para usuários logados, exceto administradores
	if (!current_user_can('manage_options')) {
			return new WP_Error('rest_disabled', 'A API REST está desativada para este usuário.', array('status' => 403));
	}

	return $result;
});

/*
 * Remove "Pages" da busca.
 */
add_filter( 'register_post_type_args', function( $args, $name ) {
	if( 'page' === $name )
			$args['exclude_from_search'] = true;

	return $args;
}, 10, 2 );