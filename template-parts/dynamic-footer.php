<?php

/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$stylesheet_dir_uri = esc_url(get_stylesheet_directory_uri());

// Renderiza o shortcode do template Elementor acima do footer
if (get_post_status(21501) === 'publish') {
	echo do_shortcode('[elementor-template id="21501"]');
}

?>

<footer id="sv-footer" class="sv-footer">
	<div class="sv-footer__container">
		<div class="sv-footer__content">
			<a class="sv-footer__logo-link" href="<?php echo home_url(); ?>" title="Ir para a página inicial">
				<img
					src="<?php echo $stylesheet_dir_uri; ?>/assets/images/logo-tracbel.svg"
					alt="Logo Studio Visual"
					class="sv-footer__logo" />
			</a>

			<div class="sv-footer__social_icons">
				<?php
				$social_icons = [
					'linkedin'  => 'https://www.linkedin.com/company/tracbel-s-a/',
					'instagram' => 'https://www.instagram.com/grupotracbel/',
					'facebook'  => 'https://www.facebook.com/GrupoTracbel',
					'youtube'   => 'https://www.youtube.com/c/GrupoTracbel'
				];
				foreach ($social_icons as $platform => $link): ?>
					<a
						href="<?php echo esc_url($link); ?>"
						aria-label="Visite nosso perfil no <?php echo ucfirst($platform); ?>"
						title="<?php echo ucfirst($platform); ?> Tracbel"
						target="_blank"
						rel="noreferrer noopener">
						<img
							src="<?php echo $stylesheet_dir_uri; ?>/assets/images/social-media/<?php echo $platform; ?>.svg"
							alt="<?php echo ucfirst($platform); ?>"
							width="24"
							height="24">
					</a>
				<?php endforeach; ?>
			</div>
		</div>

		<nav class="sv-footer__menu">
			<?php
			if (has_nav_menu('primary-footer-menu')) {
				wp_nav_menu(array(
					'theme_location' => 'primary-footer-menu',
					'container'      => false,
					'menu_class'     => 'sv-footer__menu-list',
					'depth'          => 2,
				));
			}
			?>
		</nav>

		<div class="sv-footer__copyright">
			Tracbel © <?php echo date('Y'); ?>. Todos os direitos reservados. |
			<a href="https://www.tracbel.com.br/politica-de-privacidade/" title="Leia nossa Política de Privacidade">
				Política de Privacidade
			</a> |
			Desenvolvido por:
			<a href="https://studiovisual.com.br/" target="_blank" title="Visite o site da Studio Visual" class="footer-link">
				Studio Visual
			</a>
		</div>
	</div>
</footer>