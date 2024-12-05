<?php

/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!hello_get_header_display()) {
    return;
}

$stylesheet_dir_uri = esc_url(get_stylesheet_directory_uri());

?>
<header id="sv-header" class="sv-header">
	<div class="sv-header__container">
		<input type="checkbox" id="sv-header__checkbox" class="sv-header__checkbox d-none-desktop">
		<label for="sv-header__checkbox" class="sv-header__nav-controls d-none-desktop">
			<img
				src="<?php echo $stylesheet_dir_uri; ?>/assets/icons/menu-open.svg" 
				alt="Abrir Menu"
				class="sv-header__navOpen"
				width="30"
				height="30"
			>
		</label>

		<div class="sv-header__logo">
			<?php
				if (has_custom_logo()) {
					the_custom_logo();
				} else {
					echo '<div class="sv-header__logo-text">' . esc_html(get_bloginfo('name')) . '</div>';
				}
			?>
		</div>

		<div class="sv-header__icon-search">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				viewBox="0 0 512 512"
				class="sv-header__icon-image"
				id="search-icon"
				width="18"
				height="18"
				aria-label="Pesquisar"
			>
				<path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/>
			</svg>
		</div>

		<!-- Overlay de busca -->
		<div id="search-overlay" class="search-overlay">
    <div class="search-overlay__content">
        <div class="search-overlay__form-container">
            <!-- Formulário de busca do WordPress -->
            <?php get_search_form(); ?>
						<img
							src="<?php echo $stylesheet_dir_uri; ?>/assets/icons/menu-close-white.svg"
							alt="Fechar Pesquisa"
							id="close-search-overlay"
							class="search-overlay__close"
							width="14"
							height="14"
						>
        </div>
    </div>
</div>


		<div class="sv-header__buttons d-none-mobile">
			<a href="/contrate" class="sv-header__button sv-header__button--hire" title="Agendar demonstração gratuita">acessar e-commerce</a>
		</div>

		<nav id="sv-header__menu" class="sv-header__navigation">
			<div class="sv-header__close-menu d-none-desktop">
				<label for="sv-header__checkbox" class="sv-header__nav-controls d-none-desktop">
					<img
						src="<?php echo $stylesheet_dir_uri; ?>/assets/icons/menu-close.svg"
						alt="Fechar Menu"
						class="sv-header__navClose"
						width="20"
						height="20"
					>
				</label>
			</div>

			<?php
				if (has_nav_menu('primary-header-menu')) {
					wp_nav_menu(array(
						'theme_location' => 'primary-header-menu',
						'container'      => false,
						'menu_class'     => 'sv-header__menu-list',
						'depth'          => 2,
						'walker'         => new Custom_Submenu_Walker(),
					));
				}
			?>
		</nav>
	</div>
</header>