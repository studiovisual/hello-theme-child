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
			<img src="<?php echo $stylesheet_dir_uri; ?>/assets/icons/menu-open.svg" alt="Abrir Menu" class="sv-header__navOpen" width="24" height="24">
			<img src="<?php echo $stylesheet_dir_uri; ?>/assets/icons/menu-close.svg" alt="Fechar Menu" class="sv-header__navClose" width="24" height="24">
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

		<div class="sv-header__buttons d-none-mobile">
			<?php sv_render_menu_button(); ?>
		</div>
		
		<nav id="sv-header__menu" class="sv-header__navigation">
			<?php
				if (has_nav_menu('primary-header-menu')) {
					wp_nav_menu(array(
						'theme_location' => 'primary-header-menu',
						'container'      => false,
						'menu_class'     => 'sv-header__menu-list',
						'depth'          => 3,
						'walker'         => new Custom_Submenu_Walker(),
					));
				}
			?>

			<?php sv_render_menu_button('d-none-desktop'); ?>
		</nav>
	</div>
</header>

<?php get_template_part('template-parts/partials/demo', 'modal'); ?>
