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